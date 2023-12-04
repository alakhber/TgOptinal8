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
    $botToken = "6820331931:AAHgvxa46xY14NYKE3gk25lzMTvKM3BEPKY";
    $website = "https://api.telegram.org/bot" . $botToken;
    $chatId = "1175133970";  // Receiver Chat ID
    if (isset($update)) {


        // $token = "6861442315:AAEWIjrctfvW5w_dBeaF7wykJOABiIVHDSA";
        // $button1 = ["text" => "Sifariş Təhvil Verildi", "callback_data" => "tehvil verildi"];
        // $button2 = ["text" => "Təhvil Verilə Bilmədi", "callback_data" => "tehvil verilmedi"];
        // $keyboard = [
        //     "inline_keyboard" => [
        //         [$button1, $button2],
        //     ],
        // ];
        // $url = "https://api.telegram.org/bot$token/sendMessage?";
        // $url .= "chat_id=".$update['message']['chat']['id'];
        // $url .= "&text=Lütfen bir seçenek seçin";
        // $url .= "&reply_to_message_id=".$update['message']['message_id'];
        // $url .= "&reply_markup=".json_encode($keyboard);
        // file_get_contents($url);

        file_get_contents($website . "/sendMessage?chat_id=" . $chatId . "&text= ‼️ Cango Data:" . json_encode($update));
        
            // file_get_contents($website . "/sendMessage?chat_id=" . $chatId . "&text= ‼️ URL:" . $update['result']);
        





    }
    http_response_code(200);
});

Route::get('a',function(){
    $a = file_get_contents('https://api.telegram.org/bot6861442315:AAEWIjrctfvW5w_dBeaF7wykJOABiIVHDSA/getUpdates');
    $a=json_decode($a)->result;
    dd($a);
});