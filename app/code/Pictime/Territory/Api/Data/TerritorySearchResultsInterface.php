<?php

namespace Pictime\Territory\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface TerritorySearchResultInterface
 * @package Pictime\Territory\Api\Data
 */
interface TerritorySearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return TerritoryInterface[]
     */
    public function getItems();

    /**
     * @param TerritoryInterface[] $items
     */
    public function setItems(array $items);
}