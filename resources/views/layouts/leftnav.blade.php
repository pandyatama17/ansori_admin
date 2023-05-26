<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a class="brand-logo darken-1" href="#">
        <img class="hide-on-med-and-down" src="{{asset('images/logo.png')}}" alt="logo"/>
        <img class="show-on-medium-and-down hide-on-med-and-up" src="{{asset('images/logo.png')}}" alt=" logo"/>
        <span class="logo-text hide-on-med-and-down" style="font-size:15pt">APLIKASI</span>
      </a>
      <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a>
    </h1>
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
    <li class="navigation-header"><a class="navigation-header-text">Siswa</a><i class="navigation-header-icon material-icons">more_horiz</i></li>
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">school</i><span class="menu-title" data-i18n="Pages">Master Menu Siswa</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">local_library</i><span class="menu-title" data-i18n="Pages">PMB</span></a>
            <div class="collapsible-body">
              <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li class="bold"><a class="waves-effect waves-cyan " href="{{route('form_pmb')}}"><i class="material-icons">how_to_reg</i><span class="menu-title" data-i18n="Calendar">Pendaftaran Baru</span></a></li>
                <li class="bold"><a class="waves-effect waves-cyan " href="{{route('form_pmb_berkas')}}"><i class="material-icons">cases</i><span class="menu-title" data-i18n="Calendar">Berkas</span></a></li>
              </ul>
          </li>
          <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Pages">Data Siswa</span></a>
            <div class="collapsible-body">
              <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li class="bold"><a class="waves-effect waves-cyan " href="{{route('list_siswa')}}"><i class="material-icons">list</i><span class="menu-title" data-i18n="Calendar">Semua Siswa</span></a></li>
                <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">search</i><span class="menu-title" data-i18n="Calendar">Jurusan/Kelas</span></a></li>
              </ul>
          </li>
        </ul>
      </div>
    </li>
    <li class="navigation-header"><a class="navigation-header-text">Kesiswaan  </a><i class="navigation-header-icon material-icons">more_horiz</i></li>
    
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">foundation</i><span class="menu-title" data-i18n="Pages">Pembagian</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">engineering</i><span class="menu-title" data-i18n="Calendar">Pembagian Kelas/Rombel</span></a></li>
          
        </ul>
      </div>
    </li>
    <li class="navigation-header"><a class="navigation-header-text">Tata Usaha  </a><i class="navigation-header-icon material-icons">more_horiz</i></li>
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">receipt_long</i><span class="menu-title" data-i18n="Pages">Data Pembayaran Siswa</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">receipt_long</i><span class="menu-title" data-i18n="Pages">Data Tagihan</span></a>
            <div class="collapsible-body">
              <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Tagihan PMB Siswa</span></a></li>
                <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Tagihan SPP Siswa</span></a></li>
              </ul>
            </div>
          </li>
          <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">receipt_long</i><span class="menu-title" data-i18n="Pages">Data Transaksi</span></a>
            <div class="collapsible-body">
              <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Transaksi PMB Siswa</span></a></li>
                <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Transaksi SPP Siswa</span></a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </li>
    <li class="navigation-header"><a class="navigation-header-text">Yayasan  </a><i class="navigation-header-icon material-icons">more_horiz</i></li>
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">foundation</i><span class="menu-title" data-i18n="Pages">Referensi Yayasan</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">engineering</i><span class="menu-title" data-i18n="Calendar">Data Jurusan</span></a></li>
          <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Data Kelas/Rombel</span></a></li>
          <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">calendar_today</i><span class="menu-title" data-i18n="Calendar">Data Tahun Ajaran</span></a></li>
          <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">star</i><span class="menu-title" data-i18n="Calendar">Beasiswa</span></a></li>
        </ul>
      </div>
    </li>
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">receipt_long</i><span class="menu-title" data-i18n="Pages">Data Referensi Beban</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li class="bold"><a class="waves-effect waves-cyan " href="{{route('form_referensi_pmb')}}"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Beban PMB Siswa</span></a></li>
          <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Beban SPP</span></a></li>
          <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">diversity_3</i><span class="menu-title" data-i18n="Calendar">Beban Beasiswa</span></a></li>
        </ul>
      </div>
    </li>
    <li class="bold"><a class="waves-effect waves-cyan " href="#"><i class="material-icons">engineering</i><span class="menu-title" data-i18n="Calendar">Data Pegawai</span></a></li>
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium red waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>