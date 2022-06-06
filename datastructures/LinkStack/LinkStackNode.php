<?php

declare(strict_types=1);

namespace datastructures\LinkStack;

/**
 * 单链栈节点类（包含数据域和指向下一个节点的指针）
 *
 * Class LinkStackNode
 * @package datastructures\LinkStack
 */
class LinkStackNode
{
    public $data;
    public ?LinkStackNode $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}