<?php

declare(strict_types=1);

namespace designpatterns\creator\Singleton;

/**
 * 单例抽象类
 *
 * 利用PHP后期静态绑定功能，该类的子类皆为单例
 *
 * Class Singleton
 * @package designpatterns\creator\Singleton
 */
abstract class Singleton
{
    protected static ?Singleton $instance = null;

    final private function __construct()
    {
    }

    final private function __clone()
    {
    }

    final public static function getInstance(): Singleton
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * 不能通过反序列化得到第二个相同对象
     *
     * @throws \Exception
     */
    final public function __wakeup()
    {
        throw new \Exception('Singleton cannot be unserialize.');
    }
}