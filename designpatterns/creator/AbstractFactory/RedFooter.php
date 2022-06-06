<?php

declare(strict_types=1);

namespace designpatterns\creator\AbstractFactory;


class RedFooter implements Footer
{
    public function setBackgroundColor(): string
    {
        return '底部白色';
    }
}