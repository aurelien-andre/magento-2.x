<?php

namespace BureauVallee\Shop\Model\Locator;

/**
 * Interface RuleInterface
 * @package BureauVallee\Shop\Model\Locator
 */
interface RuleInterface
{
    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @param LocatorInterface $locator
     * @return bool
     */
    public function validate(LocatorInterface $locator): bool;

    /**
     * @param LocatorInterface $locator
     */
    public function execute(LocatorInterface $locator): void;
}