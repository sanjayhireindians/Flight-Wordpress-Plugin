<?php
$url = 'https://t06.run.cantoflight.com/api/v1/image?limit='. $_REQUEST['limit'] .'&start='. $_REQUEST['start'];

$header = array( 'Authorization: Bearer fffaf6d0c66c4075b5d13a5e936c3f63');

$ch = curl_init();

$options = array(
    CURLOPT_URL            => $url,
    CURLOPT_REFERER        => 'ian',
    CURLOPT_USERAGENT      => 'ian',
    CURLOPT_HTTPHEADER     => $header,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HEADER         => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_TIMEOUT        => 10,
);

curl_setopt_array( $ch, $options );
$data = curl_exec( $ch );
curl_close( $ch );

$out = json_decode($data);

header('Content-Type: application/json;charset=utf-8');
echo json_encode($out->results);
?>
