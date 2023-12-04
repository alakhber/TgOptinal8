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
    file_get_contents($website . "/sendMessage?chat_id=" . $chatId . "&text= ‼️ Cango Data" . json_encode([$update]));
    if (isset($update['update_id'])) {



        $token = "6861442315:AAEWIjrctfvW5w_dBeaF7wykJOABiIVHDSA";
        $chat_id = "1175133970";
        $button1 = ["text" => "Sifariş Təhvil Verildi", "callback_data" => "tehvil verildi"];
        $button2 = ["text" => "Təhvil Verilə Bilmədi", "callback_data" => "tehvil verilmedi"];
        $keyboard = [
            "inline_keyboard" => [
                [$button1, $button2],
            ],
        ];
        $url = "https://api.telegram.org/bot$token/sendMessage";
        $data = [
            "chat_id" => $chat_id,
            "text" => "Lütfen bir seçenek seçin:",
            "reply_to_message_id" => $update['update_id'],
            "reply_markup" => json_encode($keyboard),
        ];
        $response = file_get_contents($url . '?' . http_build_query($data));
    }
});
