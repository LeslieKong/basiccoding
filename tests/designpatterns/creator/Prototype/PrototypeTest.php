<?php

declare(strict_types=1);

namespace tests\designpatterns\creator\Prototype;


use designpatterns\creator\Prototype\WeekReport;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
    public function testWeekReport()
    {
        // 周报第一周
        $weekReport1 = new WeekReport();
        $weekReport1->setName('jp');
        $weekReport1->setContent('....');
        $weekReport1->setWeek('First week.');

        // 第二周
        $weekReport2 = $weekReport1->copy();
        $weekReport2->setWeek('Second week.');

        // 第三周
        $weekReport3 = $weekReport2->copy();
        $weekReport3->setWeek('Third week.');

        var_dump($weekReport1);
        var_dump($weekReport2);
        var_dump($weekReport3);

        $this->assertInstanceOf(WeekReport::class, $weekReport2);
        $this->assertInstanceOf(WeekReport::class, $weekReport3);
    }
}