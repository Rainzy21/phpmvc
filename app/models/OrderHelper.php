<?php
class OrderHelper
{
    public static function calculateOrderCost($price_per_day, $qty, $rent_date, $return_date)
    {
        $days = (strtotime($return_date) - strtotime($rent_date)) / 86400;
        $days = max(1, $days);
        return $price_per_day * $qty * $days;
    }
}