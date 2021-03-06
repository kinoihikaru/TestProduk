<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\LanguageTranslateG;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalApi = LanguageTranslateG::all();
        $totalApi = count($totalApi);
        $totalProduk = Produk::count();
        $totalUser = User::where('role', 'user')->count();

        return view('home', compact('totalApi', 'totalProduk', 'totalUser'));
    }
}
