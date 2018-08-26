<?php
/*
Edited : Alafafah
instagram >> Ariefmunandars
*/
session_start();
error_reporting(0);
set_time_limit(0);
ignore_user_abort(1);
require_once('fungsi.php');

$RD="\e[31m"; $GR="\e[2;32m"; $OG="\e[92m"; $WH="\e[37m";  $YL="\e[33m"; $BF="\e[34m"; $DF="\e[39m"; $OR="\e[33m"; $PP="\e[35m"; $CY="\e[36m"; $B="\e[1m"; $CC="\e[0m"; $BL="\e[0;30m";
echo"\n\e[2;32mhttp://FACEBOOK.COM/ARIEF.ARIEF.MUNANDAR";
echo"\n\e[31mEdited By ARIEF MUNANDAR\n";
echo"\n ".$PP."Masukkan Username : ";
$user = trim(fgets(STDIN));
echo " ".$PP."Masukkan Password : \e[0;30m";
$pass = trim(fgets(STDIN));
echo"\e[1;36m  |Try to login..\n";{
$ua = generate_useragent();
$devid = generate_device_id();
$login = proccess(1, $ua, 'accounts/login/', 0, hook('{"device_id":"'.$devid.'","guid":"'.generate_guid().'","username":"'.$user.'","password":"'.$pass.'","Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"}'));
$data = json_decode($login[1]);
if($data->status<>ok)
echo ''.$RD.' Username/Password Salah! ';
	else{
		preg_match_all('%Set-Cookie: (.*?);%',$login[0],$d);$cookie = '';
		for($o=0;$o<count($d[0]);$o++)$cookie.=$d[1][$o].";";
		$_SESSION['data'] = array('cookies' => $cookie, 'useragent' => $ua, 'device_id' => $devid, 'username' => $data->logged_in_user->username, 'id' => $data->logged_in_user->pk);
		echo"\e[1;32m  |Success..\n";
		echo ' Cookies : ';
		echo "\n";
		echo ''.$cookie.' ';
		echo "\n";
		echo ' Useragent :';
		echo "\n";
		echo ''.$ua.' ';
		echo "\n";
	}
} 
?>
