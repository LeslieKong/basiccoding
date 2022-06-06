<?php

declare(strict_types=1);

namespace designpatterns\creator\Singleton;


class DbConnection extends Singleton
{
    protected static ?Singleton $instance = null;
}