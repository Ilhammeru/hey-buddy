<?php
if (!function_exists('date_time')) {
    function convertName($date)
    {
        if ($date == 'Mon') {
            $value = 'Senin';
        } elseif ($date == 'Tue') {
            $value = 'Selasa';
        } elseif ($date == 'Wed') {
            $value = 'Rabu';
        } elseif ($date == 'Thu') {
            $value = 'Kamis';
        } elseif ($date == 'Fri') {
            $value = 'Jumat';
        } elseif ($date == 'Sat') {
            $value = 'Sabtu';
        } elseif ($date == 'Sun') {
            $value = 'Minggu';
        }

        return $value;
    }

    function convertIdDay($date)
    {
        if ($date == 'Mon') {
            $value = '1';
        } elseif ($date == 'Tue') {
            $value = '2';
        } elseif ($date == 'Wed') {
            $value = '3';
        } elseif ($date == 'Thu') {
            $value = '4';
        } elseif ($date == 'Fri') {
            $value = '5';
        } elseif ($date == 'Sat') {
            $value = '6';
        } elseif ($date == 'Sun') {
            $value = '7';
        }

        return $value;
    }

    function covertShortDay($day)
    {
        $ex = explode('-', $day);
        $years = $ex[1];
        $month = $ex[2];
        $day = $ex[3];
    }
}
