<?php

namespace BureauVallee\Shop\Model\Locator;

/**
 * Class Rule
 * @package BureauVallee\Shop\Model\Locator
 */
abstract class Rule implements RuleInterface
{
    /**
     * @return string
     */
    public function getCode(): string
    {
        return get_class($this);
    }
}