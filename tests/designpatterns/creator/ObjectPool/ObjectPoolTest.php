<?php

declare(strict_types=1);

namespace tests\designpatterns\creator\ObjectPool;


use designpatterns\creator\ObjectPool\WorkerPool;
use PHPUnit\Framework\TestCase;

class ObjectPoolTest extends TestCase
{
    public function testGet()
    {
        $pool    = new WorkerPool();
        $worker1 = $pool->get();
        $worker2 = $pool->get();
        $this->assertCount(2, $pool);
        $this->assertNotSame($worker1, $worker2);

        print_r($pool);
    }

    public function testDispose()
    {
        $pool    = new WorkerPool();
        $worker1 = $pool->get();
        $pool->dispose($worker1);
        $worker2 = $pool->get();
        $this->assertCount(1, $pool);
        $this->assertSame($worker1, $worker2);

        print_r($pool);
    }
}