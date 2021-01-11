<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('', 'HomeController@index')->name('home');

        //surat masuk
        Route::resource('surat-masuk', 'SuratMasukController');


        //surat keluar
        Route::get('surat-keluar', 'SuratKeluarController@index')->name('surat-keluar.index');
        Route::post('surat-keluar', 'SuratKeluarController@store')->name('surat-keluar.store');
        Route::put('surat-keluar/{id}', 'SuratKeluarController@update')->name('surat-keluar.update');
        Route::delete('surat-keluar/{id}', 'SuratKeluarController@destroy')->name('surat-keluar.destroy');
        Route::get('surat-keluar/{id}/edit', 'SuratKeluarController@edit')->name('surat-keluar.edit');

        //agenda 
        Route::get('agenda/surat-masuk', 'AgendaController@suratMasukIndex')->name('agenda-suratmasuk.index');
        Route::get('agenda/surat-masuk/periode', 'AgendaController@getDatasurat')->name('agenda-suratmasuk.periode');
        Route::get('agenda/surat-keluar', 'AgendaController@suratKeluarIndex')->name('agenda-suratkeluar.index');
        Route::get('agenda/surat-keluar/periode', 'AgendaController@getDatasuratKeluar')->name('agenda-suratkeluar.periode');

        //referensi
        Route::get('referensi', 'ReferensiController@index')->name('referensi.index');
        Route::post('referensi', 'ReferensiController@store')->name('referensi.store');
        Route::get('referensi/{id}/edit', 'ReferensiController@edit')->name('referensi.edit');
        Route::put('referensi/{id}', 'ReferensiController@update')->name('referensi.update');
        Route::delete('referensi/{id}', 'ReferensiController@destroy')->name('referensi.destroy');

        //user
        Route::get('users', 'UserController@userIndex')->name('user.index');
        Route::post('users', 'UserController@userStore')->name('user.store');
        Route::get('users/{id}/edit', 'UserController@userEdit')->name('user.edit');
        Route::put('users/{id}/update', 'UserController@userUpdate')->name('user.update');
        Route::delete('users/{id}/delete', 'UserController@destroy')->name('user.destroy');

        //disposisi
        Route::get('disposisi/{id}', 'DisposisiController@index')->name('disposisi.index');
        Route::post('disposisi/{id}', 'DisposisiController@create')->name('disposisi.store');
        Route::get('disposisi/{id}/edit', 'DisposisiController@edit')->name('disposisi.edit');
        Route::put('disposisi/{id}/update/{surat}', 'DisposisiController@update')->name('disposisi.update');
        Route::delete('disposisi/{id}/delete', 'DisposisiController@destroy')->name('disposisi.destroy');

        //galeri file
        Route::get('galeri-file/surat-masuk/', 'GaleriFileController@galeriSuratMasuk')->name('galeri.masuk');
        Route::get('galeri-file/surat-masuk/periode', 'GaleriFileController@getDataFileMasuk')->name('galerimasuk.periode');
        Route::get('galeri-file/detail-surat-masuk/{id}', 'GaleriFileController@detailSuratMasuk')->name('detail.masuk');
        Route::get('galeri-file/surat-keluar/', 'GaleriFileController@galeriSuratKeluar')->name('galeri.keluar');
        Route::get('galeri-file/surat-keluar/periode', 'GaleriFileController@getDataFileKeluar')->name('galerikeluar.periode');
        Route::get('galeri-file/detail-surat-keluar/{id}', 'GaleriFileController@detailSuratKeluar')->name('detail.keluar');

        //cetak surat
        Route::get('cetak-disposisi/{id}', 'CetakSuratController@cetakDisposisi')->name('cetak.surat');

        //renstra
        Route::get('renstra', 'RenstraController@index')->name('renstra.index');
        Route::post('renstra', 'RenstraController@store')->name('renstra.store');
        Route::get('renstra/{id}/edit', 'RenstraController@edit')->name('renstra.edit');
        Route::put('renstra/{id}/update', 'RenstraController@update')->name('renstra.update');
        Route::delete('renstra/{id}/delete', 'RenstraController@delete')->name('renstra.destroy');

        //data penerbangan
        //pesawat
        Route::get('/data-penerbangan', 'DetailTransportasiController@penerbanganIndex')->name('penerbangan.index');
        Route::post('/data-penerbangan/pesawat', 'DetailTransportasiController@penerbanganStore')->name('pesawat.store');
        Route::get('/data-penerbangan/pesawat/{id}/edit', 'DetailTransportasiController@editPenerbangan')->name('pesawat.edit');
        Route::put('/data-penerbangan/pesawat/{id}/update', 'DetailTransportasiController@updatePenerbangan')->name('pesawat.update');
        Route::delete('/data-penerbangan/pesawat/{id}/delete', 'DetailTransportasiController@deletePenerbangan')->name('pesawat.delete');

        //penumpang
        Route::post('/data-penerbangan/penumpang-pesawat', 'DetailTransportasiController@penerbanganPenumpangStore')->name('penumpangpesawat.store');
        Route::get('/data-penerbangan/penumpang-pesawat/{id}/edit', 'DetailTransportasiController@editPenerbanganPenumpangEdit')->name('penumpangpesawat.edit');
        Route::put('/data-penerbangan/penumpang-pesawat/{id}/update', 'DetailTransportasiController@updatePenerbanganPenumpang')->name('penumpangpesawat.update');
        Route::delete('/data-penerbangan/penumpang-pesawat/{id}/delete', 'DetailTransportasiController@deletePenerbanganPenumpang')->name('penumpangpesawat.delete');


        //data pelabuhan
        Route::get('/data-pelabuhan', 'DetailTransportasiController@pelabuhanIndex')->name('pelabuhan.index');
        Route::post('/data-pelabuhan/kapal', 'DetailTransportasiController@pelabuhanStore')->name('pelabuhan.store');
        Route::get('/data-pelabuhan/kapal/{id}/edit', 'DetailTransportasiController@editPelabuhan')->name('pelabuhan.edit');
        Route::put('/data-pelabuhan/kapal/{id}/update', 'DetailTransportasiController@updatePelabuhan')->name('pelabuhan.update');
        Route::delete('/data-pelabuhan/kapal/{id}/delete', 'DetailTransportasiController@deletePelabuhan')->name('pelabuhan.delete');

        //penumpang
        Route::post('/data-pelabuhan/penumpang-kapal', 'DetailTransportasiController@pelabuhanPenumpangStore')->name('penumpangkapal.store');
        Route::get('/data-pelabuhan/penumpang-kapal/{id}/edit', 'DetailTransportasiController@editPelabuhanPenumpangEdit')->name('penumpangkapal.edit');
        Route::put('/data-pelabuhan/penumpang-kapal/{id}/update', 'DetailTransportasiController@updatePelabuhanPenumpang')->name('penumpangkapal.update');
        Route::delete('/data-pelabuhan/penumpang-kapal/{id}/delete', 'DetailTransportasiController@deletePelabuhanPenumpang')->name('penumpangkapal.delete');
    });
});
