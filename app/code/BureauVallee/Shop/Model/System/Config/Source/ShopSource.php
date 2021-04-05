<?php

namespace BureauVallee\Shop\Model\System\Config\Source;

use BureauVallee\Shop\Api\Data\ShopInterface;
use BureauVallee\Shop\Model\ResourceModel\Db\Shop\Collection;
use BureauVallee\Shop\Model\ResourceModel\Db\Shop\CollectionFactory;

/**
 * Class ShopSource
 * @package BureauVallee\Shop\Model\System\Config\Source
 */
class ShopSource implements ShopSourceInterface
{
    /** @var CollectionFactory */
    private CollectionFactory $shopCollectionFactory;

    /** @var array */
    private array $shops = [];

    /**
     * @return Collection
     */
    private function getShops(): Collection
    {
        return $this
            ->shopCollectionFactory
            ->create()
            ->addFieldToFilter(ShopInterface::IS_ENABLED, true);
    }

    /**
     * ShopSource constructor.
     * @param $shopCollectionFactory
     */
    public function __construct(
        CollectionFactory $shopCollectionFactory
    )
    {
        $this->shopCollectionFactory = $shopCollectionFactory;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        if (empty($this->shops)) {
            foreach ($this->getShops() as $shop) {
                $this->shops[$shop->getId()] = $shop->getName();
            }
        }
        return $this->shops;
    }

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        $result = [];

        foreach ($this->toArray() as $id => $name) {
            $result[] = ['value' => $id, 'label' => $name];
        }

        return $result;
    }
}