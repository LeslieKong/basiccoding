<?php

declare(strict_types=1);

namespace designpatterns\creator\FactoryMethod;


class FileLogger implements Logger
{
    public function write(): string
    {
        return 'File write.';
    }

    public function clear(): string
    {
        return 'File clear.';
    }
}