@extends('layouts.main')
@section('menu_home', 'active')
@section('content')
<div class="row">
   <div class="col-lg-12 mb-4">
       <!-- Approach -->
       @foreach($datas as $data)
       @if ($data->status == 'sudah')
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
                $b = App\Models\Biaya::where('user_id', $a)->where('status','belum')->first();
                // $c = App\Models\Biaya::where('status','belum')->where()
                @endphp
                @if($b == null)
                <a href="{{ route('daftar.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                    <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                    Upload Struk Pembayaran
                </a>
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


                        <p>Tunggu Admin Mengkonfirmasi Struk Anda </p>

                        <tr>

                            <td>{{ $data->user_id}}</td>
                            <td>{{ $data->user->name }}</td>
                            <td></td>
                            <td>
                                @if ($data->status == 'belum')
                                    <label class="badge badge-warning">Belum Terverifikasi</label>
                                @else
                                    <label class="badge badge-success">Sudah Terverifikasi</label>
                                @endif
                            </td>
                        </tr>
                        @endif
                        @if ($data->status == 'sudah')
                        <a href="{{ route('siswa.create') }}" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff">
                            <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
                            Isi Data Diri
                        </a>


                    </tbody>
                </table>

            </div>
        </div>
        @endif
        @endforeach
        @foreach($datas as $data)
        @if ($data->status == 'belum')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Isi Data Diri</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('siswa.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="Nim">Nisn</label>
                        <br>
                        <input type="text" name="nisn" class="form-control" id="Nim" aria-describedby="Nim" value="{{ Auth::user()->nisn }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <br>
                        <input type="Nama" name="nama" class="form-control" id="Nama" aria-describedby="Nama" value="{{ Auth::user()->name }}" readonly >
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <br>
                        <input type="jenis_kelamin" name="jenis_kelamin" class="form-control" id="jenis_kelamin" aria-describedby="jenis_kelamin" >
                    </div>
                    <div class="form-group">
                        <label for="No_Handphone">No Handphone</label>
                        <br>
                        <input type="No_Handphone" name="no_handphone" class="form-control" id="No_Handphone" aria-describedby="No_Handphone" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <br>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" value="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <br>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection