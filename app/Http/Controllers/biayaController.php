<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == '0') {
            $ub = Biaya::with('user')->get();
            $datas = Biaya::all();
            return view('admin.biaya_daftar.index',['datas'=>$datas,'ub'=>$ub]);
        }
        if(Auth::user()->level == '1') {
            // Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            $user = Auth::user();
            $datas = Biaya::where('user_id', Auth::user()->id);
            $ub = Biaya::with('user')->get();
            // $datas = Biaya::all();
            return view('siswa.biaya.index',['user' =>$user,'datas'=>$datas,'ub'=>$ub]);
        }

        // return view('siswa.step',['user' =>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == '1'){
            $a = Auth::user()->nisn;
        $b = Biaya::where('user_id', $a)->first();
        if($b == null){
            $user = Auth::user();
            return view('siswa.biaya.create',['user' =>$user]);
        }
        Alert::info('Oopss..', 'Anda Sudah Mengisi Formulir');
        return redirect()->to('/home');
        }
        return view('admin.biaya_daftar.create');

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
    public function update(Request $request, $id)
    {
        $biaya = Biaya::find($id);

        $biaya->update([
                'status' => 'sudah'
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('biaya.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Biaya::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('biaya.index');
    }
}
