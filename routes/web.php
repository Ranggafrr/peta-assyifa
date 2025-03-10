<?php

use App\Http\Controllers\AccessMenuController;
use App\Http\Controllers\AccessSubMenuController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\DataKabupatenKotaController;
use App\Http\Controllers\DataKecamatanController;
use App\Http\Controllers\DataPropinsiController;
use App\Http\Controllers\DataRWController;
use App\Http\Controllers\GolonganDarahController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataRTController;
use App\Http\Controllers\DPTController;
<<<<<<< HEAD
=======
use App\Http\Controllers\fileController;
>>>>>>> a984a0b (fix import data)
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\UserController;
<<<<<<< HEAD
=======
use App\Models\DataKabupatenKotaModel;
>>>>>>> a984a0b (fix import data)
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login')->middleware('authCheck');
    Route::post('/', 'loginAuth')->name('loginAuth');
    Route::post('/logout', 'logout')->name('logout')->middleware('LogUser');
});

Route::get('/dashboard/sidebar', [MenuController::class, 'getSidebarData']);
Route::get('/dashboard', function () {
    $breadcrumbs = [
        ['name' => 'Dashboard', 'url' => null],
    ];
    return view('dashboard.dashboard', [
        'modul' => 'Dashboard',
        'menu' => 'Dashboard',
        'page' => 'Dashboard',
        'breadcrumbs' => $breadcrumbs,
    ]);
})->name('dashboard')->middleware('LogUser');

Route::resource('/dashboard/users', UserController::class)->middleware('LogUser');
Route::resource('/dashboard/role', RoleController::class)->middleware('LogUser');
Route::resource('/dashboard/moduls', ModulController::class)->middleware('LogUser');
Route::resource('/dashboard/menu', MenuController::class)->middleware('LogUser');
Route::resource('/dashboard/sub-menu', SubMenuController::class)->middleware('LogUser');

// utility
Route::resource('/dashboard/access-menu', AccessMenuController::class)->middleware('LogUser');
Route::resource('/dashboard/access-sub-menu', AccessSubMenuController::class)->middleware('LogUser');

<<<<<<< HEAD
//izzan
=======
>>>>>>> a984a0b (fix import data)

//data-dpt
Route::resource('/dashboard/data-dpt', DPTController::class)->middleware('LogUser');
Route::get('/data-dpt/export', [DPTController::class, 'saveToExcel'])->name('data-dpt.saveToExcel')->middleware('LogUser');
<<<<<<< HEAD

=======
Route::post('/data-dpt/import', [DPTController::class, 'import'])->name('data-dpt.import');
Route::get('/data-dpt/download', [DPTController::class, 'download'])->name('data-dpt.download')->middleware('LogUser');
>>>>>>> a984a0b (fix import data)
//master-skill
Route::resource('/dashboard/master-skill', SkillController::class)->middleware('LogUser');
Route::get('/master-skill/export', [SkillController::class, 'saveToExcel'])->name('master-skill.saveToExcel')->middleware('LogUser');

//master-golongan-darah
Route::resource('/dashboard/master-golongan-darah', GolonganDarahController::class)->middleware('LogUser');
Route::get('/master-golongan-darah/export', [GolonganDarahController::class, 'saveToExcel'])->name('master-golongan-darah.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-pendidikan', PendidikanController::class)->middleware('LogUser');
Route::get('/data-pendidikan/export', [PendidikanController::class, 'saveToExcel'])->name('data-pendidikan.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-pekerjaan', PekerjaanController::class)->middleware('LogUser');
Route::get('/data-pekerjaan/export', [PekerjaanController::class, 'saveToExcel'])->name('data-pekerjaan.saveToExcel')->middleware('LogUser');

//#################################


Route::resource('/dashboard/data-propinsi', DataPropinsiController::class)->middleware('LogUser');
Route::get('/data-propinsi/export', [DataPropinsiController::class, 'saveToExcel'])->name('data-propinsi.saveToExcel')->middleware('LogUser');
<<<<<<< HEAD

Route::resource('/dashboard/data-kabupaten-kota', DataKabupatenKotaController::class)->middleware('LogUser');
Route::get('/data-kabupaten-kota/export', [DataKabupatenKotaController::class, 'saveToExcel'])->name('data-kabupaten-kota.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-kecamatan', DataKecamatanController::class)->middleware('LogUser');
Route::get('/data-kecamatan/export', [DataKecamatanController::class, 'saveToExcel'])->name('data-kecamatan.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-desa', DataDesaController::class)->middleware('LogUser');
Route::get('/data-desa/export', [DataDesaController::class, 'saveToExcel'])->name('data-desa.saveToExcel')->middleware('LogUser');
=======
Route::get('/data-propinsi/download', [DataPropinsiController::class, 'download'])->name('data-propinsi.download')->middleware('LogUser');
Route::post('/data-propinsi/import', [DataPropinsiController::class, 'import'])->name('data-propinsi.import');

Route::resource('/dashboard/data-kabupaten', DataKabupatenKotaController::class)->middleware('LogUser');
Route::get('/data-kabupaten/export', [DataKabupatenKotaController::class, 'saveToExcel'])->name('data-kabupaten.saveToExcel')->middleware('LogUser');
Route::get('/data-kabupaten/download', [DataKabupatenKotaController::class, 'download'])->name('data-kabupaten.download')->middleware('LogUser');
Route::post('/data-kabupaten/import', [DataKabupatenKotaController::class, 'import'])->name('data-kabupaten.import');

Route::resource('/dashboard/data-kecamatan', DataKecamatanController::class)->middleware('LogUser');
Route::get('/data-kecamatan/export', [DataKecamatanController::class, 'saveToExcel'])->name('data-kecamatan.saveToExcel')->middleware('LogUser');
Route::get('/data-kecamatan/download', [DataKecamatanController::class, 'download'])->name('data-kecamatan.download')->middleware('LogUser');
Route::post('/data-kecamatan/import', [DataKecamatanController::class, 'import'])->name('data-kecamatan.import');

Route::resource('/dashboard/data-desa', DataDesaController::class)->middleware('LogUser');
Route::get('/data-desa/export', [DataDesaController::class, 'saveToExcel'])->name('data-desa.saveToExcel')->middleware('LogUser');
Route::get('/data-desa/download', [DataDesaController::class, 'download'])->name('data-desa.download')->middleware('LogUser');
Route::post('/data-desa/import', [DataDesaController::class, 'import'])->name('data-desa.import');
>>>>>>> a984a0b (fix import data)

Route::resource('/dashboard/data-rw', DataRWController::class)->middleware('LogUser');
Route::get('/data-rw/export', [DataRWController::class, 'saveToExcel'])->name('data-rw.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-rt', DataRTController::class)->middleware('LogUser');
Route::get('/data-rt/export', [DataRTController::class, 'saveToExcel'])->name('data-rt.saveToExcel')->middleware('LogUser');
