<?php

declare(strict_types=1);

namespace designpatterns\creator\ObjectPool;


class StringReverseWorker
{
    public function run(string $str): string
    {
        return strrev($str);
    }
}