<?php

declare(strict_types=1);

namespace tests\datastructures\DoubleLinkList;


use datastructures\DoubleLinkList\DoubleLinkList;
use PHPUnit\Framework\TestCase;

class DoubleLinkListTest extends TestCase
{
    public function testConstruct(): DoubleLinkList
    {
        $doubleLinkList = new DoubleLinkList();
        $this->assertNull($doubleLinkList->getHead()->next, '双链表初始化头结点后继指针应为空');
        $this->assertSame(0, $doubleLinkList->getSize(), '双链表初始化应是长度为0的空表');

        return $doubleLinkList;
    }

    /**
     * @depends testConstruct
     * @param DoubleLinkList $doubleLinkList
     * @return DoubleLinkList
     */
    public function testAddAtIndex(DoubleLinkList $doubleLinkList): DoubleLinkList
    {
        $doubleLinkList->addAtIndex(0, 1);
        $doubleLinkList->addAtIndex(1, 2);
        $doubleLinkList->addAtIndex(2, 3);
        $doubleLinkList->addAtIndex(3, 4);
        $doubleLinkList->addAtIndex(5, 5);
        $this->assertNull($doubleLinkList->get(5), '双链表长度为4，在索引位置5处插入应失败');
        $this->assertSame(1, $doubleLinkList->get(0), '双链表的索引位置0的值域应为1');
        $this->assertSame(4, $doubleLinkList->getSize(), '线性表的长度应为4');
        $this->assertSame([1, 2, 3, 4], $doubleLinkList->toArray($doubleLinkList->getHead()), '插入双链表的元素和实际遍历的元素应一致');

        return $doubleLinkList;
    }

    /**
     * @depends testAddAtIndex
     * @param DoubleLinkList $doubleLinkList
     */
    public function testGetLocate(DoubleLinkList $doubleLinkList)
    {
        $this->assertSame(2, $doubleLinkList->getLocate($doubleLinkList->getHead(), 3), '双链表中值域为3的索引应为2');
        $this->assertSame(-1, $doubleLinkList->getLocate($doubleLinkList->getHead(), 5), '双链表中没有值域为5的元素，索引应为-1');
    }

    /**
     * @depends testAddAtIndex
     * @param DoubleLinkList $doubleLinkList
     */
    public function testDelete(DoubleLinkList $doubleLinkList)
    {
        $doubleLinkList->delete(3);
        $this->assertNull($doubleLinkList->get(3), '双链表已删除索引3处的元素，值应为空');
        $this->assertSame(3, $doubleLinkList->getSize(), '长度为4的双链表删除一个元素后值应为3');
        $this->assertSame([1, 2, 3], $doubleLinkList->toArray($doubleLinkList->getHead()), '删除索引3处的元素后的双链表应为[1, 2, 3]');
    }

    public function testCreateAtHead()
    {
        $doubleLinkList = new DoubleLinkList();
        $doubleLinkList->createListAtHead([4, 3, 2, 1]);
        $this->assertSame([1, 2, 3, 4], $doubleLinkList->toArray($doubleLinkList->getHead()), '双链表采用头插法插入[4,3,2,1]应为[1,2,3,4]');
        $this->assertSame(4, $doubleLinkList->getSize(), '双链表头插法插入[4,3,2,1]后长度应为4');
    }

    public function testCreateListAtTail()
    {
        $doubleLinkList = new DoubleLinkList();
        $doubleLinkList->createListAtTail([1, 2, 3, 4]);
        $this->assertSame([1, 2, 3, 4], $doubleLinkList->toArray($doubleLinkList->getHead()), '双链表采用尾插法插入[1,2,3,4]应为[1,2,3,4]');
        $this->assertSame(4, $doubleLinkList->getSize(), '双链表尾插法插入[1,2,3,4]后长度应为4');
    }
}