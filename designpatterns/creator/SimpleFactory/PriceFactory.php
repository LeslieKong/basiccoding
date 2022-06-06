<?php

declare(strict_types=1);

namespace designpatterns\creator\SimpleFactory;


class PriceFactory
{
    public static function build(string $userType): PriceInterface
    {
        switch (strtolower($userType)) {
            case 'general':
                $builder = new PriceGeneral();
            break;
            case 'bronze':
                $builder = new PriceBronzeVip();
            break;
            case 'diamond':
                $builder = new PriceDiamondVip();
            break;
            default:
                throw new \InvalidArgumentException('Invalid param.');
        }

        return $builder;
    }
}