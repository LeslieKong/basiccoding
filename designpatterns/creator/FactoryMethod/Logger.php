<?php

namespace designpatterns\creator\FactoryMethod;

interface Logger
{
    public function write();

    public function clear();
}