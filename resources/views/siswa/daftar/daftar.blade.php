@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
    @php
    $a = Auth::user()->id;
    $b = Auth::user()->verif_daftar;
    $c = Auth::user()->verif_dau;
    @endphp
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-12">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Struk Pembayaran Anda</div>
                        @if ($b==1)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Terverifikasi</div>
                        @else
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Pending</div>
                        @endif
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" style="color: #2fbd5b"></i></div>
                    <div class="col-auto">
                        <a href="{{route('biaya.index')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-5">

                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Isi Data Pribadi
                        </div>
                        @if ($c==1)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Done</div>
                        @else
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Isi Form</div>
                        @endif
                    </div>
                    @if ($c==1)
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" style="color: #2fbd5b"></i></div>
                    @else
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                    @endif
                    <div class="col-auto">
                        <a href="{{route('formulir.create')}}" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-3">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Upload Daftar Ulang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Belum Tersedia</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" ></i></div>
                    <div class="col-auto">
                        <a href="#" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-3">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cetak Data</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Belum Tersedia</div>
                    </div>
                    <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300" ></i></div>
                    <div class="col-auto">
                        <a href="#" class="small-box-footer">View Detail<i class="fas fa-arrow-circle-right"></a></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($b == '1')
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Struk Daftar</h6>
            </div>
            <div class="card-body">

                @if($b == null)
                <p>
                    Biaya Pendaftaran Untuk PPDB SMAN 1 Puri adalah 150.000
                </p>
                <a href="{{ route('daftar.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                    <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                    Upload Struk Pembayaran
                </a>
                @endif

                @if ($b==0)
                <p>Tunggu Admin Mengkonfirmasi Struk Anda </p>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc">User ID</th>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if ($c == '1')
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Upload Biaya Daftar Ulang</h6>
            </div>
            <div class="card-body">

                @if($b == null)
                <p>
                    Biaya Pendaftaran Untuk PPDB SMAN 1 Puri adalah 150.000
                </p>
                <a href="{{ route('daftar.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                    <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                    Upload Struk Pembayaran
                </a>
                @endif

                @if ($b==0)
                <p>Tunggu Admin Mengkonfirmasi Struk Anda </p>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc">User ID</th>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection