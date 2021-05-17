<?php

namespace Pictime\Territory\Model\System\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Pictime\Territory\Api\TerritoryRepositoryInterface;

/**
 * Class TerritorySource
 * @package Pictime\Territory\Model\System\Config\Source
 */
class TerritorySource implements OptionSourceInterface
{
    /** @var TerritoryRepositoryInterface */
    private TerritoryRepositoryInterface $repository;

    /**
     * TerritorySource constructor.
     * @param TerritoryRepositoryInterface $repository
     */
    public function __construct(TerritoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function toOptionArray(): array
    {
        $result = [];

        foreach ($this->toArray() as $id => $label) {
            $result[] = [
                'value' => $id,
                'label' => ucwords($label)
            ];
        }

        return $result;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $result = [];

        foreach ($this->repository->getAll()->getItems() as $territory) {
            $result[$territory->getId()] = trim(implode(' ', [
                $territory->getLabel(),
                !$territory->getIsActive()
                    ? __('(disable)')
                    : null,
            ]));
        }

        asort($result);

        return $result;
    }
}