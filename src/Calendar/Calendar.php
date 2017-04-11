<?php

namespace Alvo16\Calendar;

class Calendar implements \Anax\Common\AppInjectableInterface
{

    use \Anax\Common\AppInjectableTrait;



    /**
     * Returns html calendar
     * @return string HTML Calendar
     */
    public function getHTMLCalendar()
    {
        $dateOffset = self::getDateOffset();
        $currentMonth = self::getCurrentMonth();
        $currentYear = self::getCurrentYear();

        $html = "<table class='calendar-container'>";
        $html .= "<caption>{$currentMonth}, {$currentYear}</caption>";
        $html .= "<tr>";
        $html .= "<th>Weeknr</th>";

        /**
         * Fetch weeknames headings
         */
        for ($i=0; $i < 7; $i++) {
            $html .= "<th>" . date('l', strtotime("{$i} day {$dateOffset} month")) . "</th>";
        }

        /**
         * Show 6 weeks, negative value is offset.
         */
        for ($j=-2; $j < 4; $j++) {
            $weekNr =  date('W', strtotime("{$j} week {$dateOffset} month"));
            $html .= "<tr>";
            $html .= "<td class='weeknr'>" . $weekNr . "</td>";

            /**
             * Fetch td
             */
            for ($k=0; $k < 7; $k++) {
                $thisDayText = date('l', strtotime("{$k} day {$j} week {$dateOffset} month"));
                $thisMonth = date('F', strtotime("{$k} day {$j} week {$dateOffset} month"));
                $thisDate = date('j', strtotime("{$k} day {$j} week {$dateOffset} month"));
                $fullDate = date('Y-n-j', strtotime("{$k} day {$j} week {$dateOffset} month"));

                $current = self::isCurrent($fullDate);
                $holiday = self::isHoliday($thisDayText);
                $month = self::isThisMonth($thisMonth);

                $html .= "<td class='{$current} {$holiday} {$month}'>" . $thisDate . "</td>";
            }
            $html .= "</tr>";
        }


        $html .= "</tr>";
        $html .= "</table>";

        return $html;
    }



    /**
     * Returns current month
     * @return string Current month
     */
    public function getCurrentMonth()
    {
        return date('F', strtotime(self::getDateOffset() . " month"));
    }



    /**
     * Returns current year
     * @return string Current year
     */
    public function getCurrentYear()
    {
        return date('Y', strtotime(self::getDateOffset() . " month"));
    }



    /**
     * Returns current offset
     *
     * Used for pagination purposes
     * @return int Pagination offset
     */
    public function getDateOffset()
    {
        return $this->app->session->get('dateOffset', 0);
    }



    /**
     * Checks is given day is a holiday
     * @param  string  $day Week day name
     * @return string      Returns class name
     */
    public function isHoliday($day)
    {
        return $day === "Sunday" ? 'holiday' : '';
    }



    /**
     * Checks if given day belongs to this month
     * @param  string  $day Month name
     * @return string      Class name
     */
    public function isThisMonth($day)
    {
        $month = date('F', strtotime(self::getDateOffset() . " month"));
        return $day === $month ? '' : 'fade';
    }



    /**
     * Checks if the day is today
     * @param  string  $day Date Year-month-day
     * @return string      Class name
     */
    public function isCurrent($day)
    {
        return date('Y-n-j') === $day ? 'current' : '';
    }
}
