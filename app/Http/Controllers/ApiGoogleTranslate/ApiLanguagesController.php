<?php

namespace App\Http\Controllers\ApiGoogleTranslate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ApiLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Session::get('apiTranslate');

        return view('translate-api.index', compact('data'));
    }

}
