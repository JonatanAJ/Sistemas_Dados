<?php

$url = 'https://aslamsharedapi-production.up.railway.app/api/contract-by-name?name=A';

// Inicialize uma sessão cURL
$ch = curl_init($url);

// Configure a requisição cURL
$header = [
    'Accept: application/json',
    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJhc2xhbS1hcGkiLCJzdWIiOiJoZiIsImV4cCI6MTcyNjI0MDQ5NX0._wrPn21Cm5nrDPny5kx2Zp2dQqAJgI5GelzHt_dYws8'
];

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $header
]);

// Execute a requisição e obtenha a resposta
$response = curl_exec($ch);

// Decodifique o JSON da resposta
$data = json_decode($response, true);

// Feche a sessão cURL
curl_close($ch);
// Acesse dados específicos
$targetCode = 10001;
$selectedPaymentMethod = null;

foreach ($data as $paymentMethod) {
    if ($paymentMethod['cdPlano'] == $targetCode) {
        $selectedPaymentMethod = $paymentMethod;
        break;
    }
}


    echo 'Nome: ' . htmlspecialchars($selectedPaymentMethod['nmTitular']);

 



?>
