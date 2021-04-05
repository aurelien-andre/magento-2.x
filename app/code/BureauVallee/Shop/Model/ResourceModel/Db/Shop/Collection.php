<?php

namespace BureauVallee\Shop\Model\ResourceModel\Db\Shop;

use BureauVallee\Shop\Api\Data\ShopSearchResultInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package BureauVallee\Shop\Model\ResourceModel\Db\Shop
 */
class Collection extends AbstractCollection implements ShopSearchResultInterface
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init(
            \BureauVallee\Shop\Model\Db\Shop::class,
            \BureauVallee\Shop\Model\ResourceModel\Db\Shop::class
        );
    }
}