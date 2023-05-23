<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PmbReference;

class PmbController extends Controller
{
    public function pmb_ref_form()
    {
        $crumbs = array('page'=>'Form Referensi Beban PMB','pages'=>[['title'=>'Master Siswa','url' => '#'],['title'=>'Referensi Beban','url' => '#'],['title'=>'PMB','url' => '#']]);
        return view('beban.pmb.form')->with('crumbs',$crumbs);
    }
}
