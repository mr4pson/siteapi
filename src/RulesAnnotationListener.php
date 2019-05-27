<?php

namespace App;

use App\Rules as ModelAnnotation;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;
use ReflectionException;
use RuntimeException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use App\UserProvider;
use App\Service\RestResponseService;

class RulesAnnotationListener
{
    private $annotationReader;
    private $restResponseService;
 
    public function __construct(Reader $annotationReader, RestResponseService $restResponseService)
    {
        $this->annotationReader = $annotationReader;
        $this->restResponseService = $restResponseService;
    }
 
    public function onKernelController(FilterControllerEvent $event): void
    {
        if (!$event->isMasterRequest()) {
            return;
        }
 
        $controllers = $event->getController();
        if (!is_array($controllers)) {
            return;
        }
 
        $this->handleAnnotation($controllers);
    }
 
    private function handleAnnotation(iterable $controllers): void
    {
        list($controller, $method) = $controllers;
 
        try {
            $controller = new ReflectionClass($controller);
        } catch (ReflectionException $e) {
            throw new RuntimeException('Failed to read annotation!');
        }
 
        //$this->handleClassAnnotation($controller);
        $this->handleMethodAnnotation($controller, $method);
    }
 
    /*private function handleClassAnnotation(ReflectionClass $controller): void
    {
        $annotation = $this->annotationReader->getClassAnnotation($controller, ModelAnnotation::class);
 
        if ($annotation instanceof ModelAnnotation) {
            print_r($annotation);
        }
    }*/
 
    private function handleMethodAnnotation(ReflectionClass $controller, string $method): void
    {
        $method = $controller->getMethod($method);
        $annotation = $this->annotationReader->getMethodAnnotation($method, ModelAnnotation::class);
 
        if ($annotation instanceof ModelAnnotation) {
            //dump($annotation->role);
            $hasRole = false;
            foreach($annotation->role as $role){
                if($role==UserProvider::$user){
                    $hasRole = true;
                }
            }

            if($hasRole){
                UserProvider::$access = true;
            }else{
                UserProvider::$access = false;
                $this->restResponseService->error('denied','Недостаточно прав');
            }
        }
    }
}