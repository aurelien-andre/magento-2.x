<?php

namespace BureauVallee\Shop\Model\Locator;

/**
 * Interface RulePoolInterface
 * @package BureauVallee\Shop\Model\Locator
 */
interface RulePoolInterface
{
    /**
     * @return RuleInterface[]
     */
    public function getRules(): array;
}