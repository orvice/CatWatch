<?php
/**
 * sys class
 * @orvice
 *
 * 部分代码来自雅黑探针
 * http://www.yahei.net/
 */

class sys {

    public $res;

    function __construct(){
        $this->do_sys();
    }

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
        if ($days !== 0) $this->res['uptime'] = $days."天";
        if ($hours !== 0) $this->res['uptime'] .= $hours."小时";
        $this->res['uptime'] .= $min."分";
        return $this->res['uptime'];
    }

    function get_mem(){
        if (false === ($str = @file("/proc/meminfo"))) return false;

        $str = implode("", $str);

        preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);
        preg_match_all("/Buffers\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buffers);


        $res['memTotal'] = round($buf[1][0]/1024, 2);

        $res['memFree'] = round($buf[2][0]/1024, 2);

        $res['memBuffers'] = round($buffers[1][0]/1024, 2);
        $res['memCached'] = round($buf[3][0]/1024, 2);

        $res['memUsed'] = $res['memTotal']-$res['memFree'];

        $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;


        $res['memRealUsed'] = $res['memTotal'] - $res['memFree'] - $res['memCached'] - $res['memBuffers']; //真实内存使用
        $res['memRealFree'] = $res['memTotal'] - $res['memRealUsed']; //真实空闲
        $res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0; //真实内存使用率

        $res['memCachedPercent'] = (floatval($res['memCached'])!=0)?round($res['memCached']/$res['memTotal']*100,2):0; //Cached内存使用率

        $res['swapTotal'] = round($buf[4][0]/1024, 2);

        $res['swapFree'] = round($buf[5][0]/1024, 2);

        $res['swapUsed'] = round($res['swapTotal']-$res['swapFree'], 2);

        $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;

        $this->res['mem'] = $res;
        return $res;

    }


    function do_sys(){
        $this->get_load();
        $this->get_uptime();
        $this->get_mem();
        return $this->res;
    }

}