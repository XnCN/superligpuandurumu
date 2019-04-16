<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://brdg-d2d66d21-7796-4d6c-a6d5-7fee80f9d915.azureedge.net/soccer/widget/standings');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"tId\":1,\"stId\":0,\"calculation\":\"overall\",\"options\":{\"lang\":\"tr-TR\",\"origin\":\"ntvspor.net\",\"forceFullData\":true,\"timeZone\":3}}");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Referer: https://www.ntvspor.net/futbol/lig/spor-toto-super-lig/puan-durumu';
$headers[] = 'Origin: https://www.ntvspor.net';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.48 Safari/537.36 Edg/74.1.96.24';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
print $result;

?>
