<?php

declare(strict_types=1);

namespace datastructures\DoubleLinkList;

/**
 * 线性表的链式存储--双链表的实现及基本操作
 *
 * C语言数组下标从0开始，因此我们线性表的第一个元素即为第0个元素，符合编程思维
 *
 * Class DoubleLinkList
 * @package datastructures\DoubleLinkList
 */
class DoubleLinkList
{
    private ?DoubleLinkNode $head;
    private int $size;

    /**
     * 双链表初始化
     *
     * DoubleLinkList constructor.
     */
    public function __construct()
    {
        $this->head = new DoubleLinkNode();
        $this->size = 0;
    }

    /**
     * 在索引处插入一个元素
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

        // 开辟新的内存存储插入节点（同时设置了数据域）
        $current = new DoubleLinkNode($data);
        // 插入节点后继指向前一个节点的后继指向
        $current->next = $prev->next;
        // 前一个节点的后继指向插入节点
        $prev->next = $current;
        // 插入节点前驱指向前一个节点
        $current->prev = $prev;
        // 前一个节点后继指向的节点的前驱指向插入节点
        $prev->next->prev = $current;
        // 插入成功双链表长度增1
        $this->size++;
    }

    /**
     * 头插法（即从头结点后插入），此操作将重置并创建新的双链表
     *
     * 如双链表[1,2,3,4]插入顺序应为[4,3,2,1]
     *
     * @param array $data
     */
    public function createListAtHead(array $data)
    {
        $count = count($data);

        if ($count === 0) {
            return;
        }

        $this->head = new DoubleLinkNode();

        for ($i = 0; $i < $count; $i++) {
            $current                = new DoubleLinkNode($data[$i]);
            $current->next          = $this->head->next;
            $this->head->next       = $current;
            $current->prev          = $this->head;
            $this->head->next->prev = $current;
            $this->size++;
        }
    }

    /**
     * 尾插法（即从尾节点后插入），此操作将重置并创建新的双链表
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

        $tail = $this->head = new DoubleLinkNode();

        for ($i = 0; $i < $count; $i++) {
            $current       = new DoubleLinkNode($data[$i]);
            $current->prev = $tail;
            $tail->next    = $current;
            $tail          = $current;
            $this->size++;
        }
    }

    /**
     * 获取索引位置的节点数据
     *
     * @param int $index
     * @return mixed|null
     */
    public function get(int $index)
    {
        if ($index < 0 || $index >= $this->size) {
            return null;
        }

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
     * 获取双链表头结点
     *
     * @return DoubleLinkNode
     */
    public function getHead(): DoubleLinkNode
    {
        return $this->head;
    }

    /**
     * 判断数据是否在双链表中，是返回其所在索引，否则返回-1
     *
     * 从头结点开始
     *
     * @param DoubleLinkNode|null $prev
     * @param $data
     * @param int $i
     * @return int
     */
    public function getLocate(?DoubleLinkNode $prev, $data, int &$i = 0): int
    {
        $prev = $prev->next;

        if (is_null($prev)) {
            $i = -1;
        } elseif ($prev->data !== $data) {
            $i++;
            $this->getLocate($prev, $data, $i);
        }

        return $i;
    }

    /**
     * 删除索引位置的节点
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

        // 删除节点的前一个节点的后继指向删除节点的后继
        $prev->next = $prev->next->next;

        // 这里应判断删除节点后继指向的节点是否存在，比如[1,2,3,4]，删除4，4的后继指向的节点就为空
        if (isset($prev->next->next)) {
            // 删除节点后继指向的节点的前驱指向删除节点的前一个节点
            $prev->next->next->prev = $prev;
        }

        // 删除成功后长度减1
        $this->size--;
    }

    /**
     * 双链表的遍历，此处返回一个对应的php数组
     *
     * 从头结点开始遍历
     *
     * @param DoubleLinkNode|null $prev
     * @param array $array
     * @return array
     */
    public function toArray(?DoubleLinkNode $prev, array &$array = []): array
    {
        $prev = $prev->next;

        if (!is_null($prev)) {
            $array[] = $prev->data;
            $this->toArray($prev, $array);
        }

        return $array;
    }
}