<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        return view('message');
    }

    public function sendmessage(Request $request){
        $message = $request->input('message');
        $url = "https://messages-sandbox.nexmo.com/v0.1/messages";
        $params = ["to" => ["type" => "whatsapp", "number" => $request->input('number')],
            "from" => ["type" => "whatsapp", "number" => "14157386170"],
            "message" => [
                "content" => [
                    "type" => "text",
                    "text" => $message
                ]
            ]
        ];
        $headers = ["Authorization" => "Basic " . base64_encode(config('nexmo.api_key') . ":" . config('nexmo.api_secret'))];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, ["headers" => $headers, "json" => $params]);
        $data = $response->getBody();
        Log::Info($data);
        return back();
    }

    public function status(Request $request){
        $data = $request->all();
        Log::Info($data);
    }

    public function inbound(Request $request){
        $data = $request->all();

    $text = $data['message']['content']['text'];
    $number = intval($text);
    Log::Info($number);
    if($number > 0) {
        $respond_number = $number * 5;
        Log::Info($respond_number);
        $url = "https://messages-sandbox.nexmo.com/v0.1/messages";
        $params = ["to" => ["type" => "whatsapp", "number" => $data['from']['number']],
            "from" => ["type" => "whatsapp", "number" => "14157386170"],
            "message" => [
                "content" => [
                    "type" => "text",
                    "text" => "5 x " . $number . " = " . $respond_number
                ]
            ]
        ];
        $headers = ["Authorization" => "Basic " . base64_encode(config('nexmo.api_key') . ":" . config('nexmo.api_secret'))];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, ["headers" => $headers, "json" => $params]);
        $data = $response->getBody();
    }
    Log::Info($data);
    }
}
