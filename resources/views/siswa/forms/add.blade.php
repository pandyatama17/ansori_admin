@extends('layouts.pagewrapper')
@section('page')
<div class="col s12 m12 l12">
    <br>
    {{-- <div class="card center">
        <div class="card-content">
            <p class="caption ">Form Daftar ulang</p>
        </div>
    </div>
    <div class="clearfix"></div> --}}
    <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="card-header">
                <h4 class="card-title">Form Pendaftaran Baru</h4>
              </div>
    
              <ul class="stepper" id="nonLinearStepper">
                <li class="step active">
                  <div class="step-title waves-effect">Pendaftaran</div>
                  <div class="step-content">
                    <form action="{{ route('generate_nis')}}" id="generateNisForm" method="post">
                      @csrf
                      <div class="row">
                          <div class="input-field col s6 m5">
                              <select name="tahun_ajar" class="select2 browser-default" id="tahunAjarSelect" required>
                                  <option value="2223">2022-2023</option>
                                  <option value="2324">2023-2024</option>
                              </select>
                              <label for="">Tahun Ajaran</label>
                          </div>
                          <div class="input-field col s4 m4">
                              <select name="tingkatan" class="select2 browser-default" id="tingkatanSelect" required>
                                  <option value="1">TK</option>
                                  <option value="2">SD</option>
                                  <option value="3">MI</option>
                                  <option value="4">SMP</option>
                                  <option value="5">SMK</option>
                              </select>
                              <label for="">Tingkatan</label>
                          </div>
                          <div class="input-field col s4 m3">
                              <select name="kelas" class="select2 browser-default" id="kelasSelect" required>
                                  <option selected disabled>Pilih Kelas...</option>
                              </select>
                              <label for="">Kelas</label>
                          </div>
                      </div>
                    </form>
                    <form action="{{ route('create_siswa')}}" id="addSiswaForm" method="post">
                      @csrf
                      <input type="hidden" name="tingkatan" id="siswaInputTingkatan">
                      <input type="hidden" name="kelas" id="siswaInputKelas">
                      <div class="row">
                        {{-- <div class="input-field col s6">
                            <input type="text" name="generatedNIS" id="generatedNIS" value=" " readonly>
                            <label for="">NIS</label>
                        </div>
                        <div class="col m4 s12 mb-3" style='padding-top:20px'>
                          <button class="waves-effect waves dark btn purple btn-primary" type="button" id="generateNISButton">
                            Generate NIS
                          </button>
                        </div> --}}
                        <div class="input-field col s6">
                          <input type="text" name="nopen" id="nopen" value=" " readonly>
                          <label for="">Nomor Pendaftaran</label>
                      </div>
                      <div class="col m4 s12 mb-3" style='padding-top:20px'>
                        <button class="waves-effect waves dark btn purple btn-primary" type="button" id="generateNopenButton">
                          Generate Nopen
                        </button>
                      </div>
                      </div>
                      <div class="step-actions">
                        <div class="row">
                          
                          <div class="col m4 s12 mb-3">
                            <button class="waves-effect waves dark btn green btn-primary next-step" type="button">
                              Lanjut
                              <i class="material-icons right">arrow_forward</i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="step">
                    <div class="step-title waves-effect">Data Diri</div>
                    <div class="step-content">
                      <div class="row">
                        <div class="input-field col m6 s12">
                          <label for="">Nama Lengkap: <span class="red-text">*</span></label>
                          <input type="text" class="" id="siswaInputNama" name="nama" >
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="">Jenis Kelamin: <span class="red-text">*</span></label>
                          <br><br>
                          <div class="clearfix"></div>
                          <p>
                              <label>
                                <input name="jenis_kelamin" type="radio" value="laki-laki"/>
                                <span>Laki-Laki</span>
                              </label>
                              <label>
                                <input name="jenis_kelamin" type="radio" value="perempuan"/>
                                <span>Perempuan</span>
                              </label>
                            </p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col m6 s12">
                          <label for="">Tempat Lahir:<span class="red-text">*</span></label>
                          <input type="text" class="" id="siswaInputTempatLahir" name="tempat_lahir">
                        </div>
                        <div class="input-field col m6 s12">
                          <label for="">Tanggal Lahir:<span class="red-text">*</span></label>
                          <input type="text" class=" datepicker" id="siswaInputTanggalLahir" name="tanggal_lahir">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col m2 s12">
                          <label for="">Anak Ke-: <span class="red-text">*</span></label>
                          <input type="number" class="" value="1" min="1" id="siswaInputAnakKe" name="anak_ke">
                        </div>
                        <div class="input-field col m3 s12">
                          <label for="">Tinggi Badan (cm): <span class="red-text">*</span></label>
                          <input type="number" class="" value="1" min="1" id="siswaInputTinggiBadan" name="tinggi_badan">
                        </div>
                        <div class="input-field col m3 s12">
                          <label for="">Berat Badan (kg): <span class="red-text">*</span></label>
                          <input type="number" class="" value="1" min="1" id="siswaInputBeratBadan" name="berat_badan">
                        </div>
                      </div>
                      <div class="row">
                          <div class="input-field col m6 s12">
                            <label for="">No. HP: <span class="red-text">*</span></label>
                            <input type="text" class="" id="siswaInputNoHP" name="no_hp">
                          </div>
                          <div class="input-field col m6 s12">
                            <label for="">No. Telp Rumah: <span class="red-text">*</span></label>
                            <input type="text" class="" id="siswaInputNoTelpRumah" name="no_telp_rumah">
                          </div>
                          <div class="input-field col m6 s12">
                              <label for="">e-mail: <span class="red-text">*</span></label>
                              <input type="email" class="" id="siswaInputEmail" name="email">
                            </div>
                        </div>
                      <div class="step-actions">
                        <div class="row">
                          <div class="col m4 s12 mb-3">
                            <button class="btn btn-light previous-step">
                              <i class="material-icons left">arrow_back</i>
                              Prev
                            </button>
                          </div>
                          <div class="col m4 s12 mb-3">
                            <button class="waves-effect waves dark btn btn-primary next-step" type="button">
                              Next
                              <i class="material-icons right">arrow_forward</i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="step">
                    <div class="step-title waves-effect">Alamat</div>
                    <div class="step-content">
                      <div class="row">
                        <div class="input-field col m4 s12">
                          <label for="">Nama Jalan: <span class="red-text">*</span></label>
                          <input type="text" class="" id="siswaInputTinggal" name="tinggal" required>
                        </div>
                        <div class="input-field col m2 s12">
                          <label for="">RT: <span class="red-text">*</span></label>
                          <input type="text" class="" id="siswaInputRT" name="RT" required>
                        </div>
                        <div class="input-field col m2 s12">
                          <label for="">RW: <span class="red-text">*</span></label>
                          <input type="text" class="" id="siswaInputRW" name="RW" required>
                        </div>
                        <div class="input-field col m4 s12">
                          <label for="">Dusun: <span class="red-text">*</span></label>
                          <input type="text" class="" id="siswaInputDusun" name="dusun" required>
                        </div>
                      </div>
                      <div class="row">
                          <div class="input-field col m5 s12">
                              <label for="">Kelurahan: <span class="red-text">*</span></label>
                              <input type="text" class="" id="siswaInputKelurahan" name="kelurahan" required>
                          </div>
                          <div class="input-field col m5 s12">
                              <label for="">Kecamatan: <span class="red-text">*</span></label>
                              <input type="text" class="" id="siswaInputKecamatan" name="kecamatan" required>
                            </div>
                          <div class="input-field col m2 s12">
                              <label for="">Kode Pos: <span class="red-text">*</span></label>
                              <input type="text" class="" id="siswaInputKodePos" name="kode_pos" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="input-field col m2 s12">
                              <label for="">Jarak Ke sekolah (km): <span class="red-text">*</span></label>
                              <input type="text" class="" id="siswaInputJarakSekolah" name="jarak_sekolah" required>
                          </div>
                          <div class="input-field col m4 s12">
                            <label for="">Transportasi: <span class="red-text">*</span></label>
                            <input type="text" class="" id="siswaInputTransport" name="transport" required>
                        </div>
                      </div>
                      <div class="step-actions">
                        <div class="row">
                          <div class="col m4 s12 mb-3">
                            <button class="btn btn-light previous-step">
                              <i class="material-icons left">arrow_back</i>
                              Prev
                            </button>
                          </div>
                          <div class="col m4 s12 mb-3">
                            <button class="waves-effect waves dark btn btn-primary next-step" type="button">
                              Next
                              <i class="material-icons right">arrow_forward</i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="step">
                    <div class="step-title waves-effect">Asal Sekolah(????)</div>
                    <div class="step-content">
                      <div class="row">
                        <div class="input-field col m4 s12">
                          <label for="">Status Alumni: <span class="red-text">*</span></label>
                          <br><br>
                          <div class="clearfix"></div>
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
                        <div class="input-field col m4 s12">
                          <label for="">Jenis Pendaftaran: <span class="red-text">*</span></label>
                          <br><br>
                          <div class="clearfix"></div>
                          <p>
                              <label>
                                <input name="jenis_pendaftaran" type="radio" value="baru" checked/>
                                <span>Baru</span>
                              </label>
                              <label>
                                <input name="jenis_pendaftaran" type="radio" value="pindahan" />
                                <span>Pindahan</span>
                              </label>
                            </p>
                        </div>
                        <div class="input-field col m4 s12">
                          <label for="">Gelombang Pendaftaran: <span class="red-text">*</span></label>
                          <br><br>
                          <div class="clearfix"></div>
                          <p>
                              <label>
                                <input name="gelombang_pendaftaran" type="radio" value="1" checked/>
                                <span>1</span>
                              </label>
                              <label>
                                <input name="gelombang_pendaftaran" type="radio" value="2" />
                                <span>2</span>
                              </label>
                              <label>
                                <input name="gelombang_pendaftaran" type="radio" value="3" />
                                <span>3</span>
                              </label>
                            </p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col m4 s12">
                          <label for="">Tanggal Masuk:<span class="red-text">*</span></label>
                          <input type="text" class=" datepicker" id="siswaInputTanggalMasuk" name="tanggal_masuk" required>
                        </div>
                        <div class="input-field col m4 s12">
                          <label for="">Tanggal keluar:</label>
                          <input type="text" class=" datepicker" id="siswaInputTanggalKeluar" name="tanggal_keluar">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col m3 s12">
                          <label for="">NPSN Sekolah Asal: </label>
                          <input type="text" class="" id="siswaInputNPSNSekolahAsal" name="npsn_sekolahasal">
                        </div>
                        <div class="input-field col m5 s12">
                          <label for="">Nama Sekolah Asal: </label>
                          <input type="text" class="" id="siswaInputAsalSekolah" name="asal_sekolah">
                        </div>
                        <div class="input-field col m4 s12">
                          <label for="">No. Ujian Sebelumnya: </label>
                          <input type="text" class="" id="siswaInputNoUjianSebelum" name="no_ujian_sebelum">
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col m6 s12">
                          <label for="">No. Ijasah: </label>
                          <input type="text" class="" id="siswaInputNoIjasah" name="no_ijasah">
                        </div> 
                        <div class="input-field col m6 s12">
                          <label for="">Ket. Ijasah: </label>
                          <textarea name="ket_ijasah" id="siswaInputKetIjasah" rows="4" class="materialize-textarea"></textarea>
                        </div> 
                      </div>
                      <div class="step-actions">
                        <div class="row">
                          <div class="col m4 s12 mb-3">
                            <button class="btn btn-light previous-step">
                              <i class="material-icons left">arrow_back</i>
                              Prev
                            </button>
                          </div>
                          <div class="col m6 s12 mb-1">
                            <button class="waves-effect waves-dark btn btn-primary green" type="submit">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection