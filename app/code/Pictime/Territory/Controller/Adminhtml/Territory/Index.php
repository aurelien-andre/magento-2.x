<?php

namespace Pictime\Territory\Controller\Adminhtml\Territory;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Class Index
 * @package Pictime\Territory\Controller\Adminhtml\Territory
 */
class Index extends Action implements HttpGetActionInterface
{
    /** @var PageFactory */
    private PageFactory $pageFactory;

    /**
     * @param Context $context
     * @param PageFactory $rawFactory
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory
    ) {
        $this->pageFactory = $rawFactory;
        parent::__construct($context);
    }

    /**
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this
            ->pageFactory
            ->create();

        $resultPage
            ->setActiveMenu('Pictime_Territory::menu');

        $resultPage
            ->getConfig()
            ->getTitle()
            ->prepend(__('Territories'));

        return $resultPage;
    }
}