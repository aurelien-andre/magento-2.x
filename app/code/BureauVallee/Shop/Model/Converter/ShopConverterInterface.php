<?php

namespace BureauVallee\Shop\Model\Converter;

use BureauVallee\Shop\Api\Data\ShopInterface;

/**
 * Interface ShopConverterInterface
 * @package BureauVallee\Shop\Model\Converter
 */
interface ShopConverterInterface
{
    /**
     * @param ShopInterface $shop
     * @return array
     */
    public function convertShopToCustomerSection(ShopInterface $shop): array;
}