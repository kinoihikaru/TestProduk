<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('role', 'user')->get();

        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = new User;
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->role = 'user';
        $user->password = bcrypt($validateData['password']);
        $user->save();

        return redirect()->route('user.index')->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findorFail($id);

        return view('user.edit', compact('data'));
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
        $user = User::findorFail($id);

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'old_password' => 'required',
            'password' => 'required|min:8'
        ];
        $validateData = $request->validate($rules);

        if (!Hash::check($validateData['old_password'], $user->password)) {
            return back()->with('error_pass', 'Password does not match');
        }

        $validateData['password'] = bcrypt($validateData['password']);
        $user->update($validateData);

        return redirect()->route('user.index')->with('success', 'User Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findorFail($id);
        $data->delete();

        return redirect()->route('user.index')->with('success', 'User Berhasil Dihapus');
    }
}
