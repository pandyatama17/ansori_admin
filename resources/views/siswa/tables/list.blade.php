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
                        <h4 class="card-title">Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        <table class="datatable">
                            <thead>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        @if (\App\Models\SPPMaster::where('nis',$siswa->nis)->get()->count() > 0)
                                            <td>{{ $siswa->kelas }}</td>
                                            <td>
                                                <a href="#"><span class="material-icons">search</span>| Lihat Detil siswa</a>
                                            </td>      
                                        @else
                                            <td>-</td>                                  
                                            @if (\App\Models\Berkas::where('id_siswa',$siswa->id)->get()->count() > 0)
                                                <td>Terdaftar - menunggu pembagian rombel</td>
                                                <td>
                                                    <a href="#"><span class="material-icons">edit</span>| Edit Rombel</a>
                                                </td>
                                            @else
                                                <td class="red-text">Validasi Berkas Belum lengkap</td>    
                                                <td>
                                                    <a href="{{route('form_pmb_berkas_id',$siswa->id)}}"><span class="material-icons">edit</span>| Edit Berkas</a>
                                                </td>
                                            @endif                                       
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection