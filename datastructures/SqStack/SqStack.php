<?php

declare(strict_types=1);

namespace datastructures\SqStack;

/**
 * 顺序栈的实现及基本操作
 *
 * C语言数组下标从0开始，因此我们顺序栈的第一个元素即为第0个元素，符合编程思维
 *
 * Class SqStack
 * @package datastructures\SqStack
 */
class SqStack
{
    private int $top; // 栈顶指针
    private int $base; // 栈底指针
    private int $size;
    private array $data;

    /**
     * 顺序栈初始化
     *
     * 构造一个空栈(栈顶=栈底)
     *
     * SqStack constructor.
     */
    public function __construct()
    {
        $this->data = [];
        $this->size = 0;
        $this->top  = $this->base = 0;
    }

    /**
     * 栈是否为空
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->top === $this->base;
    }

    /**
     * 栈的长度
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 栈顶元素
     *
     * @return mixed|null
     */
    public function getTopData()
    {
        return $this->data[$this->top - 1] ?? null;
    }

    /**
     * 入栈
     *
     * 栈的插入删除都是在栈顶
     *
     * @param $data
     */
    public function push($data)
    {
        $this->data[$this->top] = $data;
        $this->top++;
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
        if ($this->top !== $this->base) {
            unset($this->data[$this->top - 1]);
            $this->data = array_values($this->data);
            $this->top--;
            $this->size--;
        }
    }

    /**
     * 栈的遍历，返回PHP数组
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}