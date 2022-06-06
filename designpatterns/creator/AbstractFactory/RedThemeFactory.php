<?php

declare(strict_types=1);

namespace designpatterns\creator\AbstractFactory;


class RedThemeFactory implements ThemeFactory
{
    public function createHeader(): Header
    {
        return new RedHeader();
    }

    public function createContent(): Content
    {
        return new RedContent();
    }

    public function createFooter(): Footer
    {
        return new RedFooter();
    }
}