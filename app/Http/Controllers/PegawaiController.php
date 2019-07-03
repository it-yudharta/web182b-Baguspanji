<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\PegawaiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{
    
        // public function __construct()
        // {
        //     $this->middleware('auth');
        // }

    public function index()
    {
        $pegawai = Pegawai::paginate(10);

        return view('pegawai.index',  ['pegawais' => $pegawai]);
    }

    public function find()
    {
        $pegawai = Pegawai::paginate(10);

        return view('pegawai.find',  ['pegawais' => $pegawai]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $pilih = $request->pilih;
 
		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('pegawais')
		->where("$pilih",'like',"%".$cari."%")
		->paginate();
 
		// mengirim data pegawai ke view index
		return view('pegawai.find',['pegawais' => $pegawai]);
 
    }
    
    public function export_excel()
	{
		return Excel::download(new PegawaiExport, 'pegawai.xlsx');
        
    }
    
    public function create(Request $request)
    {
        $pegawai = Pegawai::create($request->all());

        //tambah ke database absensis
        $insert = new \App\Absen;
        $insert->nama = $request['nama'];
        $insert->jabatan = $request['jabatan'];
        $insert->tanggal = date("Y-m-d");
        $insert->masuk = '0';
        $insert->keluar = '0';
        $insert->ket = '-';
        $insert->save();

        return redirect()->back()
        ->with('tambah','Data Berhasil di Tambah');

    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);  
        return view('pegawai/edit',['pegawais'=>$pegawai]);

    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id); 
        $pegawai->update($request->all());
        return redirect('/pegawai')->with('show','Data Berhasil Update');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete($pegawai);
        return redirect()->back()
        ->with('tambah','Data Berhasil di Hapus');
    }
}
