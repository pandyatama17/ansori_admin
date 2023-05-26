@extends('layouts.pagewrapper')
@section('page')
<div class="col s12 m12 l12">
<br>
<div class="card center">
    <div class="card-content">
        <p class="caption ">Form pengisian berkas PMB</p>
      </div>
</div>
<div class="row">
    <div class="col s12 m12 l7">
        <ul class="collapsible popout">
            <li @if (!$agent->isMobile()) class="active" @endif >
                <div class="collapsible-header gradient-45deg-purple-deep-orange white-text">
                    Data NIS &nbsp;
                    @if ($agent->isMobile())
                        <span class="right mt-2" style="font-size: 6pt;vertical-align: bottom;">(click to expand)</span>
                    @endif
                </div>
                <div class="collapsible-body white">
                    <form action="">
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="text" name="nis" id="nis" value=" @if($nis){{$nis}} @endisset " readonly>
                                <label for="">NIS</label>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li>
                <div class="collapsible-header gradient-45deg-purple-light-blue white-text">
                   Data Berkas
                </div>
                <div class="collapsible-body white">
                    <div class="row">
                        <form action="{{route('submit_berkas')}}" method="post">
                          @csrf
                          <input type="hidden" name="id_siswa" id="berkasInputidSiswa" value="@if($id_siswa){{$id_siswa}}@endisset">
                          <div class="file-field input-field col s12 m6 ">
                            <div class="btn @if($berkas->pas_photo)green lighten-1 @else red @endif">
                              <span>Pas Foto</span>
                              <input type="file" name="pas_foto">
                              @if ($berkas->pas_photo)
                                  <span class="material-icons">check</span>
                              @endif
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text"  value="{{$berkas->pas_photo}}">
                            </div>
                          </div>
                          <div class="file-field input-field col s12 m6 ">
                            <div class="btn @if($berkas->kk)green lighten-1 @else red @endif">
                              <span>Kartu Keluarga</span>
                              <input type="file" name="kartu_keluarga">
                              @if ($berkas->kk)
                                  <span class="material-icons">check</span>
                              @endif
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" value="{{$berkas->kk}}">
                            </div>
                          </div>
                          <div class="file-field input-field col s12 m6 ">
                            <div class="btn @if($berkas->akta)green lighten-1 @else red @endif">
                              <span>Akta</span>
                              <input type="file" name="akta">
                              @if ($berkas->akta)
                                  <span class="material-icons">check</span>
                              @endif
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text"  value="{{$berkas->akta}}">
                            </div>
                          </div>
                          <div class="file-field input-field col s12 m6 ">
                            <div class="btn @if($berkas->ijasah)green lighten-1 @else red @endif">
                              <span>Ijasah</span>
                              <input type="file" name="ijasah">
                              @if ($berkas->ijasah)
                                  <span class="material-icons">check</span>
                              @endif
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" value="{{$berkas->ijasah}}">
                            </div>
                          </div>
                          <div class="file-field input-field col s12 m6 ">
                            <div class="btn @if($berkas->ktp_ayah)green lighten-1 @else red @endif">
                              <span>KTP Ayah</span>
                              <input type="file" name="ktp_ayah">
                              @if ($berkas->ktp_ayah)
                                  <span class="material-icons">check</span>
                              @endif
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" value="{{$berkas->ktp_ayah}}">
                            </div>
                          </div>
                          <div class="file-field input-field col s12 m6 ">
                            <div class="btn @if($berkas->ktp_ibu)green lighten-1 @else red @endif">
                              <span>KTP Ibu</span>
                              <input type="file" name="ktp_ibu">
                              @if ($berkas->ktp_ibu)
                                  <span class="material-icons">check</span>
                              @endif
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" value="{{$berkas->ktp_ibu}}">
                            </div>
                          </div>
                          <div class="file-field input-field col s12 m6 ">
                            <div class="btn @if($berkas->ktp_wali)green lighten-1 @else cyan @endif">
                              <span>KTP Wali</span>
                              <input type="file" name="ktp_wali"  value="{{$berkas->ktp_wali}}">
                              @if ($berkas->ktp_wali)
                                  <span class="material-icons">check</span>
                              @endif
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate" type="text">
                            </div>
                          </div>
                          <div class="row">
                            <br>
                            <div class="col m12">
                              <button class="right btn green waves-effect" type="submit">Simpan</button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    @if ($agent->isMobile())@endif
    <div class="col s12 m12 l5">
        <ul class="collapsible">
            <li class="active">
                <div class="collapsible-header gradient-45deg-indigo-light-blue white-text">
                   Preview Dokumen
                </div>
                <div class="collapsible-body white">
                    <div class="row">
                        <div class="collection">
                            <a href="#test1" class="collection-item">
                                Pas Foto
                                @if ($berkas->pas_photo)
                                  <i class="green-text material-icons right">check_circle</i>
                                @else
                                  <i class="orange-text material-icons right">error</i>
                                @endif
                            </a>
                            <a href="#test2" class="collection-item">
                                Kartu Keluarga
                                @if ($berkas->kk)
                                <i class="green-text material-icons right">check_circle</i>
                                @else
                                  <i class="orange-text material-icons right">error</i>
                                @endif
                            </a>
                            <a href="#test3" class="collection-item">
                                Ijasah
                                @if ($berkas->ijasah)
                                  <i class="green-text material-icons right">check_circle</i>
                                @else
                                  <i class="orange-text material-icons right">error</i>
                                @endif
                            </a>
                            <a href="#test4" class="collection-item">
                              Akta
                              @if ($berkas->akta)
                                  <i class="green-text material-icons right">check_circle</i>
                                  @else
                                    <i class="orange-text material-icons right">error</i>
                                @endif
                            </a>
                            <a href="#test5" class="collection-item">
                                Ktp Ayah
                                @if ($berkas->ktp_ayah)
                                  <i class="green-text material-icons right">check_circle</i>
                                @else
                                  <i class="orange-text material-icons right">error</i>
                                @endif
                            </a>
                            <a href="#test6" class="collection-item">
                                Ktp Ibu
                                @if ($berkas->ktp_ibu)
                                <i class="green-text material-icons right">check_circle</i>
                                @else
                                  <i class="orange-text material-icons right">error</i>
                                @endif
                            </a>
                            <a href="#test7" class="collection-item">
                                Ktp Wali
                                @if ($berkas->ktp_wali)
                                <i class="green-text material-icons right">check_circle</i>
                                @else
                                  <i class="orange-text material-icons right">error</i>
                                @endif
                            </a>
                          </div>
                        <div id="test1" class="col s12" style="display:none">Test 1</div>
                        <div id="test2" class="col s12" style="display:none">Test 2</div>
                        <div id="test3" class="col s12" style="display:none">Test 3</div>
                        <div id="test4" class="col s12" style="display:none">Test 4</div>
                        <div id="test5" class="col s12" style="display:none">Test 4</div>
                        <div id="test6" class="col s12" style="display:none">Test 4</div>
                        <div id="test7" class="col s12" style="display:none">Test 4</div>
                      </div>
                </div>
            </li>
        </ul>
    </div>
</div>

</div>
@endsection