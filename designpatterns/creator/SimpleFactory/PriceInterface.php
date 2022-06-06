<?php

namespace designpatterns\creator\SimpleFactory;

interface PriceInterface
{
    public function count(float $price): float;
}