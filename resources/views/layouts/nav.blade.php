<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-ciamis.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" style="color: #A72185;">BaimKumis</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('index') }}">
                <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-wallet'></i>
                </div>
                <div class="menu-title">Rutilahu</div>
            </a>
            <ul>
                <li> <a href="{{ url('usulan') }}"><i class="bx bx-right-arrow-alt"></i>Usulan</a>
                </li>
                <li> <a href="{{ url('daftartunggu') }}"><i class="bx bx-right-arrow-alt"></i>Daftar tunggu</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-archive'></i>
                </div>
                <div class="menu-title">Layanan</div>
            </a>
            <ul>
                <li> <a href="{{ url('penerimabantuan') }}"><i class="bx bx-right-arrow-alt"></i>Penerima bantuan</a>
                </li>
                <li> <a href="{{ url('hasilpelaksanaan') }}"><i class="bx bx-right-arrow-alt"></i>Hasil pelaksanaan</a>
                </li>
                <li> <a href="{{ url('perekaman') }}"><i class="bx bx-right-arrow-alt"></i>Perekaman</a>
                </li>
                <li> <a href="{{ url('psu') }}"><i class="bx bx-right-arrow-alt"></i>PSU</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-map-alt'></i>
                </div>
                <div class="menu-title">Map</div>
            </a>
            <ul>
                <li> <a href="{{ url('map-desa') }}"><i class="bx bx-right-arrow-alt"></i>Desa</a>
                </li>
                <li> <a href="{{ url('map-kecamatan') }}"><i class="bx bx-right-arrow-alt"></i>Kecamatan</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ url('hunian') }}">
                <div class="parent-icon"><i class='bx bx-buildings'></i>
                </div>
                <div class="menu-title">Hunian</div>
            </a>
        </li>
        <li>
            <a href="{{ url('perumahan') }}">
                <div class="parent-icon"><i class='bx bx-building-house'></i>
                </div>
                <div class="menu-title">Perumahan</div>
            </a>
        </li>
        <li>
            <a href="{{ url('rawan-bencana') }}">
                <div class="parent-icon"><i class='bx bx-error-alt'></i>
                </div>
                <div class="menu-title">Area rawan bencana</div>
            </a>
        </li>
        <li>
            <a href="{{ url('kawasan-kumuh') }}">
                <div class="parent-icon"><i class='bx bx-landscape'></i>
                </div>
                <div class="menu-title">Kawasan kumuh</div>
            </a>
        </li>
        <li>
            <a href="{{ url('backlog') }}">
                <div class="parent-icon"><i class='bx bx-file'></i>
                </div>
                <div class="menu-title">Backlog</div>
            </a>
        </li>
        <li>
            <a href="{{ url('pengelolaan-user') }}">
                <div class="parent-icon"><i class='bx bx-user-check'></i>
                </div>
                <div class="menu-title">Pengelolaan user</div>
            </a>
        </li>

        <!-- end side bar  -->

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->