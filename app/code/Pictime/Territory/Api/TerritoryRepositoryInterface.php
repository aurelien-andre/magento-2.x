<?php

namespace Pictime\Territory\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Pictime\Territory\Api\Data\TerritoryInterface;
use Pictime\Territory\Api\Data\TerritorySearchResultsInterface;
use Pictime\Territory\Model\Entity\Territory;

interface TerritoryRepositoryInterface
{
    /**
     * @param array $params
     * @return TerritoryInterface|Territory
     */
    public function create(array $params = []): TerritoryInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return TerritorySearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): TerritorySearchResultsInterface;

    /**
     * @return TerritorySearchResultsInterface
     */
    public function getAll(): TerritorySearchResultsInterface;

    /**
     * @return TerritorySearchResultsInterface
     */
    public function getListIsActive(): TerritorySearchResultsInterface;

    /**
     * @param $value
     * @param null $field
     * @return TerritoryInterface
     */
    public function get($value, $field = null): TerritoryInterface;

    /**
     * @param string $code
     * @return TerritoryInterface|null
     */
    public function getByCode(string $code): ?TerritoryInterface;

    /**
     * @param TerritoryInterface $entity
     * @return bool
     */
    public function delete(TerritoryInterface $entity): bool;

    /**
     * @param TerritoryInterface $entity
     * @return bool
     */
    public function save(TerritoryInterface $entity): bool;
}