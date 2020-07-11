@extends('layout/main')
@section('title','Daftar Students')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Recycle Students</h1>   
            @if (count($students) < 1)
            @else
            <a href="/students/restore/" >Restore Semua Data</a>
            |
            <a href="/students/hapus_permanen/">Hapus Permanen Semua Data</a>  
            @endif 
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif

            <ul class="list-group mt-2">
                @if (count($students) < 1 )
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Tidak Ada Data Yang Terhapus
                </li>
                @endif
                @foreach ($students as $std)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $std->nama }}
                    <div class="float-right">
                        <a href="/students/restore/{{ $std->id }}" class="btn btn-success btn-sm">Restore</a>
					    <a href="/students/hapus_permanen/{{ $std->id }}" class="btn btn-danger btn-sm">Hapus Permanen</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection