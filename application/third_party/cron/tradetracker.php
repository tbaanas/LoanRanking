<?php

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
$CTR->load->model('actions', 'admin');

try {

	$client = new SoapClient('http://ws.tradetracker.com/soap/affiliate?wsdl', array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));
	$client->authenticate(170810, 'b31e133bec9c8356c8b474dbebf87370b2dc273f');

	$affiliateSiteID = 307739;

	$data1 = date('Y-m-d', strtotime('-1 day'));
	$data2 = date('Y-m-d', strtotime('+1 day'));

	$options = array (
		'registrationDateFrom' => $data1,
		'registrationDateTo' => $data2,
	);

	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}

	$affiliateSiteID = 325757;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}

	$affiliateSiteID = 307116;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}

	$affiliateSiteID = 307117;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}

	$affiliateSiteID = 304304;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}
	
	$affiliateSiteID = 223551;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}
	
	$affiliateSiteID = 219169;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}




} catch(Exception $e) {
    //echo 'Caught exception: ',  $e->getMessage(), "\n";
}




try {

	$client = new SoapClient('http://ws.tradetracker.com/soap/affiliate?wsdl', array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));
	$client->authenticate(138028, '1decec3eb24a360d6bd65db50ed5691b6dbf1cae');

	$affiliateSiteID = 250172;

	$data1 = date('Y-m-d', strtotime('-1 day'));
	$data2 = date('Y-m-d', strtotime('+1 day'));

	$options = array (
		'registrationDateFrom' => $data1,
		'registrationDateTo' => $data2,
	);

	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}
	
	$affiliateSiteID = 283027;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}


} catch(Exception $e) {
    //echo 'Caught exception: ',  $e->getMessage(), "\n";
}



try {

	$client = new SoapClient('http://ws.tradetracker.com/soap/affiliate?wsdl', array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));
	$client->authenticate(163917, 'e3d2d80da7fe82155dbafe60cdc98bb82ce67e27');

	$affiliateSiteID = 319802;

	$data1 = date('Y-m-d', strtotime('-1 day'));
	$data2 = date('Y-m-d', strtotime('+1 day'));

	$options = array (
		'registrationDateFrom' => $data1,
		'registrationDateTo' => $data2,
	);

	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}
	
	$affiliateSiteID = 357986;
	$response = $client->getConversionTransactions($affiliateSiteID, $options);

	foreach ($response as $transaction) {
		if ($transaction->reference)
			$CTR->Actions_model->accept($transaction->reference);
	}


} catch(Exception $e) {
    //echo 'Caught exception: ',  $e->getMessage(), "\n";
}