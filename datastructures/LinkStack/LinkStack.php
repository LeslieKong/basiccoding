<?php

declare(strict_types=1);

namespace datastructures\LinkStack;

/**
 * 单链栈的实现及基本操作
 *
 * 栈的链式存储一般使用单链表来实现
 *
 * C语言数组下标从0开始，因此我们单链栈的第一个元素即为第0个元素，符合编程思维
 *
 * Class LinkStack
 * @package datastructures\LinkStack
 */
class LinkStack
{
    /**
     * 栈顶
     *
     * @var LinkStackNode|null
     */

    private ?LinkStackNode $top;

    /**
     * 栈长
     *
     * @var int
     */
    private int $size;

    /**
     * 单链栈初始化
     *
     * 由于栈的主要操作都是在栈顶，所以以链表头部作为栈顶是最方便的，所以没有必要设置头结点
     *
     * LinkStack constructor.
     */
    public function __construct()
    {
        $this->top  = null;
        $this->size = 0;
    }

    /**
     * 栈是否为空
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->top === null;
    }

    /**
     * 栈长
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 获取栈顶数据
     *
     * @return mixed|null
     */
    public function getTopData()
    {
        return $this->top->data ?? null;
    }

    /**
     * 栈顶指针
     *
     * @return LinkStackNode|null
     */
    public function getTop(): ?LinkStackNode
    {
        return $this->top;
    }

    /**
     * 入栈
     *
     * 栈的插入和删除都是在栈顶
     *
     * @param $data
     */
    public function push($data)
    {
        $current       = new LinkStackNode($data);
        $current->next = $this->top;
        $this->top     = $current;
        $this->size++;
    }

    /**
     * 出栈
     *
     * 栈的插入和删除都是在栈顶，所以每次出栈的都是栈顶元素
     */
    public function pop()
    {
        // 栈不为空，执行出栈
        if ($this->top !== null) {
            $this->top = $this->top->next;
            $this->size--;
        }
    }

    /**
     * 栈的遍历，此处返回PHP数组
     *
     * 从栈顶开始遍历
     *
     * @param LinkStackNode|null $top
     * @param array $array
     * @return array
     */
    public function toArray(?LinkStackNode $top, array &$array = []): array
    {
        if (!is_null($top)) {
            $array[] = $top->data;
            $this->toArray($top->next, $array);
        }

        return $array;
    }
}