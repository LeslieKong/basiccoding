<?php

declare(strict_types=1);

namespace designpatterns\creator\AbstractFactory;


class BlackHeader implements Header
{
    public function setBackgroundColor(): string
    {
        return '头部黑色';
    }
}