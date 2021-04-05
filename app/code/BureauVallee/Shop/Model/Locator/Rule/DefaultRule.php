<?php

namespace BureauVallee\Shop\Model\Locator\Rule;

use BureauVallee\Shop\Model\Db\ShopFactory;
use BureauVallee\Shop\Model\Locator\LocatorInterface;
use BureauVallee\Shop\Model\Locator\Rule;
use BureauVallee\Shop\Model\System\ConfigInterface;

/**
 * Class CallbackDefaultRule
 * @package BureauVallee\Shop\Model\Locator\Rule
 */
class DefaultRule extends Rule
{
    /** @var ShopFactory */
    private ShopFactory $shopFactory;

    /** @var ConfigInterface */
    private ConfigInterface $config;

    /**
     * @param ShopFactory $shopFactory
     * @param ConfigInterface $config
     */
    public function __construct(
        ShopFactory $shopFactory,
        ConfigInterface $config
    )
    {
        $this->shopFactory = $shopFactory;
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function validate(LocatorInterface $locator): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function execute(LocatorInterface $locator): void
    {
        if ($shopId = $this->config->getDefaultShopId()) {
            $shop = $this->shopFactory->create();
            $shop->setCode('default');
            $shop->setName('My Better Shop');
            $shop->setIsEnabled(true);
            $locator->setShop($shop);
            $locator->setRuleSelected('default');
            $locator->setIsLocked();
        }
    }
}