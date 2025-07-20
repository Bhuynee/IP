
<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$ip = $_SERVER['REMOTE_ADDR'];
$ua = $_SERVER['HTTP_USER_AGENT'];
$time = date("Y-m-d H:i:s");
$browser = "Unknown";
$device = "Unknown";

if (preg_match('/mobile/i', $ua)) $device = "Mobile";
if (preg_match('/windows/i', $ua)) $device = "Windows";
if (preg_match('/macintosh/i', $ua)) $device = "Mac";
if (preg_match('/android/i', $ua)) $device = "Android";
if (preg_match('/iphone/i', $ua)) $device = "iPhone";

if (preg_match('/chrome/i', $ua)) $browser = "Chrome";
if (preg_match('/firefox/i', $ua)) $browser = "Firefox";
if (preg_match('/safari/i', $ua)) $browser = "Safari";
if (preg_match('/edg/i', $ua)) $browser = "Edge";

$log = "$time|$ip|$device|$browser\n";
file_put_contents("ip-log.txt", $log, FILE_APPEND);
?>
