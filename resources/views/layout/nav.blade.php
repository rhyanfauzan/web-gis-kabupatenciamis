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
            <a href="{{ route('backend.home.index') }}">
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
                <li> <a href="{{ route('backend.usulan.index') }}"><i class="bx bx-right-arrow-alt"></i>Usulan</a>
                </li>
                <li> <a href="{{ route('backend.verifikasiUsulan.index') }}"><i class="bx bx-right-arrow-alt"></i>Daftar tunggu</a>
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
                <li> <a href="{{ route('backend.penerimaBantuan.index') }}"><i class="bx bx-right-arrow-alt"></i>Penerima bantuan</a>
                </li>
                <li> <a href="{{ route('backend.hasilPelaksanaan.index') }}"><i class="bx bx-right-arrow-alt"></i>Hasil pelaksanaan</a>
                </li>
                <li> <a href="{{ route('backend.perekaman.index') }}"><i class="bx bx-right-arrow-alt"></i>Perekaman</a>
                </li>
                <li> <a href="{{ route('backend.prasaranaSaranaUmum.index') }}"><i class="bx bx-right-arrow-alt"></i>PSU</a>
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
                <li> <a href="{{ route('backend.desa.index') }}"><i class="bx bx-right-arrow-alt"></i>Desa</a>
                </li>
                <li> <a href="{{ route('backend.kecamatan.index') }}"><i class="bx bx-right-arrow-alt"></i>Kecamatan</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('backend.hunian.index') }}">
                <div class="parent-icon"><i class='bx bx-buildings'></i>
                </div>
                <div class="menu-title">Hunian</div>
            </a>
        </li>
        <li>
            <a href="{{ route('backend.perumahan.index') }}">
                <div class="parent-icon"><i class='bx bx-building-house'></i>
                </div>
                <div class="menu-title">Perumahan</div>
            </a>
        </li>
        <li>
            <a href="{{ route('backend.rawanBencana.index') }}">
                <div class="parent-icon"><i class='bx bx-error-alt'></i>
                </div>
                <div class="menu-title">Area rawan bencana</div>
            </a>
        </li>
        <li>
            <a href="{{ route('backend.kawasankumuh.index') }}">
                <div class="parent-icon"><i class='bx bx-landscape'></i>
                </div>
                <div class="menu-title">Kawasan kumuh</div>
            </a>
        </li>
        <li>
            <a href="{{ route('backend.backlog.index') }}">
                <div class="parent-icon"><i class='bx bx-file'></i>
                </div>
                <div class="menu-title">Backlog</div>
            </a>
        </li>
        <li>
            <a href="{{ route('backend.pengelolaanUser.index') }}">
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