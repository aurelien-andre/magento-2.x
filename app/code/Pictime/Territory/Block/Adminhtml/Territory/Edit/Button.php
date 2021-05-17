<?php

namespace Pictime\Territory\Block\Adminhtml\Territory\Edit;

use Magento\Backend\Block\Widget\Context;

/**
 * Class Button
 * @package Pictime\Territory\Block\Adminhtml\Territory\Edit
 */
class Button
{
    /**
     * @var Context
     */
    protected Context $context;

    /**
     * Button constructor.
     * @param Context $context
     */
    public function __construct(
        Context $context
    )
    {
        $this->context = $context;;
    }

    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this
            ->context
            ->getUrlBuilder()
            ->getUrl($route, $params);
    }
}
