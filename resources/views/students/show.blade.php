@extends('layout/main')
@section('title','Detail Students')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Detail Students</h1>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <td><img width="150px" class="img-thumbnail" src="/data_file/{{ $student->file }}"></td>
                <h5 class="card-title">{{ $student->nama }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $student->nrp }}</h6>
                    <p class="card-text">{{ $student->email }}</p>
                    <p class="card-text">{{ $student->jurusan }}</p>
                    <a href="/students/{{ $student->id }}/edit" class="btn btn-primary">Edit</a>
                    <form action="{{ $student->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="/students" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection