<?php

namespace BureauVallee\Shop\Model\Locator;

use BureauVallee\Shop\Api\Data\ShopInterface;

/**
 * Class Locator
 * @package BureauVallee\Shop\Model\Locator
 */
class Locator implements LocatorInterface
{
    /** @var RulePoolInterface */
    private RulePoolInterface $rulePool;

    /** @var ShopInterface */
    private ShopInterface $shop;

    /** @var string */
    private string $ruleSelected;

    /** @var bool */
    private bool $isLocked = false;

    /**
     * @param RulePoolInterface $rulePool
     */
    public function __construct(
        RulePoolInterface $rulePool
    )
    {
        $this->rulePool = $rulePool;
    }

    /**
     * @return ShopInterface
     */
    public function getShop(): ShopInterface
    {
        return $this->shop;
    }

    /**
     * @param ShopInterface $shop
     */
    public function setShop(ShopInterface $shop): void
    {
        $this->shop = $shop;
    }

    /**
     * @return string
     */
    public function getRuleSelected(): string
    {
        return $this->ruleSelected;
    }

    /**
     * @param string $ruleSelected
     */
    public function setRuleSelected(string $ruleSelected): void
    {
        $this->ruleSelected = $ruleSelected;
    }

    /**
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->isLocked;
    }

    /**
     * @param bool $isLocked
     */
    public function setIsLocked(bool $isLocked = true): void
    {
        $this->isLocked = $isLocked;
    }

    /**
     * @return bool
     */
    public function findShopContext(): bool
    {
        if (!$this->isLocked()) {
            foreach ($this->rulePool->getRules() as $rule) {
                if ($rule->validate($this)) {
                    $rule->execute($this);
                }
                if ($this->isLocked()) {
                    break;
                }
            }
        }
        return $this->isLocked();
    }
}