<?php

declare(strict_types=1);

namespace tests\datastructures\LinkList;


use datastructures\LinkList\LinkList;
use PHPUnit\Framework\TestCase;

class LinkListTest extends TestCase
{
    public function testConstruct(): LinkList
    {
        $linkList = new LinkList();
        $this->assertNull($linkList->getHead()->next, '单链表初始化头结点指针应为空');
        $this->assertSame(0, $linkList->getSize(), '单链表初始化长度应为0');

        return $linkList;
    }

    /**
     * @depends testConstruct
     * @param LinkList $linkList
     * @return LinkList
     */
    public function testAddAtIndex(LinkList $linkList): LinkList
    {
        $linkList->addAtIndex(0, 1);
        $linkList->addAtIndex(1, 2);
        $linkList->addAtIndex(2, 3);
        $linkList->addAtIndex(3, 4);
        $linkList->addAtIndex(5, 5);
        $this->assertNull($linkList->get(5), '插入4个元素后单链表长度为4，插入索引5应失败');
        $this->assertSame([1, 2, 3, 4], $linkList->toArray($linkList->getHead()), '单链表实际插入和遍历不一致');
        $this->assertSame(4, $linkList->getSize(), '单链表实际插入个数和单链表长度不一致');

        return $linkList;
    }

    /**
     * @depends testAddAtIndex
     * @param LinkList $linkList
     */
    public function testGetLocate(LinkList $linkList)
    {
        $this->assertSame(3, $linkList->getLocate($linkList->getHead(), 4), '单链表中值域为4的元素索引应为3');
        $this->assertSame(-1, $linkList->getLocate($linkList->getHead(), 5), '单链表中m没有值域为5的元素，索引应为-1');
    }

    /**
     * @depends testAddAtIndex
     * @param LinkList $linkList
     */
    public function testDelete(LinkList $linkList)
    {
        $linkList->delete(3);
        $this->assertSame([1, 2, 3], $linkList->toArray($linkList->getHead()), '删除第3个元素后链表应为[1, 2, 3]');
        $this->assertSame(3, $linkList->getSize(), '单链表4个元素删除一个后长度应为3');
    }

    public function testCreateListAtHead()
    {
        $linkList = new LinkList();
        $linkList->createListAtHead([4, 3, 2, 1]);
        $this->assertSame([1, 2, 3, 4], $linkList->toArray($linkList->getHead()), '单链表采用头插发插入[4,3,2,1]后应为[1,2,3,4]');
    }

    public function testCreateListAtTail()
    {
        $linkList = new LinkList();
        $linkList->createListAtTail([1, 2, 3, 4]);
        $this->assertSame([1, 2, 3, 4], $linkList->toArray($linkList->getHead()), '单链表采用尾插法插入[1,2,3,4]后应为[1,2,3,4]');
    }
}