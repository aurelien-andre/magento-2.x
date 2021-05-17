<?php

namespace Pictime\Territory\Model\Repository;

use Exception;
use Magento\Framework\Api\Filter;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Pictime\Territory\Api\Data\TerritoryInterface;
use Pictime\Territory\Api\Data\TerritorySearchResultsInterface;
use Pictime\Territory\Api\TerritoryRepositoryInterface;
use Pictime\Territory\Model\Entity\Territory;
use Pictime\Territory\Model\Entity\TerritoryFactory;
use Pictime\Territory\Model\ResourceModel\Territory as ResourceModel;
use Pictime\Territory\Model\ResourceModel\Territory\Collection as ResourceCollection;
use Pictime\Territory\Model\ResourceModel\TerritorySearchResultsFactory;
use Pictime\Territory\Model\System\Config;
use Psr\Log\LoggerInterface;

/**
 * Class TerritoryRepository
 * @package Pictime\Territory\Model\Repository
 */
class TerritoryRepository implements TerritoryRepositoryInterface
{
    /** @var Config */
    private Config $config;

    /** @var TerritoryFactory */
    private TerritoryFactory $factory;

    /** @var ResourceModel */
    private ResourceModel $resourceModel;

    /** @var ResourceCollection */
    private ResourceCollection $resourceCollection;

    /** @var FilterBuilder */
    private FilterBuilder $filterBuilder;

    /** @var SearchCriteriaBuilder */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /** @var TerritorySearchResultsFactory */
    private TerritorySearchResultsFactory $searchResultsFactory;

    /** @var CollectionProcessorInterface */
    private CollectionProcessorInterface $collectionProcessor;

    /** @var LoggerInterface */
    private LoggerInterface $logger;

    /**
     * @return Filter
     */
    private function createFilterIsActive(): Filter
    {
        return $this
            ->filterBuilder
            ->setConditionType('eq')
            ->setField(TerritoryInterface::IS_ACTIVE)
            ->setValue(true)
            ->create();
    }

    /**
     * TerritoryRepository constructor.
     * @param Config $config
     * @param TerritoryFactory $factory
     * @param ResourceModel $resourceModel
     * @param ResourceCollection $resourceCollection
     * @param FilterBuilder $filterBuilder
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param TerritorySearchResultsFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param LoggerInterface $logger
     */
    public function __construct(
        Config $config,
        TerritoryFactory $factory,
        ResourceModel $resourceModel,
        ResourceCollection $resourceCollection,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        TerritorySearchResultsFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor,
        LoggerInterface $logger
    )
    {
        $this->config = $config;
        $this->factory = $factory;
        $this->resourceModel = $resourceModel;
        $this->resourceCollection = $resourceCollection;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->logger = $logger;
    }

    /**
     * @param array $params
     * @return TerritoryInterface|Territory
     */
    public function create(array $params = []): TerritoryInterface
    {
        return $this->factory->create($params);
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria): TerritorySearchResultsInterface
    {
        $searchResults = $this->searchResultsFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);

        $this->collectionProcessor->process($searchCriteria, $this->resourceCollection);

        $searchResults->setTotalCount($this->resourceCollection->getSize());

        $items = [];

        foreach ($this->resourceCollection->getItems() as $item) {
            $items[] = $item;
        }

        $searchResults->setItems($items);

        return $searchResults;
    }

    /**
     * @inheridoc
     */
    public function getAll(): TerritorySearchResultsInterface
    {
        $searchCriteria = $this
            ->searchCriteriaBuilder
            ->create();

        return $this->getList($searchCriteria);
    }

    /**
     * @inheridoc
     */
    public function getListIsActive(): TerritorySearchResultsInterface
    {
        $searchCriteria = $this
            ->searchCriteriaBuilder
            ->addFilters([
                $this->createFilterIsActive(),
            ])
            ->create();

        return $this->getList($searchCriteria);
    }

    /**
     * @param mixed $value
     * @param null $field
     * @return TerritoryInterface
     */
    public function get($value, $field = null): TerritoryInterface
    {
        $entity = $this->create();

        $this->resourceModel->load($entity, $value, $field);

        return $entity;
    }

    /**
     * @return TerritoryInterface|null
     */
    public function getCurrent(): ?TerritoryInterface
    {
        return $this->get($this->config->getTerritoryId());
    }

    /**
     * @param string $code
     * @return TerritoryInterface|null
     */
    public function getByCode(string $code): ?TerritoryInterface
    {
        return $this->get($code, TerritoryInterface::CODE);
    }

    /**
     * @param TerritoryInterface $entity
     * @return bool
     */
    public function delete(TerritoryInterface $entity): bool
    {
        $result = true;

        try {

            $this->resourceModel->delete($entity);

        } catch (Exception $ex) {

            $result = false;

            $this->logger->error($ex->getMessage(), [
                'exception' => $ex
            ]);
        }

        return $result;
    }

    /**
     * @param TerritoryInterface $entity
     * @return bool
     */
    public function save(TerritoryInterface $entity): bool
    {
        $result = true;

        try {

            $this->resourceModel->save($entity);

        } catch (Exception $ex) {

            $result = false;

            $this->logger->error($ex->getMessage(), [
                'exception' => $ex
            ]);
        }

        return $result;
    }
}