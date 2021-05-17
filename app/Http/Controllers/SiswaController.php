<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('siswa.index',['user' =>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'nim'=>'required',
        'nama'=>'required',
        'jurusan'=>'required',
        'no_handphone'=>'required',
        'email'=>'required',
        'tgl_lahir'=>'required'
        ]);
        //fungsieloquentuntukmenambahdata
        //Mahasiswa::create($request->all());
        //jikadataberhasilditambahkan,akankembalikehalamanutama
        //return redirect()->route('mahasiswa.index')->with('success','Mahasiswa Berhasil Ditambahkan');

        return redirect()->route('mahasiswa.index')
        ->with('success','Mahasiswa Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function profile()
    {
        $user = Auth::user();
        return view('siswa.profile',['user' =>$user]);
    }

    public function formulir()
    {
        $user = Auth::user();
        return view('siswa.formulir',['user' =>$user]);
    }
}
