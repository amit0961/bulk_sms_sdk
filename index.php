<?php 

$data = array(
    "auth" => array(
        'username' => 'admin',
        'password' => 'n0@ccess4U',
        'acode' => '1005001'
    )
);
// echo '<pre>',print_r($data),'</pre>'; exit();
// Convert the PHP array into a JSON format
$payload = json_encode($data);
// echo '<pre>',print_r($payload),'</pre>'; exit();
// Initialise new cURL session
$ch = curl_init('http://202.126.123.152:8005/api');

// Return result of POST request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Get information about last transfer
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

// Use POST request
curl_setopt($ch, CURLOPT_POST, true);

// Set payload for POST request
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);
 
// Execute a cURL session
$result = curl_exec($ch);

/* ----------------- -------------------------------------------------
----------------- curl request error indication -----------------
----------------- ------------------------------------------------- */

$curl_errno = curl_errno($ch);
$curl_error = curl_error($ch);
if($curl_errno > 0) {
echo "cURL Error ($curl_errno): $curl_error\n";
} else {
echo "Curl Request Sent Successfully\n";
}


curl_close($ch);

echo $result;

?>