@extends('layouts.pagewrapper')
@section('page')
<div class="col s12 m12 l12">
<br>
<div class="card center">
    <div class="card-content">
        <p class="caption ">Form Referensi Beban PMB</p>
      </div>
</div>
<div class="row">
    <div class="col s12 m12 l12">
        <ul class="collapsible popout">
            <li @if (!$agent->isMobile())@endif >
                <div class="collapsible-header gradient-45deg-red-pink white-text">
                    Data Referensi Beban PMB &nbsp;
                    <span class="right mt-2" style="font-size: 6pt;vertical-align: bottom;">(click to expand)</span>
                </div>
                <div class="collapsible-body white">
                    
                </div>
            </li>
            <li @if (!$agent->isMobile()) class="active" @endif >
                <div class="collapsible-header gradient-45deg-purple-deep-orange white-text">
                    Form Referensi Beban PMB &nbsp;
                    @if ($agent->isMobile())
                        <span class="right mt-2" style="font-size: 6pt;vertical-align: bottom;">(click to expand)</span>
                    @endif
                </div>
                <div class="collapsible-body white">
                    <form action="{{route('submit_pmb_ref')}}" method="post">
                        @csrf
                        <div class="row">
                            <ul class="collapsible popout col s12 m5" style="padding-top:0;margin-top:0;">
                                <li class="active">
                                    <div class="collapsible-header gradient-45deg-purple-amber white-text">Data Umum</div>
                                    <div class="collapsible-body white">
                                        <div class="input-field col s12 m5">
                                            <select name="id_tahunajar" class="select2 browser-default" id="id_tahunajarSelect" required>
                                                <option value="1">2022-2023</option>
                                                <option value="2">2023-2024</option>
                                            </select>
                                            <label for="">Tahun Ajaran</label>
                                        </div>
                                        <div class="input-field col m7 s12" style="padding-top: 0;margin-top:0;">
                                            <label for="" style="padding-top: 0;margin-top:0;">Jenis Kelamin: <span class="red-text">*</span></label>
                                            <br><br>
                                            <p>
                                                <label>
                                                  <input name="kelamin" type="radio" value="laki-laki"/>
                                                  <span>Laki-Laki</span>
                                                </label>
                                                <label>
                                                  <input name="kelamin" type="radio" value="perempuan"/>
                                                  <span>Perempuan</span>
                                                </label>
                                              </p>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <label for="bebanDaftarUlang">Beban Daftar Ulang (Rp.): <span class="red-text">*</span></label>
                                            <input type="text" class="rupiah" id="bebanDaftarUlang" name="beban_daftarulang" >
                                        </div>
                                        <div class="input-field col m6 s12" style="padding-top: 0;margin-top:0;">
                                            <label for="" style="padding-top: 0;margin-top:0;">Status Alumni: <span class="red-text">*</span></label>
                                            <br><br>
                                            <p>
                                                <label>
                                                  <input name="status_alumni" type="radio" value="1"/>
                                                  <span>Alumni</span>
                                                </label>
                                                <label>
                                                  <input name="status_alumni" type="radio" value="0" checked/>
                                                  <span>Non-Alumni</span>
                                                </label>
                                              </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="collapsible col s12 m7" style="padding-left:0; padding-right:0">
                                <li class="active">
                                    <div class="collapsible-header gradient-45deg-light-blue-cyan white-text">Gelombang 1</div>
                                    <div class="collapsible-body white">
                                        <div class="input-field col m4 s12">
                                            <label for="bebanGel1">Beban Gelombang 1: <span class="red-text">*</span></label>
                                            <input type="text" class="rupiah" id="bebanGel1" name="beban_gel1" >
                                        </div>
                                        <div class="input-field col m4 s6">
                                            <label for="startDateGel1">Tgl. Mulai Gelombang 1:<span class="red-text">*</span></label>
                                            <input type="text" class=" datepicker" id="startDateGel1" name="start_date_gel1">
                                        </div>
                                        <div class="input-field col m4 s6">
                                            <label for="endDateGel1">Tgl. Akhir Gelombang 1:<span class="red-text">*</span></label>
                                            <input type="text" class="datepicker" id="endDateGel1" name="end_date_gel1">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                                <li class="active">
                                    <div class="collapsible-header gradient-45deg-indigo-blue white-text">Gelombang 2</div>
                                    <div class="collapsible-body white">
                                        <div class="input-field col m4 s12">
                                            <label for="bebanGel2">Beban Gelombang 2: <span class="red-text">*</span></label>
                                            <input type="text" class="rupiah" id="bebanGel2" name="beban_gel2" >
                                        </div>
                                        <div class="input-field col m4 s6">
                                            <label for="startDateGel2">Tgl. Mulai Gelombang 2:<span class="red-text">*</span></label>
                                            <input type="text" class=" datepicker" id="startDateGel2" name="start_date_gel2">
                                        </div>
                                        <div class="input-field col m4 s6">
                                            <label for="endDateGel2">Tgl. Akhir Gelombang 2:<span class="red-text">*</span></label>
                                            <input type="text" class="datepicker" id="endDateGel2" name="end_date_gel2">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                                <li class="active">
                                    <div class="collapsible-header gradient-45deg-indigo-light-blue white-text">Gelombang 3</div>
                                    <div class="collapsible-body white">
                                        <div class="input-field col m4 s12">
                                            <label for="bebanGel3">Beban Gelombang 3: <span class="red-text">*</span></label>
                                            <input type="text" class="rupiah" id="bebanGel3" name="beban_gel3" >
                                        </div>
                                        <div class="input-field col m4 s6">
                                            <label for="startDateGel3">Tgl. Mulai Gelombang 2:<span class="red-text">*</span></label>
                                            <input type="text" class=" datepicker" id="startDateGel3" name="start_date_gel3">
                                        </div>
                                        <div class="input-field col m4 s6">
                                            <label for="endDateGel3">Tgl. Akhir Gelombang 2:<span class="red-text">*</span></label>
                                            <input type="text" class="datepicker" id="endDateGel3" name="end_date_gel3">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </li>
                            </ul>
                            <button type="submit" class="btn waves-effect right">Submit</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection