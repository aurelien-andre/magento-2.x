<?php

namespace BureauVallee\Shop\Model\ResourceModel\Db;

use BureauVallee\Shop\Model\Spi\ShopResourceInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class ShopModel
 * @package BureauVallee\Shop\Model\ResourceModel\Db
 */
class Shop extends AbstractDb implements ShopResourceInterface
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('shop', 'entity_id');
    }
}