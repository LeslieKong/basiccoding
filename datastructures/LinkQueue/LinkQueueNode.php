<?php

declare(strict_types=1);

namespace datastructures\LinkQueue;

/**
 * 单链队节点类
 *
 * Class LinkQueueNode
 * @package datastructures\LinkQueue
 */
class LinkQueueNode
{
    public $data;
    public ?LinkQueueNode $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}