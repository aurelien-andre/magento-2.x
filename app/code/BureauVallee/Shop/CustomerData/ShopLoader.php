<?php

namespace BureauVallee\Shop\CustomerData;

use BureauVallee\Shop\Model\Converter\ShopConverterInterface;
use BureauVallee\Shop\Model\Locator\LocatorInterface;
use Magento\Customer\CustomerData\SectionSourceInterface;

/**
 * Class Shop
 * @package BureauVallee\Shop\CustomerData
 */
class ShopLoader implements SectionSourceInterface
{
    /** @var LocatorInterface */
    private LocatorInterface $locator;

    /** @var ShopConverterInterface */
    private ShopConverterInterface $converter;

    /**
     * @param LocatorInterface $locator
     * @param ShopConverterInterface $converter
     */
    public function __construct(
        LocatorInterface $locator,
        ShopConverterInterface $converter
    )
    {
        $this->locator = $locator;
        $this->converter = $converter;
    }

    /**
     * {@inheritdoc}
     */
    public function getSectionData(): array
    {
        $data = [];

        if ($this->locator->findShopContext()) {
            $data = $this->converter->convertShopToCustomerSection($this->locator->getShop());
        }

        return ['shop' => $data];
    }
}