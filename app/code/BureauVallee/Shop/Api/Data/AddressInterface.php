<?php

namespace BureauVallee\Shop\Api\Data;

/**
 * Interface AddressInterface
 * @package BureauVallee\Shop\Api\Data
 */
interface AddressInterface
{
    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @param string $country
     */
    public function setCountry(string $country): void;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @param string $city
     */
    public function setCity(string $city): void;

    /**
     * @return string
     */
    public function getPostalCode(): string;

    /**
     * @param string $postalCode
     * @return mixed
     */
    public function setPostalCode(string $postalCode);

    /**
     * @return string
     */
    public function getStreets(): string;

    /**
     * @param string $streets
     * @return mixed
     */
    public function setStreets(string $streets);
}