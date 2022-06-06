<?php

declare(strict_types=1);

namespace designpatterns\creator\SimpleFactory;


class PriceBronzeVip implements PriceInterface
{
    public function count(float $price): float
    {
        // 青铜会员打1折
        $price -= 0.1 * $price;

        return round($price, 2);
    }
}