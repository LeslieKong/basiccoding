<?php

declare(strict_types=1);

namespace designpatterns\creator\FactoryMethod;


class FileLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new FileLogger();
    }
}