<?php

// init the resource+
$pageNumber=1;
$token2="172b4b8d6b3191a189160372052b9cbb2173ccc9";




$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_HTTPHEADER, [ "Authorization: ".$token2 ]);
curl_setopt($ch, CURLINFO_CONTENT_TYPE,("application/json") );
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$result = curl_exec ($ch);
curl_close($ch);

$result = json_decode($result);
$token = $result->token;





$ch = curl_init();
$request_headers = array('Accept: application/json; indent=4','X-Auth-Token: ' . $token);
curl_setopt($ch, CURLOPT_URL, "https://bluepartner.pl/api/partner_api/campaigns/?page=".$pageNumber);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
//echo $response;
$data=json_decode($response);
foreach ($data as $wniosek) {
	//$CTR->Actions_model->accept($wniosek['etykieta']);
	echo $wniosek;

}
/*if(!curl_errno($ch)){
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	$data = json_decode($response, true);

	if ($http_code == 200) {

		foreach ($data['wniosek'] as $wniosek) {
			//$CTR->Actions_model->accept($wniosek['etykieta']);
			echo $wniosek;
			echo $wniosek['etykieta'];
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
}*/
curl_close($ch);
?>
