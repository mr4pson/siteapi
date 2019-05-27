<?php

namespace App\Entity\Cstmr;

use Doctrine\ORM\Mapping as ORM;

/**
 * address
 *
 * @ORM\Table(name="cstmr.address", indexes={@ORM\Index(name="idx_address_coordinate", columns={"latitude", "longitude", "latitude_up", "longitude_up", "latitude_low", "longitude_low"}), @ORM\Index(name="IDX_27F0266FF026BB7C", columns={"country_code"})})
 * @ORM\Entity
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cstmr.address_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dc", type="datetime", nullable=true, options={"default"="now()"})
     */
    private $dc = 'now()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="region", type="string", length=150, nullable=true)
     */
    private $region;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=150, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=150, nullable=true)
     */
    private $street;

    /**
     * @var string|null
     *
     * @ORM\Column(name="house", type="string", length=50, nullable=true)
     */
    private $house;

    /**
     * @var string|null
     *
     * @ORM\Column(name="korpus", type="string", length=50, nullable=true)
     */
    private $korpus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="flat", type="string", length=50, nullable=true)
     */
    private $flat;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude_up", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitudeUp;

    /**
     * @var float|null
     *
     * @ORM\Column(name="longitude_up", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitudeUp;

    /**
     * @var float|null
     *
     * @ORM\Column(name="latitude_low", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitudeLow;

    /**
     * @var float|null
     *
     * @ORM\Column(name="longitude_low", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitudeLow;

    /**
     * @var \DCountry
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cstmr\DCountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_code", referencedColumnName="code")
     * })
     */
    private $countryCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDc(): ?\DateTimeInterface
    {
        return $this->dc;
    }

    public function setDc(?\DateTimeInterface $dc): self
    {
        $this->dc = $dc;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getHouse(): ?string
    {
        return $this->house;
    }

    public function setHouse(?string $house): self
    {
        $this->house = $house;

        return $this;
    }

    public function getKorpus(): ?string
    {
        return $this->korpus;
    }

    public function setKorpus(?string $korpus): self
    {
        $this->korpus = $korpus;

        return $this;
    }

    public function getFlat(): ?string
    {
        return $this->flat;
    }

    public function setFlat(?string $flat): self
    {
        $this->flat = $flat;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitudeUp(): ?float
    {
        return $this->latitudeUp;
    }

    public function setLatitudeUp(?float $latitudeUp): self
    {
        $this->latitudeUp = $latitudeUp;

        return $this;
    }

    public function getLongitudeUp(): ?float
    {
        return $this->longitudeUp;
    }

    public function setLongitudeUp(?float $longitudeUp): self
    {
        $this->longitudeUp = $longitudeUp;

        return $this;
    }

    public function getLatitudeLow(): ?float
    {
        return $this->latitudeLow;
    }

    public function setLatitudeLow(?float $latitudeLow): self
    {
        $this->latitudeLow = $latitudeLow;

        return $this;
    }

    public function getLongitudeLow(): ?float
    {
        return $this->longitudeLow;
    }

    public function setLongitudeLow(?float $longitudeLow): self
    {
        $this->longitudeLow = $longitudeLow;

        return $this;
    }

    public function getCountryCode(): ?DCountry
    {
        return $this->countryCode;
    }

    public function setCountryCode(?DCountry $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }


}
