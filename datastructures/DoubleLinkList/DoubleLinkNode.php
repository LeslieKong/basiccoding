<?php

declare(strict_types=1);

namespace datastructures\DoubleLinkList;

/**
 * 双链表节点类(包含数据域，指向前驱节点的指针，指向后继节点的指针)
 *
 * Class DoubleLinkNode
 * @package datastructures\DoubleLinkList
 */
class DoubleLinkNode
{
    public $data;
    public ?DoubleLinkNode $prev;
    public ?DoubleLinkNode $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->prev = null;
        $this->next = null;
    }
}