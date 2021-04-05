<?php

namespace BureauVallee\Shop\Model\Locator;

/**
 * Class RulePool
 * @package BureauVallee\Shop\Model\Locator
 */
class RulePool implements RulePoolInterface
{
    /** @var RuleInterface[] */
    private array $rules = [];

    /**
     * RulePool constructor.
     * @param RuleInterface[] $rules
     */
    public function __construct(array $rules)
    {
        if (ksort($rules)) {
            $this->rules = $rules;
        }
    }

    /**
     * @return RuleInterface[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }
}