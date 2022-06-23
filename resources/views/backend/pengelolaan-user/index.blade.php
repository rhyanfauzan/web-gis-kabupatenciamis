@extends("layout.main")

@section("style")
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Pengelolaan user
            </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-user-check'></i></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pengelolaan user
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <!-- body  -->
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>user@gmail.com</td>
                                <td>User</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>user@gmail.com</td>
                                <td>User</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>user@gmail.com</td>
                                <td>User</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>user@gmail.com</td>
                                <td>User</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>user@gmail.com</td>
                                <td>User</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>user@gmail.com</td>
                                <td>User</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>

                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Quinn Flynn</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Charde Marshall</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Haley Kennedy</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Donna Snider</td>
                                <td>admin@gmail.com</td>
                                <td>Administrator</td>
                                <td>
                                    <a type="button" class="btn text-warning p-0"><i class='bx bx-edit'></i></a>
                                    <a type="button" class="btn text-danger p-0"><i class='bx bx-trash'></i></a>
                                </td>

                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
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
@endsection