<?php

declare(strict_types=1);

namespace tests\datastructures\SqQueue;


use datastructures\SqQueue\SqQueue;
use PHPUnit\Framework\TestCase;

class SqQueueTest extends TestCase
{
    /**
     * @return SqQueue
     */
    public function testConstruct(): SqQueue
    {
        $sqQueue = new SqQueue();
        $this->assertSame(0, $sqQueue->getSize());
        $this->assertTrue($sqQueue->isEmpty());
        $this->assertNull($sqQueue->getHeadData());

        return $sqQueue;
    }

    /**
     * @depends testConstruct
     * @param SqQueue $sqQueue
     * @return SqQueue
     */
    public function testPush(SqQueue $sqQueue): SqQueue
    {
        $sqQueue->push(1);
        $sqQueue->push(2);
        $sqQueue->push(3);
        $sqQueue->push(4);
        $this->assertSame(4, $sqQueue->getSize());
        $this->assertFalse($sqQueue->isEmpty());
        $this->assertSame(1, $sqQueue->getHeadData());
        $this->assertSame([1, 2, 3, 4], $sqQueue->toArray());

        return $sqQueue;
    }

    /**
     * @depends testPush
     * @param SqQueue $sqQueue
     */
    public function testPop(SqQueue $sqQueue)
    {
        $sqQueue->pop();
        $this->assertSame(3, $sqQueue->getSize());
        $this->assertSame(2, $sqQueue->getHeadData());
        $this->assertSame([2, 3, 4], $sqQueue->toArray());
        $sqQueue->pop();
        $this->assertSame(2, $sqQueue->getSize());
        $this->assertSame(3, $sqQueue->getHeadData());
        $this->assertSame([3, 4], $sqQueue->toArray());
    }
}