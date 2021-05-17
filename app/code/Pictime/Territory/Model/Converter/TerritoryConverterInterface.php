<?php

namespace Pictime\Territory\Model\Converter;

use Pictime\Territory\Api\Data\TerritoryInterface;

/**
 * Interface TerritoryConverterInterface
 * @package Pictime\Territory\Model\Converter
 */
interface TerritoryConverterInterface
{
    /**
     * @param array $data
     * @param string $identifier
     * @return TerritoryInterface|null
     */
    public function convertArrayToTerritory(
        array $data,
        string $identifier = TerritoryInterface::ENTITY_ID
    ): TerritoryInterface;

    /**
     * @param TerritoryInterface $territory
     * @param array $keys
     * @return array
     */
    public function convertTerritoryToArray(
        TerritoryInterface $territory,
        array $keys = []
    ): array;

    /**
     * @param TerritoryInterface $territory
     * @param array $keys
     * @return string
     */
    public function convertTerritoryToJson(
        TerritoryInterface $territory,
        array $keys = []
    ): string;
}