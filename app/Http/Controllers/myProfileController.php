<?php

namespace App\Http\Controllers;

use App\Models\Myprofile;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Storage;

class myProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('myprofile.index', [
            'profile' => Myprofile::with('user')->where('user_id', auth()->user()->id)->get(),
            'title' => 'My Profile',
            'pesananku' => $pesananku = Pesanan::with('product')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Myprofile $myprofile)
    {
        $validasi = $request->validate([
            'name' => 'max:128',
            'kota' => 'max:128',
            'jk' => '',
            'tanggal' => '',
            'nohp' => '',
            'alamat' => 'max:255',
            'fb' => 'max:128',
            'ig' => 'max:128',
            'twitter' => 'max:128',
            'image' => 'file|max:1024'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validasi['image'] = $request->file('image')->store('post-images');
        }
        $validasi['user_id'] = auth()->user()->id;
        Myprofile::where('id', $myprofile->id)->update($validasi);
        return redirect('myprofile')->with('succes', 'Post is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
