<?php

declare(strict_types=1);

namespace designpatterns\creator\Prototype;

/**
 * 原型抽象类
 *
 * Class Prototype
 * @package designpatterns\creator\Prototype
 */
abstract class Prototype
{
    final public function copy(): Prototype
    {
        return unserialize(serialize($this));
    }

    /**
     * 拒绝clone,统一使用copy
     *
     * @throws \Exception
     */
    public function __clone()
    {
        throw new \Exception('Refused to clone, please use the copy method.');
    }
}