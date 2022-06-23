<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::name('backend.')->group(function () {
        Route::namespace('App\Http\Controllers\Backend')->group(function () {

            Route::get('/home', "HomeController@index")->name('home.index');
            Route::get('/logout', "HomeController@logout")->name('home.logout');

            Route::prefix('pengelolaan-user')->group(function () {
                Route::name('pengelolaanUser.')->group(function () {
                    Route::get('/', "PengelolaanUserController@index")->name('index');
                    Route::get('/add', "PengelolaanUserController@add")->name('add');
                    Route::get('/edit/{id}', "PengelolaanUserController@edit")->name('edit');
                    Route::get('/get-data', "PengelolaanUserController@getData")->name('getData');
                    Route::post('/insert', "PengelolaanUserController@insert")->name('insert');
                    Route::post('/update/{id}', "PengelolaanUserController@update")->name('update');
                    Route::post('/delete/{id}', "PengelolaanUserController@delete")->name('delete');

                });
            });

            Route::prefix('rawan-bencana')->group(function () {
                Route::name('rawanBencana.')->group(function () {
                    Route::get('/', "AreaRawanBencanaController@index")->name('index');
                    Route::get('/add', "AreaRawanBencanaController@add")->name('add');
                    Route::post('/insert', "AreaRawanBencanaController@insert")->name('insert');
                    Route::get('/get-data', "AreaRawanBencanaController@getData")->name('getData');
                    Route::get('/geojson', "AreaRawanBencanaController@geojson")->name('geojson');
                    Route::post('/delete/{id}', "AreaRawanBencanaController@delete")->name('delete');
                    Route::get('/edit/{id}', "AreaRawanBencanaController@edit")->name('edit');
                    Route::post('/update', "AreaRawanBencanaController@update")->name('update');
                });
            });

            Route::prefix('backlog')->group(function () {
                Route::name('backlog.')->group(function () {
                    Route::get('/', "BacklogController@index")->name('index');
                    Route::get('/get-data', "BacklogController@getData")->name('getData');
                    Route::post('/delete/{id}', "BacklogController@delete")->name('delete');
                    Route::get('/add', "BacklogController@add")->name('add');
                    Route::post('/insert', "BacklogController@insert")->name('insert');
                    Route::get('/edit/{id}', "BacklogController@edit")->name('edit');
                    Route::post('/update', "BacklogController@update")->name('update');
                });
            });

            Route::prefix('kawasankumuh')->group(function () {
                Route::name('kawasankumuh.')->group(function () {
                    Route::get('/', "KawasanKumuhController@index")->name('index');
                    Route::get('/get-data', "KawasanKumuhController@getData")->name('getData');
                    Route::get('/add', "KawasanKumuhController@add")->name('add');
                    Route::post('/insert', "KawasanKumuhController@insert")->name('insert');
                    Route::get('/geojson-point', "KawasanKumuhController@geojson_point")->name('geojsonPoint');
                    Route::get('/geojson', "KawasanKumuhController@geojson")->name('geojson');
                    Route::post('/delete/{id}', "KawasanKumuhController@delete")->name('delete');
                    Route::get('/edit/{id}', "KawasanKumuhController@edit")->name('edit');
                    Route::post('/update', "KawasanKumuhController@update")->name('update');
                });
            });

            Route::prefix('usulan')->group(function () {
                Route::name('usulan.')->group(function () {
                    Route::get('/', "UsulanController@index")->name('index');
                    Route::get('/add', "UsulanController@add")->name('add');
                    Route::post('/insert', "UsulanController@insert")->name('insert');
                    Route::get('/export_excel', 'UsulanController@export_excel')->name('export_excel');
                    Route::get('/get-data', "UsulanController@getData")->name('getData');
                    Route::get('/edit/{id}', "UsulanController@edit")->name('edit');
                    Route::post('/delete/{id}', "UsulanController@delete")->name('delete');
                    Route::get('/geojson', "UsulanController@geojson")->name('geojson');
                    Route::post('/', "UsulanController@import_excel")->name('import_excel');
                });
            });

            Route::prefix('perekaman')->group(function () {
                Route::name('perekaman.')->group(function () {
                    Route::get('/', "PerekamanController@index")->name('index');
                    Route::get('/add', "PerekamanController@add")->name('add');
                    Route::post('/insert', "PerekamanController@insertFinal")->name('insert');
                    Route::get('/get-data', "PerekamanController@getData")->name('getData');
                    Route::get('/edit/{id}', "PerekamanController@edit")->name('edit');
                    Route::post('/delete/{id}', "PerekamanController@delete")->name('delete');
                    Route::get('/geojson', "PerekamanController@geojson")->name('geojson');
                });
            });

            Route::prefix('perumahan')->group(function () {
                Route::name('perumahan.')->group(function () {
                    Route::get('/', "PerumahanController@index")->name('index');
                    Route::get('/add', "PerumahanController@add")->name('add');
                    Route::get('/edit/{id}', "PerumahanController@edit")->name('edit');
                    Route::get('/get-data', "PerumahanController@getData")->name('getData');
                    Route::get('/geojson', "PerumahanController@geojson")->name('geojson');
                    Route::post('/insert', "PerumahanController@insert")->name('insert');
                    Route::post('/update/{id}', "PerumahanController@update")->name('update');
                    Route::post('/delete/{id}', "PerumahanController@delete")->name('delete');
                });
            });

            Route::prefix('hasil-pelaksanaan')->group(function () {
                Route::name('hasilPelaksanaan.')->group(function () {
                    Route::get('/', "HasilPelaksanaanController@index")->name('index');
                    // Route::get('/add', "HasilPelaksanaanController@add")->name('add');
                    // Route::post('/insert', "HasilPelaksanaanController@insert")->name('insert');
                    Route::get('/get-data', "HasilPelaksanaanController@getData")->name('getData');
                    // Route::get('/edit/{id}', "HasilPelaksanaanController@edit")->name('edit');
                    // Route::post('/delete/{id}', "HasilPelaksanaanController@delete")->name('delete');
                    Route::get('/geojson', "HasilPelaksanaanController@geojson")->name('geojson');
                });
            });

            Route::prefix('verifikasiUsulan')->group(function () {
                Route::name('verifikasiUsulan.')->group(function () {
                    Route::get('/', "VerifikasiUsulanController@index")->name('index');
                    Route::post("/verify", "VerifikasiUsulanController@verify")->name('verify');
                    Route::get("/sumberDanabantuan", "VerifikasiUsulanController@sumberDanaBantuan")->name('sumberDanaBantuan');
                    Route::get('/get-data', "VerifikasiUsulanController@getData")->name('getData');
                    Route::get('/geojson', "VerifikasiUsulanController@geojson")->name('geojson');
                    Route::get('/detail/{id}', "VerifikasiUsulanController@detail")->name('detail');
                    
                });
            });

            Route::prefix('kecamatan')->group(function () {
                Route::name('kecamatan.')->group(function () {
                    Route::get('/', "KecamatanController@index")->name('index');
                    Route::get('/geojson', "KecamatanController@geojson")->name('geojson');
                });
            });

            Route::prefix('desa')->group(function () {
                Route::name('desa.')->group(function () {
                    Route::get('/', "DesaController@index")->name('index');
                    Route::get('/all/{kecamatan_id}', "DesaController@all")->name('all');
                    Route::get('/geojson', "DesaController@geojson")->name('geojson');
                });
            });

            Route::prefix('hunian')->group(function () {
                Route::name('hunian.')->group(function () {
                    Route::get('/', "HunianController@index")->name('index');
                    Route::get('/add', "HunianController@add")->name('add');
                    Route::get('/edit/{id}', "HunianController@edit")->name('edit');
                    Route::get('/get-data', "HunianController@getData")->name('getData');
                    Route::get('/geojson', "HunianController@geojson")->name('geojson');
                    Route::get('/export_excel', 'HunianController@export_excel')->name('export_excel');
                    Route::post('/insert', "HunianController@insert")->name('insert');
                    Route::post('/insert-final', "HunianController@insertFinal")->name('insertFinal');
                    Route::post('/update/{id}', "HunianController@update")->name('update');
                    Route::post('/delete/{id}', "HunianController@delete")->name('delete');
                    Route::post('/cek-kk', "HunianController@cekKK")->name('cekKK');
                    Route::post('/', "HunianController@import_excel")->name('import_excel');
                });
            });

            Route::prefix('upload')->group(function () {
                Route::name('upload.')->group(function () {
                    Route::post('/', "UploadController@doUpload")->name('do');
                });
            });

            Route::prefix('prasarana-sarana-umum')->group(function () {
                Route::name('prasaranaSaranaUmum.')->group(function () {
                    Route::get('/', "PrasaranaSaranaUmumController@index")->name('index');
                    Route::get('/add', "PrasaranaSaranaUmumController@add")->name('add');
                    Route::get('/edit/{id}', "PrasaranaSaranaUmumController@edit")->name('edit');
                    Route::get('/detail/{id}', "PrasaranaSaranaUmumController@detail")->name('detail');
                    Route::get('/get-data', "PrasaranaSaranaUmumController@getData")->name('getData');
                    Route::get('/geojson', "PrasaranaSaranaUmumController@geojson")->name('geojson');
                    Route::post('/insert', "PrasaranaSaranaUmumController@insert")->name('insert');
                    Route::post('/update/{id}', "PrasaranaSaranaUmumController@update")->name('update');
                    Route::post('/delete/{id}', "PrasaranaSaranaUmumController@delete")->name('delete');
                });
            });

            Route::prefix('foto-prasarana-sarana-umum')->group(function () {
                Route::name('fotoPrasaranaSaranaUmum.')->group(function () {
                    Route::get('/get-data', "FotoPrasaranaSaranaUmumController@getData")->name('getData');
                    Route::post('/insert', "FotoPrasaranaSaranaUmumController@insert")->name('insert');
                    Route::post('/update/{id}', "FotoPrasaranaSaranaUmumController@update")->name('update');
                    Route::post('/delete/{id}', "FotoPrasaranaSaranaUmumController@delete")->name('delete');
                });
            });

            Route::prefix('penerima-bantuan')->group(function () {
                Route::name('penerimaBantuan.')->group(function () {
                    Route::get('/', "PenerimaBantuanController@index")->name('index');
                    Route::get('/edit/{id}', "PenerimaBantuanController@edit")->name('edit');
                    Route::get('/get-data', "PenerimaBantuanController@getData")->name('getData');
                    Route::get('/foto/{id}', "PenerimaBantuanController@tambahFoto")->name('foto');
                    Route::post('/update-foto/{id}', "PenerimaBantuanController@updateFoto")->name('updateFoto');
                    Route::post('/update/{id}', "PenerimaBantuanController@update")->name('update');
                });
            });
        });
    });
});
