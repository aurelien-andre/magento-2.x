<?php

namespace BureauVallee\Shop\Model\Converter;

use BureauVallee\Shop\Api\Data\ShopInterface;
use Magento\Framework\DataObject;

/**
 * Class ShopConverter
 * @package BureauVallee\Shop\Model\Converter
 */
class ShopConverter implements ShopConverterInterface
{
    /**
     * @param ShopInterface $shop
     * @return array
     */
    public function convertShopToCustomerSection(ShopInterface $shop): array
    {
        return $shop instanceof DataObject
            ? $shop->toArray()
            : [];
    }
}