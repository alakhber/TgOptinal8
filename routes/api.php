<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::match(['get', 'post'], '/telegram', function () {

    $content = file_get_contents("php://input");
    $update = json_decode($content, true);

    // Mesajı işle
        $botToken = "6120014489:AAGsUveht3tNIPIQsrsKYkOxIXhs1-zv8Sg";
        $website = "https://api.telegram.org/bot" . $botToken;
        $chatId = "-1001527566751";  // Receiver Chat ID
        file_get_contents($website . "/sendMessage?chat_id=" . $chatId . "&text= ‼️ 166karqo kargoAz:send" . json_encode([$update]));
});

/*
// Telegram botunuzun token'ını buraya ekleyin
$token = "6861442315:AAEWIjrctfvW5w_dBeaF7wykJOABiIVHDSA";
    
// Hedef kullanıcının chat ID'sini buraya ekleyin
$chat_id = "1175133970";

// İki adet düğme oluşturun
$button1 = ["text" => "Button 1", "callback_data" => "button1"];
$button2 = ["text" => "Button 2", "callback_data" => "button2"];

// Düğmeleri içeren bir dizi oluşturun
$keyboard = [
    "inline_keyboard" => [
        [$button1, $button2],
    ],
];

// Düğmeleri gönderen isteği oluşturun
$url = "https://api.telegram.org/bot$token/sendMessage";
$data = [
    "chat_id" => $chat_id,
    "text" => "Lütfen bir seçenek seçin:",
    "reply_markup" => json_encode($keyboard),
];

// İstek gönderin
$response = file_get_contents($url . '?' . http_build_query($data));

// Yanıtı kontrol edin
if ($response) {
    $result = json_decode($response, true);
    if ($result['ok']) {
        echo "Düğmeler başarıyla gönderildi.";
    } else {
        echo "Hata: " . $result['description'];
    }
} else {
    echo "Telegram API'ye istek gönderilemedi.";
}

*/