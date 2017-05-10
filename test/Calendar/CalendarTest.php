<?php

namespace Alvo16\Calendar;

/**
 *  A test class for Calendar
 */
class CalendarTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCurrentMonth()
    {
        $cal = new Calendar();
        $this->assertEquals('current', $cal->isCurrent(date('Y-n-j')));
        $this->assertInternalType('string', $cal->isCurrent(date('Y-n-j')));
    }

    public function testIsHoliday()
    {
        $cal = new Calendar();
        $this->assertInternalType('string', $cal->isHoliday(date('l')));
    }
}
