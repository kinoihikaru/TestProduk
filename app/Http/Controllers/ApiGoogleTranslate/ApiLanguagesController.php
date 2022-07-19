<?php

namespace App\Http\Controllers\ApiGoogleTranslate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LanguageTranslateG;

class ApiLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = LanguageTranslateG::all();

        return view('translate-api.index', compact('data'));
    }

}
