<?php

namespace Pictime\Territory\Api\Data;

/**
 * Interface TerritoryInterface
 * @package Pictime\Territory\Api\Data
 */
interface TerritoryInterface
{
    /** @var string */
    const ID = 'id';

    /** @var string */
    const LABEL = 'label';

    /** @var string */
    const CODE = 'code';

    /** @var string */
    const LOCALE = 'locale';

    /** @var string */
    const CURRENCY = 'currency';

    /** @var string */
    const IS_ACTIVE = 'is_active';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @param string $code
     */
    public function setCode(string $code): void;

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @param string $label
     */
    public function setLabel(string $label): void;

    /**
     * @return string
     */
    public function getLocale(): string;

    /**
     * @param string $locale
     */
    public function setLocale(string $locale): void;

    /**
     * @return string
     */
    public function getCurrency(): string;

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void;

    /**
     * @return bool
     */
    public function getIsActive(): bool;

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive = true): void;
}