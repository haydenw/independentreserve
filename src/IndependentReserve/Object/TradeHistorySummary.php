<?php

namespace IndependentReserve\Object;

use stdClass;

class TradeHistorySummary extends AbstractTimestampedObject
{
    /**
     * The primary currency being shown.
     * @return string
     */
    public function getPrimaryCurrencyCode()
    {
        return $this->object->PrimaryCurrencyCode;
    }

    /**
     * The secondary currency being used for pricing.
     * @return string
     */
    public function getSecondaryCurrencyCode()
    {
        return $this->object->SecondaryCurrencyCode;
    }

    /**
     * Number of past hours being returned.
     * @return int
     */
    public function getNumberOfHoursInThePastToRetrieve()
    {
        return $this->object->NumberOfHoursInThePastToRetrieve;
    }

    /**
     * List of hourly summary blocks.
     * @return array
     */
    public function getHistorySummaryItems()
    {
        return array_map(function (stdClass $object) {
            return HistorySummaryItem::createFromObject($object);
        }, $this->object->HistorySummaryItems);
    }
}
