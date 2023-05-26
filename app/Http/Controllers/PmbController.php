<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmbReference;
use Carbon\Carbon;

class PmbController extends Controller
{
    public function PmbRefForm()
    {
        $crumbs = array('page'=>'Form Referensi Beban PMB','pages'=>[['title'=>'Master Siswa','url' => '#'],['title'=>'Referensi Beban','url' => '#'],['title'=>'PMB','url' => '#']]);
        return view('beban.pmb.form')->with('crumbs',$crumbs);
    }
    public function PmbRefSubmit(Request $r)
    {
        // return $r;
        $refPmb = new PmbReference;

        $refPmb->id_tahunajar = $r->id_tahunajar;
        $refPmb->nama = $r->nama;
        $refPmb->kelamin = $r->kelamin;
        $refPmb->status_alumni = $r->status_alumni;
        $refPmb->beban_gel1 = intval(preg_replace('/[^\d.]/', '', $r->beban_gel1));
        $refPmb->start_date_gel1 = Carbon::parse($r->start_date_gel1);
        $refPmb->end_date_gel1 = Carbon::parse($r->end_date_gel1);
        $refPmb->beban_gel2 = intval(preg_replace('/[^\d.]/', '', $r->beban_gel2));
        $refPmb->start_date_gel2 = Carbon::parse($r->start_date_gel2);
        $refPmb->end_date_gel2 = Carbon::parse($r->end_date_gel2);
        $refPmb->beban_gel3 = intval(preg_replace('/[^\d.]/', '', $r->beban_gel3));
        $refPmb->start_date_gel3 = Carbon::parse($r->start_date_gel3);
        $refPmb->end_date_gel3 = Carbon::parse($r->end_date_gel3);

        try {
            $refPmb->save();
            $message = ['type'=> 'success', 'body' => 'Referensi Beban berhasil ditambahkan!','title'=>'Success'];
        } catch (\Throwable $th) {
            $message = ['type'=> 'error', 'body' => 'Referensi Beban gagal ditambahkan!, error '.$th->getMessage(),'title'=>'Failed'];
        }

        return $message;
    }
}
