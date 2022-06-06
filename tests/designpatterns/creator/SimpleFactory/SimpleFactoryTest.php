<?php

declare(strict_types=1);

namespace tests\designpatterns\creator\SimpleFactory;

use designpatterns\creator\SimpleFactory\PriceFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    public function testGetPrice()
    {
        $originalPrice = 100;

        // 普通用户
        $general = PriceFactory::build('general');
        $this->assertSame(100.00, $general->count($originalPrice));

        // 青铜会员 打1折
        $bronze = PriceFactory::build('bronze');
        $this->assertSame(90.00, $bronze->count($originalPrice));

        // 钻石会员 打5折
        $diamond = PriceFactory::build('diamond');
        $this->assertSame(50.00, $diamond->count($originalPrice));
    }
}