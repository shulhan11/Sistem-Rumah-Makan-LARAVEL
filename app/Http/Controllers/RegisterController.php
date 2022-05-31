<?php

namespace App\Http\Controllers;

use App\Models\Myprofile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $valid['password'] = bcrypt($valid['password']);

        $user  = User::create($valid);

        $myprofile = Myprofile::create([
            'user_id' => $user->id,
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil silahkan lanjut Login.');
    }
}
