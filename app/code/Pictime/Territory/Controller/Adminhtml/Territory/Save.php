<?php

namespace Pictime\Territory\Controller\Adminhtml\Territory;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Pictime\Territory\Api\TerritoryRepositoryInterface;

/**
 * Class Index
 * @package Pictime\Territory\Controller\Adminhtml\Territory
 */
class Save extends Action implements HttpGetActionInterface
{
    /** @var TerritoryRepositoryInterface */
    private TerritoryRepositoryInterface $repository;

    public function __construct(
        TerritoryRepositoryInterface  $repository,
        Context $context
    )
    {
        $this->repository = $repository;
        parent::__construct(
            $context
        );
    }

    /**
     *
     */
    public function execute(): void
    {
        $request = $this->getRequest();

        $data = $this->getRequest()->getPostValue();

        var_dump($data);
        die();

        $redirectParams = [];

        if (!empty($data)) {

            $entity = $this->repository->create();

            if (true == $id = $request->getParam('id')) {

                $entity = $this->repository->get($id);
            }

            $entity->addData($data);

            $this->repository->save($entity);

            $redirectParams = ['id' => $entity->getId()];
        }

        $this->_redirect('pictime_territory/territory/edit', $redirectParams);
    }
}