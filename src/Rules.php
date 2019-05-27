<?php
//http://www.inanzzz.com/index.php/post/ey9k/creating-a-custom-annotation-for-controller-class-and-method-in-symfony
//https://delboy1978uk.wordpress.com/2017/10/10/creating-custom-annotations-in-symfony-3/
namespace App;

/**
 * Annotation class for @Rules().
 *
 * @Annotation
 * @Target({"CLASS", "METHOD"})
 *
 */
class Rules 
{

    public $role;

    public function __construct( $data){
       $this->role = $data['role'];
    }

    
    
}