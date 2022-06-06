<?php

declare(strict_types=1);

namespace designpatterns\creator\SimpleFactory;


class PriceGeneral implements PriceInterface
{
    public function count(float $price): float
    {
        // 维持原价,价格保留两位小数
        return round($price, 2);
    }
}