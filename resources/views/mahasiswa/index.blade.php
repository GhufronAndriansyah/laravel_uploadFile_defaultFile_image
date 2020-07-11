@extends('layout/main')
@section('title','Daftar Mahasiswa')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-10">
            <h1 class="mt-2">Daftar Mahasiswa</h1>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NRP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$student->nama}}</td>
                        <td>{{$student ->nrp}}</td>
                        <td>{{$student ->email}}</td>
                        <td>{{$student ->jurusan}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection