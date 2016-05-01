<?php
$data = $json_encode(array(
        Token => 'NDKBLIPYTLCQJYBENG7A',
        code => '1001',
        id => '901918668
    ));
// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://attendancetracker.mybluemix.net/attend',
    CURLOPT_POST => 1,
    CURLOPT_HTTPHEADER => array(
       'Content-Type: application/json'),
    CURLOPT_POSTFIELDS => $data
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
print_r($resp);
?>
