@extends('layouts.app')

@section('content')
<div class="container">

<div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Cari Data Pegawai
				<a class= "btn btn-success float-right btn-sm" role="button" href="{{ url('/pegawai')}}">
                     Kembali
                    </a></div>

                <div class="card-body">
                    <form class="form-inline" action="/pegawai/cari" method="GET">

                        <div class="form-group mb-2 mx-sm-4">
                        <label for="pilihan" class="col-form-label">Pilihan</label>
                        </div>

                        <div class="form-group mb-2 mx-sm-2">
                        <select class="form-control form-control-sm" id="pilih" name="pilih">
                            <option value="nama">Nama</option>
                            <option value="jabatan">Jabatan</option>
                        </select>
                        </div>

                        <div class="form-group mx-sm-4 mb-2">
                        <input id="cari" type="text" class="form-control-sm form-control{{ $errors->has('cari') ? ' is-invalid' : '' }}" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}" required autofocus>
                        </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-2">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Absensi Pegawai</div>
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach( $pegawais as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->jabatan}}</td>
                                    <td>{{$item->umur}}</td>
                                    <td>{{$item->alamat}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
