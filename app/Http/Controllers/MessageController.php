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
}
