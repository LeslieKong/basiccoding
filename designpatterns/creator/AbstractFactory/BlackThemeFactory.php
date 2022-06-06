<?php

declare(strict_types=1);

namespace designpatterns\creator\AbstractFactory;


class BlackThemeFactory implements ThemeFactory
{
    public function createHeader(): Header
    {
        return new BlackHeader();
    }

    public function createContent(): Content
    {
        return new BlackContent();
    }

    public function createFooter(): Footer
    {
        return new BlackFooter();
    }
}