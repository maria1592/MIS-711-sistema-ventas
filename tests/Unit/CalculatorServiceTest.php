<?php

namespace Tests\Unit;

use App\Services\CalculatorService;
use Tests\TestCase;

class CalculatorServiceTest extends TestCase
{
    public function test_increase_amount(): void
    {
        $service = new CalculatorService;

        $result = $service->increase(100, 20);

        $this->assertEquals(120, $result);
    }

    public function test_discount_amount(): void
    {
        $service = new CalculatorService;

        $result = $service->discount(100, 30);

        $this->assertEquals(70, $result);
    }
}
