<?php

declare(strict_types=1);

namespace designpatterns\creator\SimpleFactory;


class PriceDiamondVip implements PriceInterface
{
    public function count(float $price): float
    {
        // 钻石会员打5折
        $price -= 0.5 * $price;

        return round($price, 2);
    }
}