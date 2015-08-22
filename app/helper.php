<?php
/**
 * Date: 6/4 0004
 * Time: 9:49
 * @author GROOT (pzyme@outlook.com)
 */

if(!function_exists('time2str')) {
    function time2str($time) {
        $str = "";
        $time = floor($time);
        if (!$time)
            return "0 seconds";
        $d = $time/86400;
        $d = floor($d);
        if ($d){
            $str .= "$d days, ";
            $time = $time % 86400;
        }
        $h = $time/3600;
        $h = floor($h);
        if ($h){
            $str .= "$h hours, ";
            $time = $time % 3600;
        }
        $m = $time/60;
        $m = floor($m);
        if ($m){
            $str .= "$m minutes, ";
            $time = $time % 60;
        }
        if ($time)
            $str .= "$time seconds, ";
        $str = preg_replace("/, $/",'',$str);
        return $str;
    }
}

if(!function_exists('toxbyte')) {
    function toxbyte($size) {
        // Gigabytes
        if ( $size > 1073741824 )
        {
            $ret = $size / 1073741824;
            $ret = round($ret,2)." Gb";
            return $ret;
        }

        // Megabytes
        if ( $size > 1048576 )
        {
            $ret = $size / 1048576;
            $ret = round($ret,2)." Mb";
            return $ret;
        }

        // Kilobytes
        if ($size > 1024 )
        {
            $ret = $size / 1024;
            $ret = round($ret,2)." Kb";
            return $ret;
        }

        // Bytes
        if ( ($size != "") && ($size <= 1024 ) )
        {
            $ret = $size." B";
            return $ret;
        }
    }
}