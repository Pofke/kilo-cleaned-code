<?php

namespace App;

class UserDTO
{
    private string $first_name;
    private string $second_name;
    private string $city;
    private string $street;
    private int $house;
    private int $apartment;
    private int $id;

    public function __construct()
    {
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getSecondName(): string
    {
        return $this->second_name;
    }

    public function setSecondName(string $second_name): void
    {
        $this->second_name = $second_name;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getHouse(): int
    {
        return $this->house;
    }

    public function setHouse(int $house): void
    {
        $this->house = $house;
    }

    public function getApartment(): int
    {
        return $this->apartment;
    }

    public function setApartment(int $apartment): void
    {
        $this->apartment = $apartment;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
