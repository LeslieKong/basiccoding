<?php

declare(strict_types=1);

namespace designpatterns\creator\AbstractFactory;


class BlackContent implements Content
{
    public function setBackgroundColor(): string
    {
        return '内容浅黑色';
    }
}