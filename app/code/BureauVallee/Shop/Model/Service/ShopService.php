<?php

namespace BureauVallee\Shop\Model\Service;

use BureauVallee\Shop\Api\ShopManagementInterface;
use BureauVallee\Shop\Model\Locator\LocatorInterface;

/**
 * Class ShopService
 * @package BureauVallee\Shop\Model\Service
 */
class ShopService implements ShopManagementInterface
{
    /** @var LocatorInterface */
    private LocatorInterface $locator;

    /**
     * ShopService constructor.
     * @param LocatorInterface $locator
     */
    public function __construct(
        LocatorInterface $locator
    )
    {
        $this->locator = $locator;
    }

    /**
     * @return LocatorInterface
     */
    public function getLocator(): LocatorInterface
    {
        return $this->locator;
    }
}