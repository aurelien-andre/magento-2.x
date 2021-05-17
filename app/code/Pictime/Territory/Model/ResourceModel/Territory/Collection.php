<?php

namespace Pictime\Territory\Model\ResourceModel\Territory;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Pictime\Territory\Model\Entity\Territory as Model;
use Pictime\Territory\Model\ResourceModel\Territory as ResourceModel;

/**
 * Class Collection
 * @package Pictime\Territory\Model\ResourceModel\Territory
 */
class Collection extends AbstractCollection
{
    /**
     * @inheridoc
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}