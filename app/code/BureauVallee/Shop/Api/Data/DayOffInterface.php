<?php

namespace BureauVallee\Shop\Api\Data;

/**
 * Interface DayOffInterface
 * @package BureauVallee\Shop\Api\Data
 */
interface DayOffInterface
{
    /** @var string */
    const DAY = 'day';

    /** @var string */
    const MONTH = 'month';

    /**
     * @return int
     */
    public function getDay(): int;

    /**
     * @param int $day
     */
    public function setDay(int $day): void;

    /**
     * @return int
     */
    public function getMonth(): int;

    /**
     * @param int $month
     */
    public function setMonth(int $month): void;
}