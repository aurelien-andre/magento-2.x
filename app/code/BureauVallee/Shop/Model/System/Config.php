<?php

namespace BureauVallee\Shop\Model\System;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Config
 * @package BureauVallee\Shop\Model\System
 */
class Config implements ConfigInterface
{
    const BASE              = 'shop';
    const GENERAL           = 'general';
    const DEFAULT_SHOP_ID   = 'default_shop_id';

    /** @var ScopeConfigInterface */
    private ScopeConfigInterface $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return int
     */
    public function getDefaultShopId(): int
    {
        return (int)$this->scopeConfig->getValue(implode('/', [
            static::BASE,
            static::GENERAL,
            static::DEFAULT_SHOP_ID
        ]));
    }
}