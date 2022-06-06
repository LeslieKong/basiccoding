<?php


namespace tests\datastructures\SqBinaryTree;


use datastructures\SqBinaryTree\SqBinaryTree;
use PHPUnit\Framework\TestCase;

class SqBinaryTreeTest extends TestCase
{
    public function testCreate()
    {
        $sqBinaryTree = new SqBinaryTree();
        $sqBinaryTree->create([1, 2, 3, 4]);
        $this->assertSame(3, $sqBinaryTree->getDepth());
        $sqBinaryTree->clear();
        $sqBinaryTree->create([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]);
        $this->assertSame(4, $sqBinaryTree->getDepth());
        $this->assertSame(1, $sqBinaryTree->getRoot());
    }
}