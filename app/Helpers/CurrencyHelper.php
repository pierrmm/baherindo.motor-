<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function format($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }

    public static function formatShort($amount)
    {
        if ($amount >= 1000000000) {
            return 'Rp ' . number_format($amount / 1000000000, 1) . 'M';
        } elseif ($amount >= 1000000) {
            return 'Rp ' . number_format($amount / 1000000, 1) . 'Jt';
        } elseif ($amount >= 1000) {
            return 'Rp ' . number_format($amount / 1000, 0) . 'rb';
        }
        
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}