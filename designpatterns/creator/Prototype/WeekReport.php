<?php

declare(strict_types=1);

namespace designpatterns\creator\Prototype;


class WeekReport extends Prototype
{
    private string $name;
    private string $week;
    private string $content;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getWeek(): string
    {
        return $this->week;
    }

    /**
     * @param string $week
     */
    public function setWeek(string $week): void
    {
        $this->week = $week;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}