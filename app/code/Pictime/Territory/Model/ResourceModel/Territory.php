<?php

namespace Pictime\Territory\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Territory
 * @package Pictime\Territory\Model\ResourceModel
 */
class Territory extends AbstractDb
{
    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('pictime_territory', 'id');
    }
}