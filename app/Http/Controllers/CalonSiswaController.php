<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 'admin') {
            $ub = Siswa::with('user')->get();
            $datas = Siswa::all();
            return view('admin.calonsiswa.tb-siswa',['datas'=>$datas,'ub'=>$ub]);
        }
        $user = Auth::user();
        return view('siswa.daftar.formulir.create',['user' =>$user]);
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
            Biaya::create([
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
            Biaya::create([
                'user_id' => $request->input('user_id'),
                'struk' => $struk,
                'status' => 'belum'
            ]);

            $user_id = $request->input('user_id');
            User::find($user_id)->update([
                'verif_daftar' => '0'
                ]);
            alert()->success('Berhasil.','Data telah ditambahkan');
            return redirect()->route('biaya.index');

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
        //
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
