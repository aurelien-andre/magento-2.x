<?php

namespace BureauVallee\Shop\Model\System;

/**
 * Interface ConfigInterface
 * @package BureauVallee\Shop\Model\System
 */
interface ConfigInterface
{
    /**
     * @return int
     */
    public function getDefaultShopId(): int;
}