<?php

declare(strict_types=1);

namespace designpatterns\creator\FactoryMethod;


class DbLogger implements Logger
{
    public function write(): string
    {
        return 'Db write.';
    }

    public function clear(): string
    {
        return 'Db clear.';
    }
}