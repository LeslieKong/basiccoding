<?php

declare(strict_types=1);

namespace designpatterns\creator\AbstractFactory;


class RedHeader implements Header
{
    public function setBackgroundColor(): string
    {
        return '头部红色';
    }
}