<?php


namespace tests\datastructures\LinkQueue;


use datastructures\LinkQueue\LinkQueue;
use PHPUnit\Framework\TestCase;

class LinkQueueTest extends TestCase
{
    /**
     * @return LinkQueue
     */
    public function testConstruct(): LinkQueue
    {
        $linkQueue = new LinkQueue();
        $this->assertSame(0, $linkQueue->getSize());
        $this->assertTrue($linkQueue->isEmpty());
        $this->assertNull($linkQueue->getHeadData());

        return $linkQueue;
    }

    /**
     * @depends testConstruct
     * @param LinkQueue $linkQueue
     * @return LinkQueue
     */
    public function testPush(LinkQueue $linkQueue): LinkQueue
    {
        $linkQueue->push(1);
        $linkQueue->push(2);
        $linkQueue->push(3);
        $linkQueue->push(4);
        $this->assertSame(4, $linkQueue->getSize());
        $this->assertFalse($linkQueue->isEmpty());
        $this->assertSame(1, $linkQueue->getHeadData());
        $this->assertSame([1, 2, 3, 4], $linkQueue->toArray($linkQueue->getHead()));

        return $linkQueue;
    }

    /**
     * @depends testPush
     * @param LinkQueue $linkQueue
     */
    public function testPop(LinkQueue $linkQueue)
    {
        $linkQueue->pop();
        $this->assertSame(3, $linkQueue->getSize());
        $this->assertSame(2, $linkQueue->getHeadData());
        $this->assertSame([2, 3, 4], $linkQueue->toArray($linkQueue->getHead()));
        $linkQueue->pop();
        $this->assertSame(2, $linkQueue->getSize());
        $this->assertSame(3, $linkQueue->getHeadData());
        $this->assertSame([3, 4], $linkQueue->toArray($linkQueue->getHead()));
        $linkQueue->pop();
        $linkQueue->pop();
        $this->assertSame(0, $linkQueue->getSize());
        $this->assertNull($linkQueue->getHeadData());
        $this->assertSame([], $linkQueue->toArray($linkQueue->getHead()));
    }
}