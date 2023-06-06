@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mahasiswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Create New Mahasiswa</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID Mahasiswa</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Prodi</th>
            <th>Agama</th>
            <th>NIK</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Tempat Lahir</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mahasiswas as $mahasiswa)
            <tr>
               
                <td>{{ $mahasiswa->id_identitas }}</td>
                <td>{{ $mahasiswa->nama }}</td>
                <td>{{ $mahasiswa->jeniskelamin }}</td>
                <td>{{ $mahasiswa->prodi }}</td>
                <td>{{ $mahasiswa->agama }}</td>
                <td>{{ $mahasiswa->nik }}</td>
                <td>{{ $mahasiswa->nohp }}</td>
                <td>{{ $mahasiswa->alamat }}</td>
                <td>{{ $mahasiswa->tanggal_lahir }}</td>
                <td>{{ $mahasiswa->tempat_lahir }}</td>
                <td>
                    <form action="{{ route('mahasiswas.destroy', $mahasiswa->id_identitas) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('mahasiswas.show', $mahasiswa->id_identitas) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('mahasiswas.edit', $mahasiswa->id_identitas) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
