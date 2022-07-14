<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::join('users', 'users.id', '=', 'produks.user_id')
        ->select('produks.*', 'users.name as pemilik')
        ->newQuery();

        $data = $produk->get();
        $totalHarga = $produk->select(DB::raw('sum(produks.harga) as total'))->first();

        return view('produk.index', compact('data', 'totalHarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('role', 'user')->get();

        return view('produk.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:5',
            'harga' => 'required|integer',
            'user_id' => 'required'
        ]);

        Produk::create($validateData);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Produk::with('user')->where('id', $id)->first();

        return view('produk.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::findorFail($id);

        $user = User::where('role', 'user')->get();

        return view('produk.edit', compact('data', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findorFail($id);

        $validateData = $request->validate([
            'nama' => 'required|min:5',
            'harga' => 'required|integer',
            'user_id' => 'required'
        ]);

        $produk->update($validateData);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::findorFail($id);
        $data->delete();

        return redirect()->route('produk.index')->with('success', 'Produk Berhasil Dihapus');
    }
}
