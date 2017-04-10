<?php

namespace Alvo16\Calendar;

class Calendar implements \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\AppInjectableTrait;

    private $month = null;
    private $year = null;

    public function getHTMLCalendar()
    {
        $currentMonth = date('F', $this->app->session->get('time', time()));
        $currentYear = date('Y', $this->app->session->get('time', time()));

        $html = "<table class='calendar-container'>";
        $html .= "<caption>{$currentMonth}, {$currentYear}</caption>";
        $html .= "<tr>";
        $html .= "<th>Weeknr</th>";

        /**
         * Fetch weeknames headings
         */
        for ($i=0; $i < 7; $i++) {
            $html .= "<th>" . date('l', strtotime("{$i} day")) . "</th>";
        }

        /**
         * Show 6 weeks, negative value is offset.
         */
        for ($j=-2; $j < 4; $j++) {
            $weekNr =  date('W', strtotime("{$j} week"));
            $html .= "<tr>";
            $html .= "<td class='weeknr'>" . $weekNr . "</td>";

            /**
             * Fetch td
             */
            for ($k=0; $k < 7; $k++) {
                $thisDayText = date('l', strtotime("{$k} day {$j} week"));
                $thisMonth = date('F', strtotime("{$k} day {$j} week"));
                $thisDate = date('j', strtotime("{$k} day {$j} week"));

                $current = ($j === 0 && $k === 0) ? 'current' : '';
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


    public function isHoliday($day)
    {
        return $day === "Sunday" ? 'holiday' : '';
    }

    public function isThisMonth($day)
    {
        $month = date('F');
        return $day === $month ? '' : 'fade';
    }
}
