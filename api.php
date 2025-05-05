<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.collectapi.com/economy/goldPrice",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: apikey 6yTQcA9Q4mtXLMs5f6sOkb:0xHiThEMxvFeeW5STSJh5U",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    http_response_code(500);
    echo json_encode(['error' => 'Bir hata oluştu: ' . $err]);
    exit;
}

$data = json_decode($response, true);

if (!isset($data['result']) || empty($data['result'])) {
    http_response_code(404);
    echo json_encode(['error' => 'altın fiyatları bilgisi alınamadı.']);
    exit;
}

$goldPrices = [];
foreach ($data['result'] as $item) {
    $goldPrices[] = [
        'isim' => $item['name'],
        'alis' => $item['buying'] . ' TL',
        'satis' => $item['selling'] . ' TL',
        'oran' => $item['rate'] . '%',
        'tarih' => $item['date'],
        'saat' => $item['time']
    ];
}

header('Content-Type: application/json');
echo json_encode(['altin_fiyatlari' => $goldPrices], JSON_UNESCAPED_UNICODE);
?>
