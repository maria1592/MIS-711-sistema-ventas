<?php

namespace App\Services;

class CalculatorService
{
    public function increase(float $amount, float $value): float
    {
        return $amount + $value;
    }

    public function discount(float $amount, float $value): float
    {
        return $amount - $value;
    }
}
