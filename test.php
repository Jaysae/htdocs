<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    echo "操作系统：<strong>" . get_os() . "</strong><br>";
    echo "浏览器：<strong>" . browse_info() . "</strong><br>";
    echo "Ip地址：<strong>" . getIp() . "</strong><br>";
    // echo "地址：<strong>" . getCity() . "</strong><br>";
    echo "当前时间是 " . date("Y-m-d H:i:s");
    ?>
</body>

</html>
<?php
//获取访问者ip地址
function getIp()
{
    if ($_SERVER['REMOTE_ADDR']) { //判断SERVER里面有没有ip，因为用户访问的时候会自动给你网这里面存入一个ip
        $cip = $_SERVER['REMOTE_ADDR'];
    } elseif (getenv("REMOTE_ADDR")) { //如果没有去系统变量里面取一次 getenv()取系统变量的方法名字
        $cip = getenv("REMOTE_ADDR");
    } elseif (getenv("HTTP_CLIENT_IP")) { //如果还没有在去系统变量里取下客户端的ip
        $cip = getenv("HTTP_CLIENT_IP");
    } else {
        $cip = "unknown";
    }
    return $cip == "::1" ? "127.0.0.1" : $cip;
}

function getCity($ip = '218.70.26.255') //获取地区
{
    $url = "http://ip.taobao.com/service/getIpInfo.php?ip=" . $ip; //淘宝借口需要填写ip
    $ip = json_decode(file_get_contents($url), true);
    $region = $ip['data']['region'];
    $city = $ip['data']['city'];
    $isp = $ip['data']['isp'];
    return  $region == $city ? $city . "市 " . $isp : $region . "省 " . $city . "市 " . $isp;
}

/**
 * 获得访问者浏览器
 */
function browse_info()
{
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $br = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i', $br)) {
            $br = 'MSIE';
        } else if (preg_match('/Firefox/i', $br)) {
            $br = 'Firefox';
        } else if (preg_match('/Chrome/i', $br)) {
            $br = 'Chrome';
        } else if (preg_match('/Safari/i', $br)) {
            $br = 'Safari';
        } else if (preg_match('/Opera/i', $br)) {
            $br = 'Opera';
        } else {
            $br = 'Other';
        }
        return $br;
    } else {
        return 'unknow';
    }
}

//获取系统
function get_os()
{

    $agent = $_SERVER['HTTP_USER_AGENT'];
    $os = false;

    if (preg_match('/win/i', $agent) && strpos($agent, '95')) {

        $os = 'Windows 95';
    } else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90')) {

        $os = 'Windows ME';
    } else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent)) {

        $os = 'Windows 98';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent)) {

        $os = 'Windows Vista';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent)) {

        $os = 'Windows 7';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent)) {

        $os = 'Windows 8';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent)) {

        $os = 'Windows 10';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent)) {

        $os = 'Windows XP';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent)) {

        $os = 'Windows 2000';
    } else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent)) {

        $os = 'Windows NT';
    } else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent)) {

        $os = 'Windows 32';
    } else if (preg_match('/linux/i', $agent)) {

        $os = 'Linux';
    } else if (preg_match('/unix/i', $agent)) {

        $os = 'Unix';
    } else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent)) {

        $os = 'SunOS';
    } else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent)) {

        $os = 'IBM OS/2';
    } else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent)) {

        $os = 'Macintosh';
    } else if (preg_match('/PowerPC/i', $agent)) {

        $os = 'PowerPC';
    } else if (preg_match('/AIX/i', $agent)) {

        $os = 'AIX';
    } else if (preg_match('/HPUX/i', $agent)) {

        $os = 'HPUX';
    } else if (preg_match('/NetBSD/i', $agent)) {

        $os = 'NetBSD';
    } else if (preg_match('/BSD/i', $agent)) {

        $os = 'BSD';
    } else if (preg_match('/OSF1/i', $agent)) {

        $os = 'OSF1';
    } else if (preg_match('/IRIX/i', $agent)) {

        $os = 'IRIX';
    } else if (preg_match('/FreeBSD/i', $agent)) {

        $os = 'FreeBSD';
    } else if (preg_match('/teleport/i', $agent)) {

        $os = 'teleport';
    } else if (preg_match('/flashget/i', $agent)) {

        $os = 'flashget';
    } else if (preg_match('/webzip/i', $agent)) {

        $os = 'webzip';
    } else if (preg_match('/offline/i', $agent)) {

        $os = 'offline';
    } else if (preg_match('/iPhone OS 8/i', $agent)) {

        $os = 'iOS 8';
    } else if (preg_match('/YisouSpider/i', $agent)) {

        $os = '一搜引擎';
    } else if (preg_match('/Yahoo! Slurp/i', $agent)) {

        $os = '雅虎引擎';
    } else if (preg_match('/iPhone OS 6/i', $agent)) {

        $os = 'iOS 6';
    } else if (preg_match('/Baiduspider/i', $agent)) {

        $os = '百度引擎';
    } else if (preg_match('/iPhone OS 10/i', $agent)) {

        $os = 'iOS 10';
    } else if (preg_match('/Mac OS X 10/i', $agent)) {

        $os = 'Mac OS 10';
    } else if (preg_match('/Ahrefs/i', $agent)) {

        $os = 'Ahrefs SEO 引擎';
    } else if (preg_match('/JikeSpider/i', $agent)) {

        $os = '即刻引擎';
    } else if (preg_match('/Googlebot/i', $agent)) {

        $os = '谷歌引擎';
    } else if (preg_match('/bingbot/i', $agent)) {

        $os = '必应引擎';
    } else if (preg_match('/iPhone OS 7/i', $agent)) {

        $os = 'iOS 7';
    } else if (preg_match('/Sogou web spider/i', $agent)) {

        $os = '搜狗引擎';
    } else if (preg_match('/IP-Guide.com Crawler/i', $agent)) {

        $os = 'IP-Guide Crawler 引擎';
    } else if (preg_match('/VenusCrawler/i', $agent)) {

        $os = 'VenusCrawler 引擎';
    } else {

        $os = $agent;
    }

    return $os;
}
