@extends('layouts.app')

@section('content')
<div class="container">

<div class="row justify-content-center">
        <div class="col-md-6">
           @if(session('absen'))
              <div class="alert alert-success" role="alert">
                {{session('absen')}}
              </div>
            @endif
            <div class="card text-center">
                <div class="card-header">Cari Data Pegawai</div>

                <div class="card-body">
                    <form class="form-inline" action="/absensi/cari" method="GET">

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
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header">Absensi Pegawai</div>
                    <div class="card-body">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                <!-- <th scope="col">#</th> -->
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jam Masuk</th>
                                <th scope="col">Jam Keluar</th>
                                <!-- <th scope="col">Keterangan</th> -->
                                <th scope="col">Absen</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach( $absens as $absen)
                                <tr>
                                <!-- <td scope="row">{{$absen->id}}</td> -->
                                <td>{{$absen->nama}}</td>
                                <td>{{$absen->jabatan}}</td>
                                <td>{{$absen->tanggal}}</td>
                                <td>{{$absen->masuk}}</td>
                                <td>{{$absen->keluar}}</td>
                                <!-- <td>{{$absen->ket}}</td> -->
                                <td>
                                    <a name="btnIn" class="btn btn-warning btn-sm disabled" href="/absensi/hadir/{{$absen->id}}">Masuk</a>
                                    <a name="btnOut" class="btn btn-danger btn-sm active" href="/absensi/keluar/{{$absen->id}}">Keluar</a>
                                    @auth
                                    <a name="btnNew" class="btn btn-primary btn-sm" href="/absensi/besok/{{$absen->nama}}/{{$absen->jabatan}}">New</a>
                                    @endauth
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center pagination-sm">
                            <li class="page-item">
                              {{$absens->links()}}  
                            </li>
                          </ul>
                        </nav>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
