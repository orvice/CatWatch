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
}