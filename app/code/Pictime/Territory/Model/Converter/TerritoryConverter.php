<?php

namespace Pictime\Territory\Model\Converter;

use Magento\Framework\Model\AbstractModel;
use Pictime\Territory\Api\Data\TerritoryInterface;
use Pictime\Territory\Api\TerritoryRepositoryInterface;

/**
 * Class TerritoryConverter
 * @package Pictime\Territory\Model\Converter
 */
class TerritoryConverter implements TerritoryConverterInterface
{
    /** @var TerritoryRepositoryInterface */
    private TerritoryRepositoryInterface $repository;

    /**
     * TerritoryConverter constructor.
     * @param TerritoryRepositoryInterface $repository
     */
    public function __construct(
        TerritoryRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @param string $identifier
     * @return TerritoryInterface
     */
    public function convertArrayToTerritory(
        array $data,
        string $identifier = TerritoryInterface::ID
    ): TerritoryInterface
    {
        $entity = $this->repository->get(
            $data[$identifier],
            $identifier
        );

        if ($entity instanceof AbstractModel) {
            $entity->addData($data);
        }

        return $entity;
    }

    /**
     * @param TerritoryInterface $territory
     * @param array $keys
     * @return array
     */
    public function convertTerritoryToArray(
        TerritoryInterface $territory,
        array $keys = []
    ): array
    {
        $result = [];

        if ($territory instanceof AbstractModel) {
            $result = $territory->toArray($keys);
        }

        return $result;
    }

    /**
     * @param TerritoryInterface $territory
     * @param array $keys
     * @return string
     */
    public function convertTerritoryToJson(
        TerritoryInterface $territory,
        array $keys = []
    ): string
    {
        $result = null;

        if ($territory instanceof AbstractModel) {
            $result = $territory->toJson($keys);
        }

        return $result;
    }
}