<?php

namespace App\Tests\Entity;

use App\Entity\FoodTVA;
use PHPUnit\Framework\TestCase;

class UnitTest extends TestCase
{
    /**
     * @dataProvider pricesTVA
     */
    public function testTVA($price, $expectedTVA): void
    {
        $foodWithTVA = new FoodTVA("Product", FoodTVA::FOOD_PRODUCT, $price);
        $this->assertSame($expectedTVA, $foodWithTVA->computeTVA());

    }

    public function pricesTVA()
    {
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }

    /**
     * @dataProvider pricesWithoutTVA
     */
    public function testWithoutTVA($price, $expectedTVA): void
    {
        $foodWithoutTVA = new FoodTVA("Product", "no food", $price);
        $this->assertSame($expectedTVA, $foodWithoutTVA->computeTVA());
    }

    public function pricesWithoutTVA()
    {
        return [
          [0, 0.0],
          [20, 3.92],
            [100, 19.6]
        ];
    }
}
