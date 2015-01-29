<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('relative_time')) {

    function relative_time($time) {

        $time = (is_string($time) ? strtotime($time) : $time);
        $timeSince = time() - $time;

        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            //3600 => 'hour',
            //60 => 'minute',
            1 => 'second'
        );

        $suffix = " ago";
        $prefix = "";

        if ($timeSince < 0) {
            $timeSince = -$timeSince;
            $suffix = "";
            $prefix = "in ";
        }

        foreach ($tokens as $unit => $text) {
            if ($timeSince < $unit) continue;
            $numberOfUnits = floor($timeSince / $unit);
            
            if($text=='second') {
                if($suffix == "") { // yesterday
                    return "Tomorrow";
                } else {
                    return "Today";
                }
            }
            return $prefix . $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '') . $suffix;
        }
    }

}
?>