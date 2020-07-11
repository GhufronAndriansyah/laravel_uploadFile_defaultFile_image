@extends('layout/main')
@section('title','Daftar Students')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Daftar Students</h1>
            <a href="/students/create" class="btn btn-primary my-3">Tambah Data Student</a>
            <a href="/students/trash" class="btn btn-success badge-pill">Tong Sampah</a>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif

            <ul class="list-group">
                @foreach ($students as $std)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $std->nama }}
                    @if ($std->deleted_at == null)
                    <a href="/students/{{ $std->id }}" class="badge badge-info badge-pill">Detail</a>
                    @else
                    <a href="/students/{{ $std->id }}" class="badge badge-danger badge-pill">Deleted</a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection