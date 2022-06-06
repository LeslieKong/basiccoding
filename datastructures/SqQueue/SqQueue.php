<?php

declare(strict_types=1);

namespace datastructures\SqQueue;

/**
 * 队列的顺序存储结构-顺序队列的实现即基本操作
 *
 * C语言数组下标从0开始，因此我们顺序队列的第一个元素即为第0个元素，符合编程思维
 *
 * Class SqQueue
 * @package datastructures\SqQueue
 */
class SqQueue
{
    private int $head; // 队头指针
    private int $tail; // 队尾指针
    private int $size;
    private array $data;

    /**
     * 顺序队列初始化
     *
     * 构造一个空队列(对头=队尾)
     *
     * SqQueue constructor.
     */
    public function __construct()
    {
        $this->head = $this->tail = 0;
        $this->size = 0;
        $this->data = [];
    }

    /**
     * 队列是否为空
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->head === $this->tail;
    }

    /**
     * 队长
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 队头数据
     *
     * @return mixed|null
     */
    public function getHeadData()
    {
        return $this->data[$this->head] ?? null;
    }

    /**
     * 入队(从队尾入队)
     *
     * @param $data
     */
    public function push($data)
    {
        $this->data[$this->tail] = $data;
        $this->tail++;
        $this->size++;
    }

    /**
     * 出队(从队头出队)
     */
    public function pop()
    {
        // 队列不为空时执行出队
        if ($this->head !== $this->tail) {
            unset($this->data[$this->head]);
            $this->data = array_values($this->data);
            $this->size--;
        }
    }

    /**
     * 队列遍历，此处返回PHP数组
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}