<?php

declare(strict_types=1);

namespace tests\datastructures\LinkStack;


use datastructures\LinkStack\LinkStack;
use PHPUnit\Framework\TestCase;

class LinkStackTest extends TestCase
{
    /**
     * @return LinkStack
     */
    public function testConstruct(): LinkStack
    {
        $linkStack = new LinkStack();
        $this->assertSame(0, $linkStack->getSize());
        $this->assertNull($linkStack->getTop());
        $this->assertTrue($linkStack->isEmpty());

        return $linkStack;
    }

    /**
     * @depends testConstruct
     * @param LinkStack $linkStack
     * @return LinkStack
     */
    public function testPush(LinkStack $linkStack): LinkStack
    {
        $linkStack->push(1);
        $linkStack->push(2);
        $linkStack->push(3);
        $linkStack->push(4);
        $this->assertSame(4, $linkStack->getSize());
        $this->assertSame(4, $linkStack->getTopData());
        $this->assertFalse($linkStack->isEmpty());
        $this->assertSame([4, 3, 2, 1], $linkStack->toArray($linkStack->getTop()));

        return $linkStack;
    }

    /**
     * @depends testPush
     * @param LinkStack $linkStack
     */
    public function testPop(LinkStack $linkStack)
    {
        $linkStack->pop();
        $this->assertSame(3, $linkStack->getSize());
        $this->assertSame(3, $linkStack->getTopData());
        $this->assertSame([3, 2, 1], $linkStack->toArray($linkStack->getTop()));
    }
}