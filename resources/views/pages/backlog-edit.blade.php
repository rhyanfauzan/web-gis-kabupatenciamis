	@extends("layouts.app")
		@section("style")
		<link href="assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
	    <link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />

		@endsection
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Backlog</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-file"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit data</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-12">
                            <!-- <h6 class="mb-0 text-uppercase">Text Inputs</h6> -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="kepemilikan">Kecamatan</label>
                                            <select class="form-select mb-3" aria-label="Status kepemilikan">
                                                <option selected>Kecamatan 1</option>
                                                <option value="1">Kecamatan 2</option>
                                                <option value="2">Kecamatan 3</option>
                                            </select>
                                            <label for="">Jumlah KK</label>
                                            <input class="form-control mb-3" type="number">
                                            <label for="">Jumlah penduduk</label>
                                            <input class="form-control mb-3" type="number">
                                            <label for="">Jumlah rumah</label>
                                            <input class="form-control mb-3" type="number">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="">Kebutuhan rumah</label>
                                            <input class="form-control mb-3" type="number">
                                            <label for="">Tanggal</label>
                                            <input class="form-control mb-3" type="date">
                                            <label for="">Backlog</label>
                                            <input class="form-control mb-3" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-secondary">Batal</button>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <!--end row-->
                    <hr>
                    
                </div>
            </div>
		@endsection

	@section("script")
    <script src="assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script src="assets/plugins/input-tags/js/tagsinput.js"></script>
    <script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
			$('#image-uploadify2').imageuploadify();
			$('#image-uploadify3').imageuploadify();
			$('#image-uploadify4').imageuploadify();
			$('#image-uploadify5').imageuploadify();
			$('#image-uploadify6').imageuploadify();
			$('#image-uploadify7').imageuploadify();
		})
	</script>
	@endsection
