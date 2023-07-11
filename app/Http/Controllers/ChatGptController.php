<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class ChatGptController extends Controller
{
    protected $httpClient;
    public function connect()
    {
        $data=[];
        return view('chatgpt', compact('data'));
    }
    public function getMessage(Request $request){

        

        $validated = $request->validate([
        'question' => 'required|max:255',
        ]);
        $message = $validated['question'];

            $headers = [
              'x-auth-token' => 'Z24clm08glTKk4FTKJOSADOnkM',
              'Content-Type' => 'application/json',
              'Authorization' => config('services.chatgpt.key'),
            ];

            $body = [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are'],
                    ['role' => 'user', 'content' => $message],
                ],
              'stream'=> false,
              'max_tokens'=> 250,
            ];

        $this->httpClient = new Client([
            'base_uri' => config('services.chatgpt.url'),
            'headers'  =>$headers,
        ]);

        $response = $this->httpClient->post('chat/completions', [
            'json' => $body,
        ]);
        $answer=$response->getBody();
        Storage::disk('local')->put('example.txt', date('DD-M-YYYY')." your question is".$message." ---- answer is :".json_decode($answer, true)['choices'][0]['message']['content']);
        $data['answer']= json_decode($answer, true)['choices'][0]['message']['content'];
        $data['qustion']= $message;
        return view('chatgpt', compact('data'));
    }
}
