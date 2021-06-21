<?php

namespace App\Http\Controllers;



use App\Models\Biaya;
use App\Models\Dau;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function biayaPdf()
    {

        $datas = Biaya::all();
        $pdf = PDF::loadView('admin.laporan.biaya_pdf', compact('datas'));
        return $pdf->download('admin.laporan.biaya_pdf'.date('Y-m-d_H-i-s').'.pdf');
        // return view('admin.laporan.biaya_pdf',['datas' =>$datas]);
    }

    public function biayaExcel(Request $request)
    {
     return Excel::download(new BukuExport, 'buku.xlsx');
    }

    public function siswaPdf()
    {
        $datas = Siswa::all();
        $pdf = PDF::loadView('admin.laporan.calonsiswa_pdf', compact('datas'));
        return $pdf->download('admin.laporan.calonsiswa_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function siswaExcel(Request $request)
    {

    }

    public function dauPdf()
    {
        $datas = Dau::all();
        $pdf = PDF::loadView('admin.laporan.dau_pdf', compact('datas'));
        return $pdf->download('admin.laporan.dau_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function userPdf()
    {
        $datas = User::all()->where('level','==','1');
        $pdf = PDF::loadView('admin.laporan.user_pdf', compact('datas'));
        return $pdf->download('admin.laporan.user_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function userExcel(Request $request)
    {

    }

    public function adminPdf()
    {
        $datas = User::all()->where('level','==','0');
        $pdf = PDF::loadView('admin.laporan.admin_pdf', compact('datas'));
        return $pdf->download('admin.laporan.admin_pdf'.date('Y-m-d_H-i-s').'.pdf');
    }
    public function adminExcel(Request $request)
    {
    
    }
}
