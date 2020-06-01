<?php
/*
define('PATH', '/home/tomekww/domains/zarabiacze.pl/public_html/');
define('APPPATH', PATH.'/application/');
define('ADMINPATH', PATH.'/admin/');
define('MODELSPATH', PATH.'/application/models/');
define('SYSPATH', PATH.'/system/');

require_once(PATH.'config/config.php');
require_once(PATH.'config/common.php');
require_once(PATH.'config/database.php');
$db =& load_class('db', 'core');

$db->hostname = $CFG['db']['hostname'];
$db->username = $CFG['db']['username'];
$db->password = $CFG['db']['password'];
$db->database = $CFG['db']['database'];
$db->charset = $CFG['db']['charset'];
$db->connect();
$URI =& load_class('uri', 'core');


require_once(SYSPATH.'core/Controller.php');
require_once(SYSPATH.'core/Model.php');

function &get_instance() {
	return CM_Controller::get_instance();
}

$CTR = new CM_controller;
$CTR->load->model('config', 'admin');
$CTR->load->model('users', 'admin');
$CTR->load->model('actions', 'admin');*/

/*$date1 = date('d/m/Y', strtotime('-1 day'));
$date2 = date('d/m/Y', strtotime('+1 day'));*/
$date1 ='10/01/2019';
$date2 ='20/05/2019';
$url = "http://www.comperialead.pl/users/Statystyki/csvgenerator/?&akcja=get_app_list_csv&wniosek_id=&uwaga=&akcje=null&id_bank=none;all&product_type=Wszystkie&prowizja_typ=Wszystkie&otw_pocz=".$date1."&otw_zak=".$date2."&rozl_pocz=&rozl_zak=&wypl_pocz=&wypl_zak=&kwota_od=&kwota_do=&prowizja_od=undefined&prowizja_do=undefined&brutto_od=&brutto_do=&strona=1&selectedDomain=all&urlValue=&number_per_page=10&linkString=";
//echo $url;
$login = "https://www.comperialead.pl/auth/login";
$PostFields = array(
        'username' => 'tomaszban98@gmail.com',
        'password' => 'debilka1',

);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $login);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9.0.7) Gecko/2009021910 Firefox/3.0.7');
curl_setopt($ch, CURLOPT_REFERER, 'https://www.comperialead.pl/logowanie.html');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $PostFields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; pl; rv:1.9.0.7) Gecko/2009021910 Firefox/3.0.7');
curl_setopt($ch, CURLOPT_REFERER, 'https://www.comperialead.pl');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);

$string = curl_exec($ch);
$string = substr($string, strpos($string, 'Status')+7);

curl_close($ch);
/*$pos=true;
if ($pos !== false) {*/

   // $string = substr($string, $pos);
    $string = str_replace(chr(10), ";", $string);


    $info = explode(";", $string);

    $i = 0;


    while (isset($info[$i]) && !empty($info[$i])) {
	      $subid = $info[$i+4];
	echo $info[$i];
		/*	if ($info[$i+10] == "Przekazany do banku")
			$CTR->Actions_model->accept($subid);


	      $i+=11;*/

	 }



/*

if ($pos !== false) {

    $string = substr($string, $pos);
    $string = str_replace(chr(10), ";", $string);


    $info = explode(";", $string);

    $i = 15;


    while (isset($info[$i]) && !empty($info[$i])) {

	      $subid = $info[$i+4];

			if ($info[$i+10] == "Przekazany do banku")
			$CTR->Actions_model->accept($subid);


	      $i+=11;

	 }
}
*/
?>
