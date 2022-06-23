@extends("layouts.app")
		@section("style")
		<link href="assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
	    <link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
	    <link href="assets/plugins/smart-wizard/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
		@endsection
		@section("wrapper")
            <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Prasarana Sarana Utilitas Umum</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-smile"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit data</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <hr>
                    <!--end breadcrumb-->
                    <div class="row">
                        <div class="col-xl-12 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <br />
                                    <!-- <p>
                                        <label>Theme:</label>
                                        <select id="theme_selector">
                                            <option value="default">Default</option>
                                            <option value="arrows">Arrows</option>
                                            <option value="dots" selected>Dots</option>
                                            <option value="dark">Dark</option>
                                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" id="is_justified" value="1" checked />
                                        <label for="is_justified">Justified</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>Animation:</label>
                                        <select id="animation">
                                            <option value="none">None</option>
                                            <option value="fade">Fade</option>
                                            <option value="slide-horizontal" selected>Slide Horizontal</option>
                                            <option value="slide-vertical">Slide Vertical</option>
                                            <option value="slide-swing">Slide Swing</option>
                                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>Go To:</label>
                                        <select id="got_to_step">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label>External Buttons:</label>
                                        <button class="btn btn-secondary" id="prev-btn" type="button">Go Previous</button>
                                        <button class="btn btn-secondary" id="next-btn" type="button">Go Next</button>
                                        <button class="btn btn-danger" id="reset-btn" type="button">Reset Wizard</button>
                                    </p> -->
                                    <br />
                                    <!-- SmartWizard html -->
                                    <div id="smartwizard">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#step-1">	<strong>1. Isi informasi dasar</strong></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#step-2">	<strong>2. Tambah foto prasana</strong></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#step-3">	<strong>3. Tambahkan foto sarana</strong></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#step-4">	<strong>4. Tambahkan foto utilitas</strong></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                                <!-- isi step 1 -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Nama PSU</label>
                                                        <input class="form-control mb-3" type="text">

                                                        <label for="">Keterangan</label>
                                                        <input class="form-control mb-3" type="text">      

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">Kecamatan</label>
                                                        <select class="form-select mb-3">
                                                            <option selected>Kecamatan 1</option>
                                                            <option value="1">Kecamatan 2</option>
                                                            <option value="2">Kecamatan 3</option>
                                                        </select>
                                                        <label for="">Desa</label>
                                                        <select class="form-select mb-3">
                                                            <option selected>Desa 1</option>
                                                            <option value="1">Desa 2</option>
                                                            <option value="2">Desa 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- end step 1 -->
                                            </div>
                                            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                                <!-- isi step 2  -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Jenis foto</label>
                                                        <select class="form-select mb-3">
                                                            <option selected>Jaringan jalan</option>
                                                            <option value="1">Drainase</option>
                                                            <option value="2">TPS</option>
                                                            <option value="3">Saluran pembuangan air limbah</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">Keterangan</label>
                                                        <input class="form-control mb-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="mb-0 text-uppercase">Foto<sup>*</sup></h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- end step 2 -->
                                            </div>
                                            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                                <!-- isi step 3  -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Jenis foto</label>
                                                        <select class="form-select mb-3">
                                                            <option selected>Ibadah</option>
                                                            <option value="1">Perniagaan</option>
                                                            <option value="2">Pendidikan</option>
                                                            <option value="3">Kesehatan</option>
                                                            <option value="4">Pelayanan umum dan pemerintah</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">Keterangan</label>
                                                        <input class="form-control mb-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="mb-0 text-uppercase">Foto<sup>*</sup></h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify2" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- end step 3 -->
                                            </div>
                                            <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                                                <!-- isi step 4  -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="">Jenis foto</label>
                                                        <select class="form-select mb-3">
                                                            <option selected>Air bersih</option>
                                                            <option value="1">Listrik</option>
                                                            <option value="2">Telpon</option>
                                                            <option value="3">Gas</option>
                                                            <option value="4">Transportasi</option>
                                                            <option value="5">Pemadam kebakaran</option>
                                                            <option value="6">Sarana penerangan jalan umum</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">Keterangan</label>
                                                        <input class="form-control mb-3" type="text">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <h6 class="mb-0 text-uppercase">Foto<sup>*</sup></h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify3" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- end step 4 -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
        
                    <hr>
                </div>
            </div>
		@endsection

	@section("script")
    <!-- upload images -->
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
		})
	</script>
    <!-- wizard  -->
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
	<script>
		$(document).ready(function () {
			// Toolbar extra buttons
			var btnFinish = $('<button></button>').text('Simpan').addClass('btn btn-info').on('click', function () {
				alert('Data tersimpan.');
			});
			var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click', function () {
				$('#smartwizard').smartWizard("reset");
			});
			// Step show event
			$("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
				$("#prev-btn").removeClass('disabled');
				$("#next-btn").removeClass('disabled');
				if (stepPosition === 'first') {
					$("#prev-btn").addClass('disabled');
				} else if (stepPosition === 'last') {
					$("#next-btn").addClass('disabled');
				} else {
					$("#prev-btn").removeClass('disabled');
					$("#next-btn").removeClass('disabled');
				}
			});
			// Smart Wizard
			$('#smartwizard').smartWizard({
				selected: 0,
				theme: 'default',
				transition: {
					animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
				},
				toolbarSettings: {
					toolbarPosition: 'both', // both bottom
					toolbarExtraButtons: [btnFinish, btnCancel]
				}
			});
			// External Button Events
			$("#reset-btn").on("click", function () {
				// Reset wizard
				$('#smartwizard').smartWizard("reset");
				return true;
			});
			$("#prev-btn").on("click", function () {
				// Navigate previous
				$('#smartwizard').smartWizard("prev");
				return true;
			});
			$("#next-btn").on("click", function () {
				// Navigate next
				$('#smartwizard').smartWizard("next");
				return true;
			});
			// Demo Button Events
			$("#got_to_step").on("change", function () {
				// Go to step
				var step_index = $(this).val() - 1;
				$('#smartwizard').smartWizard("goToStep", step_index);
				return true;
			});
			$("#is_justified").on("click", function () {
				// Change Justify
				var options = {
					justified: $(this).prop("checked")
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#animation").on("change", function () {
				// Change theme
				var options = {
					transition: {
						animation: $(this).val()
					},
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
			$("#theme_selector").on("change", function () {
				// Change theme
				var options = {
					theme: $(this).val()
				};
				$('#smartwizard').smartWizard("setOptions", options);
				return true;
			});
		});
	</script>
	@endsection
