<?php
$api_key = "YOUR_API_KEY";
$prompt = "What is Rest Api?";

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.openai.com/v1/completions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"prompt\":\"$prompt\",\"max_tokens\":1024,\"model\":\"davinci\",\"stop\":\"\"}",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: Bearer $api_key"
    ),
));

$response = curl_exec($curl);

curl_close($curl);

$response_text = json_decode($response, true)['choices'][0]['text'];
echo $response_text;
