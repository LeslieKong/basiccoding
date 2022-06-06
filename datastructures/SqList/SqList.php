<?php

declare(strict_types=1);

namespace datastructures\SqList;

/**
 * Class SqList
 *
 * 线性表的顺序存储--顺序表的实现及基本操作
 *
 * C语言数组下标从0开始，因此我们线性表的第一个元素即为第0个元素，符合编程思维
 *
 * @package datastructures\SqList
 */
class SqList
{
    private array $data = [];
    private int $size = 0;

    /**
     * SqList constructor.
     *
     * 顺序表初始化，构造一个空的线性表
     */
    public function __construct()
    {
        $this->data = [];
        $this->size = 0;
    }

    /**
     * 在索引位置插入一个元素
     *
     * @param int $index
     * @param $data
     */
    public function add(int $index, $data)
    {
        if ($index < 0 || $index > $this->size) {
            return;
        }

        // 在第i个位置插入一个元素，需要从原来最后一个元素开始，依次先后移动一个位置，直到第i个元素为止
        for ($i = $this->size - 1; $i >= $index; $i--) {
            $this->data[$i + 1] = $this->data[$i];
        }

        // 在第i个位置插入数据，线性表长度增1
        $this->data[$index] = $data;
        $this->size++;
    }

    /**
     * 获取索引位置的值域
     *
     * @param int $index
     * @return mixed|null
     */
    public function get(int $index)
    {
        if ($index < 0 || $index >= $this->size) {
            return null;
        }

        return $this->data[$index];
    }

    /**
     * 获取顺序表长度
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * 获取顺序表所有元素
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }


    /**
     * 获取给定值域在顺序表中的位置，没有返回-1
     *
     * @param $data
     * @return int
     */
    public function getLocate($data): int
    {
        for ($i = 0; $i < $this->size; $i++) {
            if ($this->data[$i] === $data) {
                return $i;
            }
        }

        return -1;
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

        // 删除第i个元素，需要从第i个位置开始，依次把后一个元素向前移动一个位置，直到最后一个元素
        for ($i = $index; $i < $this->size - 1; $i++) {
            $this->data[$i] = $this->data[$i + 1];
        }

        // 顺序表长度减1
        $this->size--;
    }

    /**
     * 顺序表的遍历，此处返回一个对应的php数组
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}