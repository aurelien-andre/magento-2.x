<?php

namespace Pictime\Territory\Block\Adminhtml\Territory\Edit\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Pictime\Territory\Block\Adminhtml\Territory\Edit\Button;

/**
 * Class Save
 * @package Pictime\Territory\Block\Adminhtml\Territory\Edit\Button
 */
class Save extends Button implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'pictime_territory_form.pictime_territory_form',
                                'actionName' => 'save',
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}