<?php

namespace App\Http\Controllers\ApiGoogleTranslate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $response = Http::withHeaders([
            'Accept-Encoding' => 'application/gzip',
            'X-RapidAPI-Key' => '5ee6cfb15cmsh70a69dd5449e3f6p16337djsnc7941e2630c7',
            'X-RapidAPI-Host' => 'google-translate1.p.rapidapi.com'
        ])->get('https://google-translate1.p.rapidapi.com/language/translate/v2/languages', [
            'target' => 'id'
        ]);

        $data = $response->json();
        $data = $data['data']['languages'];

        return view('translate-api.index', compact('data'));
    }

}
