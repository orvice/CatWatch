<?php
/**
 * sys class
 */

class sys {

    public $res;

    function get_load(){
        $load = sys_getloadavg();
        if ($load[0] > 80) {
            return -1;
        }else{
            $this->res['load'] = $load;
            return $load;
        }
    }

    function get_uptime()
    {
        if (false === ($str = @file("/proc/uptime"))){ return false; }
        $str = explode(" ", implode("", $str));
        $str = trim($str[0]);
        $min = $str / 60;
        $hours = $min / 60;
        $days = floor($hours / 24);
        $hours = floor($hours - ($days * 24));
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
        if ($days !== 0) $this->res['uptime'] = $days."D";
        if ($hours !== 0) $this->res['uptime'] .= $hours."H";
        $this->res['uptime'] .= $min."M";
        return $this->res['uptime'];
    }


    function do_sys(){
        $this->get_load();
        $this->get_uptime();
        return $this->res;
    }


}