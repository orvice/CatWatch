<?php


class fetch {
    public $url;
    public $togb;

    function __construct($url){
        $this->url = $url;
        $this->togb = 1024*1024;
    }
    //time hour day month total
    function get_array(){
        $c    = curl_init($this->url);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($c);
        curl_close($c);
        return json_decode($json,true);
    }

    //uptime
    function get_uptime(){
        return $this->get_array()['uptime'];
    }
    //load
    function get_load(){
        return $this->get_array()['load'];
    }

    //Traffic
    function get_traffic_hour(){
        $a =  $this->get_array()['traffic'];
        $hour = $a['hour']['rx']+$a['hour']['tx'];
        $hour = round($hour/$this->togb,3);
        return $hour."GiB";
    }

    function get_traffic_day(){
        $a =  $this->get_array()['traffic'];
        $hour = $a['day']['rx']+$a['day']['tx'];
        $hour = round($hour/$this->togb,3);
        return $hour."GiB";
    }

    function get_traffic_month(){
        $a =  $this->get_array()['traffic'];
        $hour = $a['month']['rx']+$a['month']['tx'];
        $hour = round($hour/$this->togb,3);
        return $hour."GiB";
    }

    function get_traffic_total(){
        $a =  $this->get_array()['traffic'];
        $hour = $a['total']['rx']+$a['total']['tx'];
        $hour = round($hour/$this->togb,3);
        return $hour."GiB";
    }


}