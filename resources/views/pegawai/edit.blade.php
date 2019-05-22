@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Edit Karyawan
                    <a class= "btn btn-success float-right btn-sm" role="button" href="/pegawai"> Kembali </a>
                </div>
                  <div class="card-body">
                      <form method="POST" action="/pegawai/{{$pegawais->id}}/update">
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input name= "nama" type="text" class="form-control" id="nama" placeholder="Nama" value="{{$pegawais->nama}}">
                          </div>
                          <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name= "jabatan" class="form-control" id="jabatan">
                              <option value="Direktur" @if ($pegawais->jabatan == 'Direktur') selected @endif >Direktur</option>
                              <option value="Manager" @if ($pegawais->jabatan == 'Manager') selected @endif >Manager</option>
                              <option value="Admin" @if ($pegawais->jabatan == 'Admin') selected @endif >Admin</option>
                              <option value="Pegawai" @if ($pegawais->jabatan == 'Pegawai') selected @endif >Pegawai</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="umur">Umur</label>
                            <input name= "umur" type="text" class="form-control" id="umur" placeholder="Umur" value="{{$pegawais->umur}}">
                          </div>
                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name= "alamat" class="form-control" id="alamat" rows="3" placeholder="Alamat">{{$pegawais->alamat}}</textarea>
                          </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" value="submit">Update</button>
                        </div>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

        