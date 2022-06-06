<?php

declare(strict_types=1);

namespace tests\datastructures\SqStack;


use datastructures\SqStack\SqStack;
use PHPUnit\Framework\TestCase;

class SqStackTest extends TestCase
{
    public function testConstruct(): SqStack
    {
        $sqStack = new SqStack();
        $this->assertSame(0, $sqStack->getSize(), '顺序栈初始化长度为0');
        $this->assertSame([], $sqStack->toArray(), '顺序栈初始化为[]');
        $this->assertTrue($sqStack->isEmpty());

        return $sqStack;
    }

    /**
     * @depends testConstruct
     * @param SqStack $sqStack
     * @return SqStack
     */
    public function testPush(SqStack $sqStack): SqStack
    {
        $sqStack->push(1);
        $sqStack->push(2);
        $sqStack->push(3);
        $sqStack->push(4);
        $this->assertSame([1, 2, 3, 4], $sqStack->toArray());
        $this->assertSame(4, $sqStack->getSize());
        $this->assertSame(4, $sqStack->getTopData());
        $this->assertFalse($sqStack->isEmpty());

        return $sqStack;
    }

    /**
     * @depends testPush
     * @param SqStack $sqStack
     */
    public function testPop(SqStack $sqStack)
    {
        $sqStack->pop();
        $this->assertSame([1, 2, 3], $sqStack->toArray());
        $this->assertSame(3, $sqStack->getSize());
        $this->assertSame(3, $sqStack->getTopData());
        $sqStack->pop();
        $this->assertSame([1, 2], $sqStack->toArray());
        $this->assertSame(2, $sqStack->getSize());
        $this->assertSame(2, $sqStack->getTopData());
    }
}