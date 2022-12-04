@extends('layout.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v2</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container">
    <form action ="/customers" method = "GET" class="form-inline mt-2 mb-2">
      <div class="form-group">
        <form action = "/customers" method ="GET">
        </form>
      </div>
    </form>
      <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{$message}}
        </div>
        @endif
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nomor Telepon</th>
                  <th scope="col">Nama Film</th>
                  <th scope="col">Jenis Pembayaran</th>
                </tr>
              </thead>
              <tbody>
                @php
                 $no = 1;   
                @endphp
              @foreach ($data as $index => $row)
              <tr>
                  <th scope="row">{{$index + $data->firstitem()}}</th>
                  <td>{{$row->nama}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->noTelepon}}</td>
                  <td>{{$row->namaFilm}}</td>
                  <td>{{$row->jenispembayaran}}</td>
                  <td>

                    
                  </td>
                </tr>  
              @endforeach
  
              </tbody>
            </table>
            {{ $data->links() }}
      </div>
  </div>
</div>
@endsection

