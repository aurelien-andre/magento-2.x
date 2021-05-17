<?php

namespace Pictime\Territory\Model\Entity;

use Magento\Framework\Model\AbstractModel;
use Pictime\Territory\Api\Data\TerritoryInterface;
use Pictime\Territory\Model\ResourceModel\Territory as ResourceModel;

/**
 * Class Territory
 * @package Pictime\Territory\Model\Entity
 */
class Territory extends AbstractModel implements TerritoryInterface
{
    /** @var string */
    protected $_eventPrefix = 'territory';

    /** @var string */
    protected $_eventObject = 'territory';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getLabel(): string
    {
        return $this->getData(TerritoryInterface::LABEL);
    }

    /**
     * @inheritDoc
     */
    public function setLabel(string $label): void
    {
        $this->setData(TerritoryInterface::LABEL, $label);
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return $this->getData(TerritoryInterface::CODE);
    }

    /**
     * @inheritDoc
     */
    public function setCode(string $code): void
    {
        $this->setData(TerritoryInterface::CODE, $code);
    }

    /**
     * @inheritDoc
     */
    public function getLocale(): string
    {
        return $this->getData(TerritoryInterface::LOCALE);
    }

    /**
     * @inheritDoc
     */
    public function setLocale(string $locale): void
    {
        $this->setData(TerritoryInterface::LOCALE, $locale);
    }

    /**
     * @inheritDoc
     */
    public function getCurrency(): string
    {
        return $this->getData(TerritoryInterface::CURRENCY);
    }

    /**
     * @inheritDoc
     */
    public function setCurrency(string $currency): void
    {
        $this->setData(TerritoryInterface::CURRENCY, $currency);
    }

    /**
     * @inheritDoc
     */
    public function getIsActive(): bool
    {
        return $this->getData(TerritoryInterface::IS_ACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setIsActive(bool $isActive = true): void
    {
        $this->setData(TerritoryInterface::IS_ACTIVE, $isActive);
    }
}