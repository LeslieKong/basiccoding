<?php

declare(strict_types=1);

namespace tests\designpatterns\creator\FactoryMethod;


use designpatterns\creator\FactoryMethod\DbLoggerFactory;
use designpatterns\creator\FactoryMethod\FileLoggerFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testLog()
    {
        // DbLogger
        $loggerFactory = new DbLoggerFactory();
        $logger        = $loggerFactory->createLogger();
        $write         = $logger->write();
        $clear         = $logger->clear();
        echo $write;
        echo $clear;

        // FileLogger
        $loggerFactory = new FileLoggerFactory();
        $logger        = $loggerFactory->createLogger();
        $write         = $logger->write();
        $clear         = $logger->clear();
        echo $write;
        echo $clear;
    }
}