<?php

// Seus numeros aqui de teste 
$tell1 = "+258"; // Substituir pelo numero deseja enviar a mensagem
$tell12 = "+258"; // Substituir pelo numero que deseja enviar a mensagem

$messages = array(
    'sender' => "TESTETOP", // SENDER ID 
    'messages' => array(
        array(
            'number' => $tell1,
            'text' => 'Esta é a sua mensagem'
        ),
        array(
            'number' => $tell12,
            'text' => 'Esta é outra mensagem'
        ),
    )
);


$messages_json = json_encode($messages, JSON_UNESCAPED_UNICODE);
echo $messages_json; 

// URL da API
define('API_URL', 'http://api.mozesms.com/bulk_json/v2/');

// Token de autorização 
define('AUTH_TOKEN', 'Bearer 2381:lo5R5H-fwx8pP-sdgsdghdgdhsgdhhsjhhjsMD-wzZwrj');

function sendSms($messages_json) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => API_URL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $messages_json, 
        CURLOPT_HTTPHEADER => array(
            "Authorization: " . AUTH_TOKEN,
            "Content-Type: application/json" 
        ),
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
      
        $error_msg = curl_error($curl);
        curl_close($curl);
        throw new Exception("Erro ao enviar a solicitação cURL: " . $error_msg);
    }

    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if ($http_code != 200) {
        throw new Exception("Erro na solicitação. Código HTTP: " . $http_code);
    }

    return $response;
}

try {
    $response = sendSms($messages_json);
    echo $response;
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>