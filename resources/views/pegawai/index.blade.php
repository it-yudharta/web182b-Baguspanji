@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('tambah'))
              <div class="alert alert-success" role="alert">
                {{session('tambah')}}
              </div>
            @endif
            <div class="card">
                <div class="card-header" class="dropdown">
                    Daftar Nama Karyawan
                    <a
                        href="/pegawai/export_excel" class="btn btn-outline-primary float-right btn-sm mx-sm-2" target="_blank">
                        Export Excel
                    </a>
                    <a
                        class="btn btn-outline-success float-right btn-sm" role="button" href="/pegawai/find">
                        Cari
                    </a>
                    @auth
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary btn-sm float-right mx-sm-2" data-toggle="modal" data-target="#exampleModal">
                      Tambah Data
                    </button>
                    @endauth

                </div>
                
                <div class="card-body">
                    <table class="table table-striped table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Alamat</th>
                                @auth
                                <th>Data</th>
                                @endauth
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
                                    <td>
                                        <!-- <a href="/pegawai/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/items/show/{{$item->id}}" class="btn btn-danger btn-sm">Hapus</a> -->
                                         @auth
                                          <button class="btn btn-warning dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Manage
                                          </button>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" >
                                            <a class="btn btn-sm" href="/pegawai/show/{{$item->id}}">Show</a>
                                            <a class="btn btn-sm" href="/pegawai/{{$item->id}}/edit">Edit</a>
                                            <a class="btn btn-sm" href="/pegawai/{{$item->id}}/destroy">Delete</a>
                                          </div>
                                          @endauth
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center pagination-sm">
                          <li class="page-item">
                            {{$pegawais->links()}}  
                          </li>
                        </ul>
                    </nav>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                     <form method="POST" action="/pegawai/create">
                                        {{csrf_field()}}
                                              <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
                                              </div>
                                              <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <select name= "jabatan" class="form-control" id="jabatan">
                                                  <option value="Direktur">Direktur</option>
                                                  <option value="Manager">Manager</option>
                                                  <option value="Admin">Admin</option>
                                                  <option value="Pegawai">Pegawai</option>
                                                </select>
                                              </div>
                                              <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <input name= "umur" type="number" class="form-control" id="umur" placeholder="Umur">
                                              </div>
                                              <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <textarea name= "alamat" class="form-control" id="alamat" rows="3" placeholder="Alamat"></textarea>
                                              </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" value="submit">Simpan</button>
                                            </div>
                                    </form>
                                  </div>
                            </div>
                          </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
