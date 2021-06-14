<?php
if (!function_exists('main')) {
    function to_date_default($date)
    {
        $ex = explode('-', $date);
        $years = $ex[0];
        $month = $ex[1];
        $days = $ex[2];

        if ($month == '01') {
            $month = 'January';
        } elseif ($month == '02') {
            $month = 'February';
        } elseif ($month == '03') {
            $month = 'March';
        } elseif ($month == '04') {
            $month = 'April';
        } elseif ($month == '05') {
            $month = 'May';
        } elseif ($month == '06') {
            $month = 'June';
        } elseif ($month == '07') {
            $month = 'July';
        } elseif ($month == '08') {
            $month = 'August';
        } elseif ($month == '09') {
            $month = 'September';
        } elseif ($month == '10') {
            $month = 'October';
        } elseif ($month == '11') {
            $month = 'November';
        } else {
            $monthh = 'December';
        }

        $realDate = $days . ' ' . $month . ' ' . $years;
        return $realDate;
    }

    function conventionalDate($date)
    {
        $ex = explode(' ', $date);
        $years = $ex[2];
        $month = $ex[1];
        $days = $ex[0];

        if ($month == 'January') {
            $month = '01';
        } elseif ($month == 'February') {
            $month = '02';
        } elseif ($month == 'March') {
            $month = '03';
        } elseif ($month == 'April') {
            $month = '04';
        } elseif ($month == 'May') {
            $month = '05';
        } elseif ($month == 'June') {
            $month = '06';
        } elseif ($month == 'July') {
            $month = '07';
        } elseif ($month == 'August') {
            $month = '08';
        } elseif ($month == 'September') {
            $month = '09';
        } elseif ($month == 'October') {
            $month = '10';
        } elseif ($month == 'November') {
            $month = '11';
        } else {
            $month = '12';
        }

        $realDate = $years . '-' . $month . '-' . $days;
        return $realDate;
    }
}
