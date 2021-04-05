<?php

namespace BureauVallee\Shop\Model\Locator;

use BureauVallee\Shop\Api\Data\ShopInterface;

/**
 * Interface LocatorInterface
 * @package BureauVallee\Shop\Model\Locator
 */
interface LocatorInterface
{
    /**
     * @return ShopInterface
     */
    public function getShop(): ShopInterface;

    /**
     * @param ShopInterface $shop
     */
    public function setShop(ShopInterface $shop): void;

    /**
     * @return string
     */
    public function getRuleSelected(): string;

    /**
     * @param string $ruleSelected
     */
    public function setRuleSelected(string $ruleSelected): void;

    /**
     * @return bool
     */
    public function isLocked(): bool;

    /**
     * @param bool $isLocked
     */
    public function setIsLocked(bool $isLocked = true): void;

    /**
     * @return bool
     */
    public function findShopContext(): bool;
}