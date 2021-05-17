<?php

namespace Pictime\Territory\Block\Adminhtml\Territory\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Pictime\Territory\Block\Adminhtml\Territory\Edit\Button;

/**
 * Class Back
 * @package Pictime\Territory\Block\Adminhtml\Territory\Edit\Button
 */
class Back extends Button implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * @return string
     */
    public function getBackUrl(): string
    {
        return $this->getUrl('*/*/index');
    }
}