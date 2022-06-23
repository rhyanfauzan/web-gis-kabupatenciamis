@extends("layout.main")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />

@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Area rawan bencana
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-receipt'></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar area rawan bencana
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-primary px-3 align-content-center"><i class='bx bxs-plus-circle'></i>Tambah</button>
            </div>
        </div>
        <!--end breadcrumb-->
        <!-- table  -->
        <!-- <h6 class="mb-0 text-uppercase">DataTable Import</h6> -->
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <!-- judul  -->
                        <thead>
                            <tr>
                                <th>Nama area</th>
                                <th>Estimasi bencana</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th>Foto kawasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!-- body  -->
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>2 bulan</td>
                                <td>Cigayam </td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>1 minggu</td>
                                <td>Cigayam </td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>1 minggu</td>
                                <td>Cigayam </td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>5-6 bulan</td>
                                <td>Cigayam </td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>5-6 bulan</td>
                                <td>Cigayam </td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>5-6 bulan</td>
                                <td>Cigayam </td>
                                <td>Buni Seuri</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>3 bulan</td>
                                <td>Girimukti</td>
                                <td>Buni Seuri</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                <td>

                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>3 bulan</td>
                                <td>Girimukti</td>
                                <td>Buni Seuri</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>3 bulan</td>
                                <td>Girimukti</td>
                                <td>Buni Seuri</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>3 bulan</td>
                                <td>Girimukti</td>
                                <td>Buni Seuri</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>3 bulan</td>
                                <td>Girimukti</td>
                                <td>Buni Seuri</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Quinn Flynn</td>
                                <td>2 bulan</td>
                                <td>Girimukti</td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Charde Marshall</td>
                                <td>2 bulan</td>
                                <td>Girimukti</td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Haley Kennedy</td>
                                <td>2 bulan</td>
                                <td>Girimukti</td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Donna Snider</td>
                                <td>2 bulan</td>
                                <td>Girimukti</td>
                                <td>Cikijing</td>
                                <td>
                                    <a href="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90">
                                        <img src="https://awsimages.detik.net.id/community/media/visual/2020/08/12/puncak-bangku-ciamis_169.jpeg?w=600&q=90" alt="Foto kawasan" style="height: 40px;">
                                    </a>
                                </td>
                                </td>
                                <td>
                                    <a type="button" class="btn text-info p-0"><i class='bx bx-map-pin'></i></a>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- map & chart -->
        <div class="row">
            <hr>

            <!-- map  -->
            <div class="col-lg-9 mx-auto">
                <!-- <h6 class="text-uppercase">Area rawan bencana</h6> -->
                <!-- <hr /> -->
                <div class="card">
                    <div class="card-body">
                        <div id="simple-map-desa" class="gmaps"></div>
                    </div>
                </div>
            </div>
            <!-- chart  -->
            <div class="col-lg-3 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div id="chart-arb"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
<!-- google maps api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap" async defer></script>
<script src="assets/plugins/gmaps/map-custom-script.js"></script>
<!-- chart  -->
<script src="assets/plugins/highcharts/js/highcharts.js"></script>
<script src="assets/plugins/highcharts/js/highcharts-more.js"></script>
<script src="assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="assets/plugins/highcharts/js/solid-gauge.js"></script>
<script src="assets/plugins/highcharts/js/highcharts-3d.js"></script>
<script src="assets/plugins/highcharts/js/cylinder.js"></script>
<script src="assets/plugins/highcharts/js/funnel3d.js"></script>
<script src="assets/plugins/highcharts/js/exporting.js"></script>
<script src="assets/plugins/highcharts/js/export-data.js"></script>
<script src="assets/plugins/highcharts/js/accessibility.js"></script>
<script src="assets/plugins/highcharts/js/highcharts-custom.script.js"></script>
@endsection