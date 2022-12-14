@extends('master.admin')
@section('title' , 'Master Siswa')
@section('content-title', 'Daftar Siswa')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert"></button>
    <strong>{{$message}}</strong>
</div>
@endif
@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert"></button>
    <strong>{{$message}}</strong>
</div>
@endif
@if ($message = Session::get('berhasil'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert"></button>
    <strong>{{$message}}</strong>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
    <div class="card shadow mb-4">
        @if(auth()->user()->role == "admin")
        <div class="card-header py-3 bg-gradient-primary">
            <a href="{{ route('mastersiswa.create') }}" class="btn btn-success fas fa-user"> Tambah Data</a>
        </div>
        @endif
        <div class="card-body">
                <table class="table">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">NISN</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $item)
                    <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$item -> nama }}</td>
                    <td>{{$item -> nisn }}</td>
                    <td>{{$item -> alamat }} </td>
                    <td>{{$item -> jk }} </td>
                    <td>
                        <a href="{{ route('mastersiswa.show', $item -> id) }}" class="btn btn-sm  btn-info btn-circle"><i class="fas fa-info"></i></a>
                        @if(auth()->user()->role == "admin")
                        <a href="{{ route('mastersiswa.edit', $item -> id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('mastersiswa.hapus', $item -> id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                        @endif
                    </td>
                    </tr>
                </tbody>
                @endforeach
                </table>
            </table>
        </div>
    </div>
</div> 
</div>
@endsection
