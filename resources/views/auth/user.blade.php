@extends('layouts.main')
@section('menu_home', 'active')
@section('content')

<div class="row">
  <div class="col-lg-12 mb-4">
      <!-- Approach -->
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Data User Terdaftar</h6>
           </div>
           <a href="" type="button" class="btn" data-bgcolor="#3b5998" data-color="#ffffff" style="width: 175px; background-color: #496edb;margin-left: 20px; color:white; margin-top:10px">
            <i class="icon-copy fa fa-user-plus" aria-hidden="true"></i>
            Tambah Data
          </a>
           <div class="card-body">
               @if ($errors->any())
               <div class="alert alert-danger">
                   <strong>Whoops!</strong> There were some problems with your input.<br><br>
                   <ul>
                       @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
               @endif
               <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th> Nisn </th>
                        <th> Nama </th>
                        <th> Email </th>
                        <th> Level </th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                  @foreach($datas as $data)
                    <tr>
                      {{-- <td class="py-1">
                      @if($data->gambar)
                        <img width="30" height="30" src="{{url('images/user', $data->gambar)}}" alt="image" />
                      @else
                        <img width="30" height="30" src="{{url('images/user/default.png')}}" alt="image" />
                      @endif
                        {{$data->name}}
                      </td> --}}
                      <td>
                        {{$data->nisn}}
                      </td>
                      <td>
                      <a href="{{route('user.show', $data->id)}}">
                      {{$data->name}}
                      </a>
                      </td>
                      <td>
                        {{$data->email}}
                      </td>
                      <td>
                        @if ($data->level == '1')
                        <p>Siswa</p>
                        @endif

                      </td>
                      <td>
                        <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('user.show', $data->id) }}" class="btn" data-bgcolor="#28a745" data-color="#ffffff">
                                <i class="icon-copy fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                            <a href="{{route('user.edit', $data->id)}}" class="btn" data-bgcolor="#ffc107" data-color="#ffffff">
                                <i class="icon-copy fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Anda yakin ingin meghapus data ini ?')" class="btn btn-danger" >
                            <i class="icon-copy fa fa-trash" aria-hidden="true"></i>
                        </form>
                    </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
           </div>
       </div>
</div>

</div>


    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>

@endsection
