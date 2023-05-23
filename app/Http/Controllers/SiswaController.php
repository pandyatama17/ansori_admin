<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Berkas;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
   public function form_berkas()
   {
    $crumbs = array('page'=>'Form Berkas','pages'=>[['title'=>'Master Siswa','url' => '#'],['title'=>'PMB','url' => '#'],['title'=>'Form','url' => '#']]);
    return view('siswa.forms.berkas')->with('crumbs',$crumbs);
   }

   public function addSiswa()
   {
    $crumbs = array('page'=>'Form Pendaftaran','pages'=>[['title'=>'Master Siswa','url' => '#'],['title'=>'PMB','url' => '#'],['title'=>'Form','url' => '#']]);
    return view('siswa.forms.add')->with('crumbs',$crumbs);
   }

   public function generateNIS(Request $r)
   {
      $lastestnumber = Siswa::where('tingkatan',$r->tingkatan)->where('kelas',$r->kelas)->count();
      $generatedNIS = $r->tahun_ajar.$r->tingkatan.$r->kelas.str_pad(($lastestnumber+1), 3, '0', STR_PAD_LEFT);
      // return json_encode($r->all());
      return $generatedNIS;
   }
   public function generateNopen()
   {
      $nopen = mt_rand(1000000000, 9999999999);
      // $check = Siswa::where('nopen',$nopen)->first();
      if(!Siswa::where('nopen',$nopen)->exists()){
         $nopen = mt_rand(1000000000, 9999999999);
      }
      // return json_encode($r->all());
      return $nopen;
   }
   public function createSiswa(Request $r)
   {
      $siswa = new Siswa;
      // return $r->generatedNIS;
      // $siswa->nis = $r->generatedNIS;
      $siswa->nopen = $r->nopen;
      $siswa->nama = $r->nama;
      $siswa->tingkatan = $r->tingkatan;
      $siswa->kelas = $r->kelas;
      $siswa->kelamin = $r->jenis_kelamin;
      $siswa->tempat_lahir = $r->tempat_lahir;
      $siswa->tanggal_lahir = Carbon::parse($r->tanggal_lahir);
      $siswa->anak_ke = $r->anak_ke;
      $siswa->tinggi_badan = $r->tinggi_badan;
      $siswa->berat_badan = $r->berat_badan;
      $siswa->no_hp = $r->no_hp;
      $siswa->no_telp_rumah = $r->no_telp_rumah;
      $siswa->email = $r->email;
      $siswa->tinggal = $r->tinggal;
      $siswa->rt = $r->RT;
      $siswa->rw = $r->RW;
      $siswa->dusun = $r->dusun;
      $siswa->kelurahan = $r->kelurahan;
      $siswa->kecamatan = $r->kecamatan;
      $siswa->kode_pos = $r->kode_pos;
      $siswa->jarak_sekolah = $r->jarak_sekolah;
      $siswa->transport = $r->transport;
      $siswa->status_alumni = '0';
      $siswa->jenis_pendaftaran = $r->jenis_pendaftaran;
      $siswa->gelombang_pendaftaran = $r->gelombang_pendaftaran;
      $siswa->tanggal_masuk = Carbon::parse($r->tanggal_masuk);
      $siswa->tanggal_keluar = Carbon::parse($r->tanggal_keluar);
      $siswa->npsn_sekolahasal = $r->jnspsn_sekolahasal;
      $siswa->asal_sekolah = $r->asal_sekolah;
      $siswa->no_ujian_sebelum = $r->no_ujian_sebelum;
      $siswa->no_ijasah = $r->no_ijasah;
      $siswa->ket_ijasah = $r->ket_ijasah;

      try {
         $siswa->save();
         $message = ['type'=> 'success', 'body' => 'Siswa '.$siswa->nopen.' berhasil didaftarkan!','title'=>'berhasil'];
      } catch (\Throwable $th) {
         $message = ['type'=> 'error', 'body' => $th->getMessage(),'title'=>'gagal'];
      }
      return $message;
   }

   public function listSiswa()
   {
      $siswas = Siswa::all();
      $crumbs = array('page'=>'List Siswa','pages'=>[['title'=>'Master Siswa','url' => '#'],['title'=>'Data Siswa','url' => '#']]);
      return view('siswa.tables.list')->with('crumbs',$crumbs)->with('siswas',$siswas);
   }
   
   public function form_berkas_id($id)
   {
      $nis = Siswa::find($id)->nis;
      $berkas = Berkas::where('id_siswa',$id)->first();
      $crumbs = array('page'=>'Form Berkas','pages'=>[['title'=>'Master Siswa','url' => '#'],['title'=>'PMB','url' => '#'],['title'=>'Form','url' => '#']]);
      return view('siswa.forms.berkas')->with('crumbs',$crumbs)->with('nis',$nis)->with('id_siswa',$id)->with('berkas',$berkas);
   }

   public function submitBerkas(Request $r)
   {
      $berkas = Berkas::firstOrNew(['id_siswa' => $r->id_siswa]);
      
      if ($r->pas_foto !== null) {
         $berkas->pas_photo = $r->pas_foto;
      }
      if ($r->kartu_keluarga !== null) {
         $berkas->kk = $r->kartu_keluarga;
      }
      if ($r->akta !== null) {
         $berkas->akta = $r->akta;
      }
      if ($r->ijasah !== null) {
         $berkas->ijasah = $r->ijasah;
      }
      if ($r->ktp_ayah !== null) {
         $berkas->ktp_ayah = $r->ktp_ayah;
      }
      if ($r->ktp_ibu !== null) {
         $berkas->ktp_ibu = $r->ktp_ibu;
      }
      if ($r->ktp_wali !== null) {
         $berkas->ktp_wali = $r->ktp_wali;
      }

      try {
         $berkas->save();
         $message = ['type'=> 'success', 'body' => 'berkas berhasil ditambahkan!','title'=>'berhasil'];
      } catch (\Throwable $th) {
         $message = ['type'=> 'error', 'body' => $th->getMessage(),'title'=>'gagal'];
      }
      return $message;
   }
}
