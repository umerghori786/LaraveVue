<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\services\PaymentService;

class CalculatorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    
    public function test_check_add_function()
    {
        $check = (new PaymentService)->add(5,4);

        $this->assertEquals(9, $check);
    }
}
