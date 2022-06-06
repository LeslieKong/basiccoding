<?php

declare(strict_types=1);

namespace designpatterns\creator\AbstractFactory;


class RedContent implements Content
{
    public function setBackgroundColor(): string
    {
        return '内容白色';
    }
}