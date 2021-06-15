@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Upload Struk Daftar</h6>
            </div>
            <div class="card-body">
                <p>
                    Biaya Pendaftaran Untuk PPDB SMAN 1 Puri adalah 150.000
                </p>
                @php
                $a = Auth::user()->id;
                $b = Auth::user()->verif_daftar;
                // $c = App\Models\Biaya::where('status','belum')->where()


                @endphp
                @if($b == null)
                <a href="{{ route('daftar.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                    <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                    Upload Struk Pembayaran
                </a>
                @endif

                @if ($b==0)
                <p>Tunggu Admin Mengkonfirmasi Struk Anda </p>
                @endif
                <table class="data-table table nowrap">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Nama</th>
                            <th>Struk</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $data->user_id}}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>
                                <a href="{{route('biaya.show', $data->id)}}">
                                    Lihat Struk
                                </a>
                            </td>
                            <td>
                                @if ($data->status == 'belum')
                                    <label class="badge badge-warning">Belum Terverifikasi</label>
                                @else
                                    <label class="badge badge-success">Sudah Terverifikasi</label>
                                @endif
                            </td>
                        </tr>

                        @if ($b==1)
                        <a href="{{ route('siswa.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                            Isi Data Diri
                        </a>
                        @endif
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>


</div>
@endsection