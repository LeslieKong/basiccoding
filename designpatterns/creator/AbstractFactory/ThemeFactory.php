<?php


namespace designpatterns\creator\AbstractFactory;


interface ThemeFactory
{
    public function createHeader();

    public function createContent();

    public function createFooter();
}