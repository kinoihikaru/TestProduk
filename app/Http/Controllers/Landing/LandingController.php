<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Accept-Encoding' => 'application/gzip',
            'X-RapidAPI-Key' => '36a727d096msh8ab0d528e1eea10p1f4999jsne5f412a87f23',
            'X-RapidAPI-Host' => 'google-translate1.p.rapidapi.com'
        ])->get('https://google-translate1.p.rapidapi.com/language/translate/v2/languages', [
            'target' => 'id'
        ]);

        $data = $response->json();
        $data = $data['data']['languages'];
        Session::put('apiTranslate', $data);

        // $responseTranslate = Http::asForm()->withHeaders([
        //     'Accept-Encoding' => 'application/gzip',
        //     'X-RapidAPI-Key' => '36a727d096msh8ab0d528e1eea10p1f4999jsne5f412a87f23',
        //     'X-RapidAPI-Host' => 'google-translate1.p.rapidapi.com'
        // ])
        // ->post('https://google-translate1.p.rapidapi.com/language/translate/v2', [
        //     'q' => 'Hello, world!',
        //     'target' => 'id',
        //     'source' => 'en'
        // ]);

        // $translate = $responseTranslate->json();

        return view('landing.index');
    }
}
