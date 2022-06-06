<?php

declare(strict_types=1);

namespace tests\designpatterns\creator\Singleton;


use designpatterns\creator\Singleton\DbConnection;
use designpatterns\creator\Singleton\LogHandler;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testCreateSingleton()
    {
        $dbConnection1 = DbConnection::getInstance();
        $dbConnection2 = DbConnection::getInstance();
        $this->assertInstanceOf(DbConnection::class, $dbConnection1);
        $this->assertSame($dbConnection1, $dbConnection2);

        $logHandler1 = LogHandler::getInstance();
        $logHandler2 = LogHandler::getInstance();
        $this->assertInstanceOf(LogHandler::class, $logHandler1);
        $this->assertSame($logHandler1, $logHandler2);
    }
}