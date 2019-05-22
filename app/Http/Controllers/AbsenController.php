<?php

namespace App\Http\Controllers;

use App\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $absens = Absen::paginate(10);

        return view('absen.index',  ['absens' => $absens]); //absensis adl nama table
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
        $pilih = $request->pilih;
 
		// mengambil data dari table pegawai sesuai pencarian data
		$absens = DB::table('absens')
		->where("$pilih",'like',"%".$cari."%")
		->paginate();
 
		// mengirim data pegawai ke view index
		return view('absen.index',  ['absens' => $absens]);
 
    }

    public function hadir(Request $request, $id)
    {
        $update = Absen::where('id',$id)
        ->first();
        $update->tanggal = date("Y-m-d");
        $update->masuk = date("H:i:s");
        $update->update();

        return redirect()->to('/absensi')->with('absen','Anda telah mengisi daftar hadir');

    }

    public function keluar(Request $request, $id)
    {
        $update = Absen::where('id',$id)
        ->first();
        $update->tanggal = date("Y-m-d");
        $update->keluar = date("H:i:s");
        $update->update();

        return redirect()->to('/absensi')->with('absen','Anda telah daftar keluar');

    }

    public function besok(Request $request, $nama, $jabatan)
    {
        //tambah ke database absensis
            $add = new Absen;
            $add->nama = $request['nama'];
            $add->jabatan = $request['jabatan'];
            $add->tanggal = date("Y-m-d");
            $add->masuk = '0';
            $add->keluar = '0';
            $add->ket = '-';
            $add->save();

        return redirect()->to('/absensi')->with('absen','Anda telah membuat daftar hadir baru');

    }

}
