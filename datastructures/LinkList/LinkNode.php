<?php

declare(strict_types=1);

namespace datastructures\LinkList;

/**
 * 单链表节点类(包含数据域和指向下一个节点的指针)
 *
 * Class LinkNode
 * @package datastructures\LinkList
 */
class LinkNode
{
    public $data;
    public ?LinkNode $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}