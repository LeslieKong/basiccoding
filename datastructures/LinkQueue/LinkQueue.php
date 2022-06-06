<?php

declare(strict_types=1);

namespace datastructures\LinkQueue;

/**
 * 队列的链式存储结构-单链队的实现及基本操作
 *
 * 队列的链式存储一般使用单链表来描述
 *
 * C语言数组下标从0开始，因此我们顺序队列的第一个元素即为第0个元素，符合编程思维
 *
 * Class LinkQueue
 * @package datastructures\LinkQueue
 */
class LinkQueue
{
    private ?LinkQueueNode $head; // 头指针,始终指向头结点
    private ?LinkQueueNode $tail; // 尾指针
    private int $size;

    /**
     * 单链队初始化
     *
     * 构造一个只有头结点的空队
     *
     * LinkQueue constructor.
     */
    public function __construct()
    {
        $this->head = $this->tail = new LinkQueueNode();
        $this->size = 0;
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
        return $this->head->next->data ?? null;
    }

    /**
     * 队头指针
     *
     * @return LinkQueueNode|null
     */
    public function getHead(): ?LinkQueueNode
    {
        return $this->head;
    }

    /**
     * 入队(从队尾入队)
     *
     * @param $data
     */
    public function push($data)
    {
        $current          = new LinkQueueNode($data);
        $this->tail->next = $current;
        $this->tail       = $current;
        $this->size++;
    }

    /**
     * 出队(从队头出队)
     */
    public function pop()
    {
        // 队列不为空执行出队
        if ($this->head !== $this->tail) {
            $current          = $this->head->next;
            $this->head->next = $current->next;

            // 最后一个元素被删，队尾指针指向头结点
            if ($this->tail === $current) {
                $this->tail = $this->head;
            }

            $this->size--;
        }
    }

    /**
     * 单链队的遍历，此处返回PHP数组
     *
     * 遍历从头结点开始
     *
     * @param LinkQueueNode|null $prev
     * @param array $array
     * @return array
     */
    public function toArray(?LinkQueueNode $prev, array &$array = []): array
    {
        $prev = $prev->next;

        if (!is_null($prev)) {
            $array[] = $prev->data;
            $this->toArray($prev, $array);
        }

        return $array;
    }
}