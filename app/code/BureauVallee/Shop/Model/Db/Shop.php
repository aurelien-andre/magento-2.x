<?php

namespace BureauVallee\Shop\Model\Db;

use BureauVallee\Shop\Api\Data\AddressInterface;
use BureauVallee\Shop\Api\Data\GeolocationInterface;
use BureauVallee\Shop\Api\Data\ShopInterface;
use BureauVallee\Shop\Model\AbstractModel;

/**
 * Class Shop
 * @package BureauVallee\Shop\Model\Db
 */
class Shop extends AbstractModel implements ShopInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shop';

    /**
     * @var string
     */
    protected $_eventObject = 'shop';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init(\BureauVallee\Shop\Model\ResourceModel\Db\Shop::class);
    }

    /**
     * @inheritDoc
     */
    public function getCode(): ?string
    {
        return $this->getData(ShopInterface::CODE);
    }

    /**
     * @inheritDoc
     */
    public function setCode(string $code): void
    {
        $this->setData(ShopInterface::CODE, $code);
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->getData(ShopInterface::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name): void
    {
        $this->setData(ShopInterface::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getImage(): ?string
    {
        return $this->getData(ShopInterface::IMAGE);
    }

    /**
     * @inheritDoc
     */
    public function setImage(string $image): void
    {
        $this->setData(ShopInterface::IMAGE, $image);
    }

    /**
     * @inheritDoc
     */
    public function getStoreId(): ?int
    {
        // TODO: Implement getStoreId() method.
    }

    /**
     * @inheritDoc
     */
    public function setStoreId(int $storeId): void
    {
        // TODO: Implement setStoreId() method.
    }

    /**
     * @inheritDoc
     */
    public function getGeolocation(): ?GeolocationInterface
    {
        // TODO: Implement getGeolocation() method.
    }

    /**
     * @inheritDoc
     */
    public function setGeolocation(GeolocationInterface $geolocation): void
    {
        // TODO: Implement setGeolocation() method.
    }

    /**
     * @inheritDoc
     */
    public function getAddress(): ?AddressInterface
    {
        // TODO: Implement getAddress() method.
    }

    /**
     * @inheritDoc
     */
    public function setAddress(AddressInterface $address): void
    {
        // TODO: Implement setAddress() method.
    }

    /**
     * @inheritDoc
     */
    public function getContacts(): array
    {
        // TODO: Implement getContacts() method.
    }

    /**
     * @inheritDoc
     */
    public function setContacts(array $contacts): void
    {
        // TODO: Implement setContacts() method.
    }

    /**
     * @inheritDoc
     */
    public function getTimetables(): array
    {
        // TODO: Implement getTimetables() method.
    }

    /**
     * @inheritDoc
     */
    public function setTimetables(array $timetables): void
    {
        // TODO: Implement setTimetables() method.
    }

    /**
     * @inheritDoc
     */
    public function getIsEnabled(): ?bool
    {
        return $this->getData(ShopInterface::IS_ENABLED);
    }

    /**
     * @inheritDoc
     */
    public function setIsEnabled(bool $isEnabled = true): void
    {
        $this->setData(ShopInterface::IS_ENABLED, $isEnabled);
    }
}