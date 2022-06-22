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
                        <div class="breadcrumb-title pe-3">Perekaman</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-list-ul"></i></a>
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
                                                <a class="nav-link" href="#step-1">	<strong>1. Perekaman Hunian</strong></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#step-2">	<strong>2. Perekaman Bantuan</strong></a>
                                                    <!-- <br>This is step description</a> -->
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#step-3">	<strong>3. Isi data lokasi</strong></a>
                                                    <!-- <br>This is step description</a> -->
                                            </li>
                                            <!-- <li class="nav-item">
                                                <a class="nav-link" href="#step-4">	<strong>Step 4</strong>
                                                    <br>This is step description</a>
                                            </li> -->
                                        </ul>
                                        <div class="tab-content">
                                            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                                                <!-- isi step 1 -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="kepemilikan">Status kepemilikan<sup>*</sup></label>
                                                        <select class="form-select mb-3" aria-label="Status kepemilikan">
                                                            <option selected>SHM</option>
                                                            <option value="1">Akta jual beli</option>
                                                            <option value="2">Hak Guna</option>
                                                        </select>

                                                        <label for="bentuk">Bentuk bangunan<sup>*</sup></label>
                                                        <select class="form-select mb-3" aria-label="Bentuk bangunan">
                                                            <option selected>Apartmen</option>
                                                            <option value="1">Deret</option>
                                                            <option value="2">Kopel</option>
                                                            <option value="3">Rusunawa</option>
                                                            <option value="4">Tunggal</option>
                                                        </select>

                                                        <label for="">Luas tanah (m<sup>2</sup>)<sup>*</sup></label>
                                                        <input class="form-control mb-3" type="text" placeholder="Luas tanah" aria-label="luas tanah">
                                                        
                                                        <label for="">Luas bangunan (m<sup>2</sup>)<sup>*</sup></label>
                                                        <input class="form-control mb-3" type="text" placeholder="Luas bangunan" aria-label="luas bangunan">

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="listrik">Tersedia Listrik</label>
                                                        <div class="row justify-content-start">
                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                    <label class="form-check-label" for="flexRadioDefault1">Ya</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 mx-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                                    <label class="form-check-label" for="flexRadioDefault2">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <label for="listrik">Memiliki Izin Mendirikan Bangunan (IMB)</label>
                                                        <div class="row justify-content-start">
                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault3">
                                                                    <label class="form-check-label" for="flexRadioDefault3">Ya</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 mx-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault4" checked>
                                                                    <label class="form-check-label" for="flexRadioDefault4">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <br>
                                                        <label for="listrik">Dibangun Oleh Pengembang</label>
                                                        <div class="row justify-content-start">
                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault5">
                                                                    <label class="form-check-label" for="flexRadioDefault5">Ya</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 mx-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="flexRadioDefault3" id="flexRadioDefault6" checked>
                                                                    <label class="form-check-label" for="flexRadioDefault6">Tidak</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input class="form-control mb-3" type="text" placeholder="Nama pengembang (Jika, Ya)" aria-label="luas tanah">
                                                        
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto hunian</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto kondisi air minum</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify7" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto kondisi dinding</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify2" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto kondisi atap</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify3" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto kondisi lantai</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify4" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto kondisi kamar mandi</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify5" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto kondisi MCK</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify6" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto pemilik beserta rumah</h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify8" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <label for="">Nama pemilik<sup>*</sup></label>
                                                        <input class="form-control mb-3" type="text">
                                                        
                                                        <label for="">No. KTP<sup>*</sup></label>
                                                        <input class="form-control mb-3" type="text">

                                                        <label for="">No. Telpon</label>
                                                        <input class="form-control mb-3" type="text">

                                                        <label for="">Email</label>
                                                        <input class="form-control mb-3" type="text">   

                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="">Jumlah keluarga<sup>*</sup></label>
                                                        <input class="form-control mb-3" type="text">

                                                        <label for="">No. KK<sup>*</sup></label>
                                                        <input class="form-control mb-3" type="text">

                                                        <label for="">Pendapatan keluarga<sup>*</sup></label>
                                                        <select class="form-select mb-3" >
                                                            <option selected>0-1 juta</option>
                                                            <option value="1">1-2,5 juta</option>
                                                            <option value="2">> 2,5 juta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <!-- end step 1 -->
                                            </div>
                                            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                                                <!-- isi step 2  -->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="Pengusul">Pengusul<sup>*</sup></label>
                                                        <select class="form-select mb-3" aria-label="Pengusul">
                                                            <option selected>DPRKPLH</option>
                                                            <option value="1">Dinsos</option>
                                                            <option value="2">Baznas</option>
                                                            <option value="3">Lainnya</option>
                                                        </select>

                                                        <label for="">Rencana tahun penanganan</label>
                                                        <select class="form-select mb-3">
                                                            <option selected>2020</option>
                                                            <option value="1">2021</option>
                                                            <option value="2">2022</option>
                                                            <option value="3">2023</option>
                                                            <option value="4">2024</option>
                                                        </select>
                                                        
                                                    </div>

                                                    <div class="col-md-6">

                                                        <label for="">Nominal</label>
                                                        <input class="form-control mb-3" type="text">
                                                        
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto hunian sesudah perbaikan<sup>*</sup></h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify9" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-6">
                                                        <h6 class="mb-0 text-uppercase">Foto MCK sesudah pebaikan<sup>*</sup></h6>
                                                        <br>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form>
                                                                    <input id="image-uploadify10" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end step 2 -->
                                            </div>
                                            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="Kecamatan">Kecamatan<sup>*</sup></label>
                                                    <select class="form-select mb-3" aria-label="Kecamatan">
                                                        <option selected>Kecamatan 1</option>
                                                        <option value="1">Kecamatan 2</option>
                                                        <option value="2">Kecamatan 3</option>
                                                        <option value="3">Kecamatan 4</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Desa</label>
                                                    <select class="form-select mb-3">
                                                        <option selected>Desa 1</option>
                                                        <option value="1">Desa 2</option>
                                                        <option value="2">Desa 3</option>
                                                        <option value="3">Desa 4</option>
                                                        <option value="4">Desa 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="">Alamat detail</label>
                                                    <input class="form-control mb-3" type="text">
                                                </div>
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
			$('#image-uploadify4').imageuploadify();
			$('#image-uploadify5').imageuploadify();
			$('#image-uploadify6').imageuploadify();
			$('#image-uploadify7').imageuploadify();
			$('#image-uploadify8').imageuploadify();
			$('#image-uploadify9').imageuploadify();
			$('#image-uploadify10').imageuploadify();
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
				theme: 'dots',
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
