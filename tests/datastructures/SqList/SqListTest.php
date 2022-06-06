<?php

declare(strict_types=1);

namespace tests\datastructures\SqList;


use datastructures\SqList\SqList;
use PHPUnit\Framework\TestCase;

class SqListTest extends TestCase
{
    /**
     * @return SqList
     */
    public function testConstruct(): SqList
    {
        $sqList = new SqList();
        $this->assertSame(0, $sqList->getSize(), '顺序表初始化长度应为0');
        $this->assertSame([], $sqList->getData(), '顺序表初始化应为空表');

        return $sqList;
    }

    /**
     * @depends testConstruct
     * @param SqList $sqList
     * @return SqList
     */
    public function testAdd(SqList $sqList): SqList
    {
        $sqList->add(0, 1);
        $sqList->add(1, 2);
        $sqList->add(2, 3);
        $sqList->add(3, 4);
        $this->assertSame([1, 2, 3, 4], $sqList->toArray(), '插入元素应和顺序表元素一样');

        return $sqList;
    }

    /**
     * @depends testAdd
     * @param SqList $sqList
     */
    public function testGet(SqList $sqList)
    {
        $this->assertSame(2, $sqList->get(1), '第1个元素值域应为2');
        $this->assertEmpty($sqList->get(4), '没有第四个元素');
    }

    /**
     * @depends testAdd
     * @param SqList $sqList
     */
    public function testGetSize(SqList $sqList)
    {
        $this->assertSame(4, $sqList->getSize(), '顺序表长度应为4');
    }

    /**
     * @depends testAdd
     * @param SqList $sqList
     */
    public function testGetData(SqList $sqList)
    {
        $this->assertSame([1, 2, 3, 4], $sqList->getData(), '插入元素应和顺序表一致');
    }

    /**
     * @depends testAdd
     * @param SqList $sqList
     */
    public function testGetLocate(SqList $sqList)
    {
        $this->assertSame(1, $sqList->getLocate(2), '值为2的元素索引应为1');
        $this->assertSame(-1, $sqList->getLocate(5), '没有值为5的元素');
    }

    /**
     * @depends testAdd
     * @param SqList $sqList
     */
    public function testDelete(SqList $sqList)
    {
        $sqList->delete(1);
        $this->assertSame(3, $sqList->getSize(), '删除元素没有长度应减一');
        $this->assertSame([1, 3, 4], $sqList->toArray(), '元素删除后遍历不对');
    }
}