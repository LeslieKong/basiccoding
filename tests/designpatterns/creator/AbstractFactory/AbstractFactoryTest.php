<?php

declare(strict_types=1);

namespace tests\designpatterns\creator\AbstractFactory;


use designpatterns\creator\AbstractFactory\BlackThemeFactory;
use designpatterns\creator\AbstractFactory\RedThemeFactory;
use PHPUnit\Framework\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function testSetTheme()
    {
        // 网易云主题-官方红
        $theme   = new RedThemeFactory();
        $header  = $theme->createHeader();
        $content = $theme->createContent();
        $footer  = $theme->createFooter();
        echo $header->setBackgroundColor();
        echo $content->setBackgroundColor();
        echo $footer->setBackgroundColor();
        echo PHP_EOL;

        // 网易云主题-酷炫黑
        $theme   = new BlackThemeFactory();
        $header  = $theme->createHeader();
        $content = $theme->createContent();
        $footer  = $theme->createFooter();
        echo $header->setBackgroundColor();
        echo $content->setBackgroundColor();
        echo $footer->setBackgroundColor();
    }
}