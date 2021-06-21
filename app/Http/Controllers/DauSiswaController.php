<?php

namespace App\Http\Controllers;

use App\Models\Dau;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DauSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->level == 'admin') {
            $ub = Dau::with('user')->get();
            $datas = Dau::all();
            return view('admin.daftar_ulang.index',['datas'=>$datas,'ub'=>$ub]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == '1'){
            $a = Auth::user()->id;
        $b = Dau::where('user_id', $a)->first();
        if($b == null){
            $user = Auth::user();
            return view('siswa.daftar.biaya.create',['user' =>$user]);
        }
        Alert::info('Oopss..', 'Anda Sudah Mengisi Formulir');
        return redirect()->to('/home');
        }

        $datas = User::all()->where('level','1')
        ->where('data_diri','1');

        return view('admin.daftar_ulang.create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->level == '1'){
        $this->validate($request, [
            'user_id',
            'struk' => 'required|file',
        ]);

        if($request->file('struk') == '') {
            $struk = NULL;
        } else {
            $file = $request->file('struk');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('struk')->move("images/bd", $fileName);
            $struk = $fileName;
        }
        // $a = Auth::user()->id;
        Dau::create([
            'user_id' => $request->input('user_id'),
            'struk' => $struk,
            'status' => 'belum'
        ]);

        $a = Auth::user()->id;
        $biaya = User::find($a);

        $biaya->update([
                 'verif_daftar' => '0',
                 ]);

            alert()->success('Berhasil.','Struk Telah Ter-Upload');
        return redirect()->route('siswa.daftar.biaya.index');
        }
        //Admin
        $this->validate($request, [
            'user_id',
            'struk' => 'required|file',
        ]);

        if($request->file('struk') == '') {
            $struk = NULL;
        } else {
            $file = $request->file('struk');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('struk')->move("images/bd", $fileName);
            $struk = $fileName;
        }
        // $a = Auth::user()->id;
        Dau::create([
            'user_id' => $request->input('user_id'),
            'struk' => $struk,
            'status' => 'belum'
        ]);

        $user_id = $request->input('user_id');
        User::find($user_id)->update([
            'verif_daftar' => '0'
            ]);
        alert()->success('Berhasil.','Data telah ditambahkan');
        return redirect()->route('daftar-ulang.index');
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
        $dau = Dau::find($id);
        $dau->update([
                'status' => 'sudah'
                ]);

        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('daftar-ulang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dau::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('daftar_ulang.index');
    }
}
