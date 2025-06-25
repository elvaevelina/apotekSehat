@extends('layouts.main')
@section('title', 'Obat')
@section('content')
    <div class="container-fluid pt-3">
        <div class="card">
            <div class="card-header">
                <a href="/obat/addObat" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Obat</a>
            </div>
              <div class="card-body">
                @if(session("alert"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session("alert")}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Bentuk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Produsen</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $idx=>$obat)
                        <tr>
                            <td>{{$idx+1}}</td>
                            <td>{{$obat->id}}</td>
                            <td>{{$obat->nama}}</td>
                            <td>{{$obat->bentuk}}</td>
                            <td>{{$obat->harga_obat}}</td>
                            <td>{{$obat->stok_obat}}</td>
                            <td>{{$obat->produsen}}</td>
                            <td>{{$obat->tgl_kadaluarsa}}</td>
                            <td>
                                <a href="/obat/editObat/{{$obat->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <a href="/delete/{{$obat->id}}" class="btn btn-danger btn-sm" onclick="return confirmDelete();">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus obat ini?");
        }
    </script>


@endsection()
