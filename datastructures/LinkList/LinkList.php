<?php

declare(strict_types=1);

namespace datastructures\LinkList;

/**
 * 线性表的链式存储--单链表的实现及基本操作
 *
 * C语言数组下标从0开始，因此我们线性表的第一个元素即为第0个元素，符合编程思维
 *
 * Class LinkList
 * @package datastructures\LinkList
 */
class LinkList
{
    private ?LinkNode $head; // 头结点（一般设置头结点，便于对单链表元素的处理）
    private int $size; // 单链表长度

    /**
     * 单链表初始化
     *
     * LinkList constructor.
     */
    public function __construct()
    {
        $this->head = new LinkNode();
        $this->size = 0;
    }

    /**
     * 在索引位置插入一个元素
     *
     * @param int $index
     * @param $data
     */
    public function addAtIndex(int $index, $data)
    {
        if ($index < 0 || $index > $this->size) {
            return;
        }

        $prev = $this->head;

        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        // 开辟新的内存存储插入节点（同时设置其数据域）
        $current = new LinkNode($data);
        // 插入节点的后继指向前一个节点后继的指向
        $current->next = $prev->next;
        // 前一个节点的后继指向插入节点
        $prev->next = $current;
        // 插入后长度增1
        $this->size++;
    }

    /**
     * 头插法（即从头结点后插入），此操作将重置并创建新的单链表
     *
     * 如单链表[1,2,3,4]插入顺序应为[4,3,2,1]
     *
     * @param array $data
     */
    public function createListAtHead(array $data)
    {
        $count = count($data);

        if ($count === 0) {
            return;
        }

        // 创建一个只有头结点的空链表
        $this->head = new LinkNode();

        for ($i = 0; $i < $count; $i++) {
            $current          = new LinkNode($data[$i]);
            $current->next    = $this->head->next;
            $this->head->next = $current;
            $this->size++;
        }
    }

    /**
     * 尾插法（即从尾节点后插入），此操作将重置并创建新的单链表
     *
     * 如单链表[1,2,3,4]插入顺序应为[1,2,3,4]
     *
     * @param array $data
     */
    public function createListAtTail(array $data)
    {
        $count = count($data);

        if ($count === 0) {
            return;
        }

        // 创建一个只有头结点的空链表，因为为空表，所以尾节点=头结点
        $tail = $this->head = new LinkNode();

        for ($i = 0; $i < $count; $i++) {
            $current    = new LinkNode($data[$i]);
            $tail->next = $current;
            $tail       = $current;
            $this->size++;
        }
    }

    /**
     * 获取索引位置的数据
     *
     * @param int $index
     * @return null
     */
    public function get(int $index)
    {
        if ($index < 0 || $index >= $this->size) {
            return null;
        }

        // 单链表是单向依次遍历的,需要找到前一个节点
        $prev = $this->head;

        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        return $prev->next->data;
    }

    /**
     * 获取单链表长度
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 获取头结点
     *
     * @return LinkNode
     */
    public function getHead(): LinkNode
    {
        return $this->head;
    }

    /**
     * 判断值域是否存在于单链表，存在返回其索引，否则返回-1
     *
     * 用递归求解（递归：在一个函数，结构体，数据结构内部直接或间接定义其自身）
     *
     * 从头结点开始
     *
     * @param LinkNode|null $prev 指针指向
     * @param mixed $data 查找数据
     * @param int $index 索引
     * @return int
     */
    public function getLocate(?LinkNode $prev, $data, int &$index = 0): int
    {
        $prev = $prev->next;

        if (is_null($prev)) {
            $index = -1;
        } elseif ($prev->data !== $data) {
            $index++;
            $this->getLocate($prev, $data, $index);
        }

        return $index;
    }

    /**
     * 删除索引位置的元素
     *
     * @param int $index
     */
    public function delete(int $index)
    {
        if ($index < 0 || $index >= $this->size) {
            return;
        }

        $prev = $this->head;

        for ($i = 0; $i < $index; $i++) {
            $prev = $prev->next;
        }

        // 将前一个节点的指针指向删除节点的下一个节点, 长度减1
        $prev->next = $prev->next->next;
        $this->size--;
    }

    /**
     * 单链表的遍历，此处返回一个对应的php数组
     *
     * 从头结点开始遍历
     *
     * @param LinkNode|null $prev
     * @param array $array
     * @return array
     */
    public function toArray(?LinkNode $prev, array &$array = []): array
    {
        $prev = $prev->next;

        if (!is_null($prev)) {
            $array[] = $prev->data;
            $this->toArray($prev, $array);
        }

        return $array;
    }
}