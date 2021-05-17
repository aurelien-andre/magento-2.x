<?php

namespace Pictime\Territory\Model\System;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Config
 * @package Pictime\Territory\Model\System
 */
class Config
{
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
    public function getTerritoryId(): int
    {
        return (int)$this->scopeConfig->getValue(implode('/', [
            'territory',
            'general',
            'id',
        ]));
    }
}