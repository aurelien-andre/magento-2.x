<?php

namespace BureauVallee\Shop\Api;

use BureauVallee\Shop\Model\Locator\LocatorInterface;

/**
 * Interface ShopManagementInterface
 * @package BureauVallee\Shop\Api
 */
interface ShopManagementInterface
{
    /**
     * @return LocatorInterface
     */
    public function getLocator(): LocatorInterface;
}