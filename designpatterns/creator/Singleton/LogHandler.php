<?php

declare(strict_types=1);

namespace designpatterns\creator\Singleton;


class LogHandler extends Singleton
{
    protected static ?Singleton $instance = null;
}