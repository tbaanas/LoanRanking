<?php

$URL = 'https://apiv2.systempartnerski.pl/partner-api/token';
$username = 'nst';
$password = 'b3RHTWJ4SE5yaUs1VXRTbkJkMUN0MFh6';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, [ "Authorization: Basic ".base64_encode($username.":".$password), ]);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$result = curl_exec ($ch);
curl_close($ch);

$result = json_decode($result);
$token = $result->token;




$ch = curl_init();
$request_headers = array('Accept: application/json; indent=4','X-Auth-Token: ' . $token);
curl_setopt($ch, CURLOPT_URL, "https://apiv2.systempartnerski.pl/partner-api/produkty");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result);
$ids = "";

sleep(7);

$data1 = date('Y-m-d', strtotime('-1 day'));
$data2 = date('Y-m-d');
$ch = curl_init();
$request_headers = array('Accept: application/json; indent=4','X-Auth-Token: ' . $token);
curl_setopt($ch, CURLOPT_URL, "https://apiv2.systempartnerski.pl/partner-api/wnioski?data_zmiany_statusu=".$data1."&data_zmiany_statusu=".$data2."&domain_id=67509&status_wniosku_id=PTW");
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);

if(!curl_errno($ch)){
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	$data = json_decode($response, true);

	if ($http_code == 200) {

		foreach ($data['wniosek'] as $wniosek) {
			//$CTR->Actions_model->accept($wniosek['etykieta']);
			echo $wniosek;
		}

	} else {
$message = "API: wystąpił błąd.\n";
if (isset($data['message'])) {
$message .= $data['message'];
}
echo $message;
}
} else {
echo 'Wystąpił błąd: ' . curl_error($ch);
}
curl_close($ch);

//stdClass Object ( [statusy_wnioskow] => Array ( [0] => stdClass Object ( [nazwa_krotka] => Kliknięty [kod] => KLK ) [1] => stdClass Object ( [nazwa_krotka] => Zaakceptowany [kod] => ZKC ) [2] => stdClass Object ( [nazwa_krotka] => Przetwarzany [kod] => WTR ) [3] => stdClass Object ( [nazwa_krotka] => Rozliczony [kod] => RZL ) [4] => stdClass Object ( [nazwa_krotka] => Wysłany [kod] => PTW ) ) ) {"count": 0, "wniosek": []} Liczba wniosków: 0

?>
