@extends('layout.admin')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Payment</h1>
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
    <a href="/tambahdatapayment"><button type="button" class="btn btn-success">Tambah Data</button></a>
    <form action ="/customers" method = "GET" class="form-inline mt-2 mb-2">
      <div class="form-group">
        <form action = "/customers" method ="GET">
        <input type="search" id="inputPassword6" class="form-control mx-sm-3" name = "search" aria-describedby="passwordHelpInline">
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
                  <th scope="col">Jenis Pembayaran</th>
                  <th scope="col">dibuat</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                 $no = 1;   
                @endphp
              @foreach ($datapayment as $index => $row)
              <tr>
                  <th scope="row">{{$index + $datapayment->firstitem()}}</th>
                  <td>{{$row->jenispembayaran}}</td>
                  <td>{{$row->created_at->format('D M Y')}}</td>
                  <td>
  
                    <a href="/tampilkandatapayment/{{$row->id}}">
                      <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <a href="/deletepayment/{{$row->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                    
                  </td>
                </tr>  
              @endforeach
  
              </tbody>
            </table>
            {{ $datapayment->links() }}
      </div>
  </div>
</div>
@endsection

