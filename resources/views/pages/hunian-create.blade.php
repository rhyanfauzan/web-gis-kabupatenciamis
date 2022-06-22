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
                        <div class="breadcrumb-title pe-3">Hunian</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-buildings"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah data</li>
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
                                        
                                            <label for="luastanah">Luas tanah (m<sup>2</sup>)<sup>*</sup></label>
                                            <input class="form-control mb-3" type="text" placeholder="Luas tanah" aria-label="luas tanah">
                                            
                                            <label for="luastanah">Luas bangunan (m<sup>2</sup>)<sup>*</sup></label>
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
                                            <label for="listrik">Memiliki Septic Tank</label>
                                            <div class="row justify-content-start">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault7">
                                                        <label class="form-check-label" for="flexRadioDefault7">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-2 mx-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault4" id="flexRadioDefault8" checked>
                                                        <label class="form-check-label" for="flexRadioDefault8">Tidak</label>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
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
