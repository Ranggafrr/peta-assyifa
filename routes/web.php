<?php

use App\Http\Controllers\AccessMenuController;
use App\Http\Controllers\AccessSubMenuController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\DataKabupatenKotaController;
use App\Http\Controllers\DataKecamatanController;
use App\Http\Controllers\DataPendidikanController;
use App\Http\Controllers\DataPropinsiController;
use App\Http\Controllers\DataRWController;
use App\Http\Controllers\GolonganDarahController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DPTController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\UserController;
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

//izzan

//data-dpt
Route::resource('/dashboard/data-dpt', DPTController::class)->middleware('LogUser');
Route::get('/data-dpt/export', [DPTController::class, 'saveToExcel'])->name('data-dpt.saveToExcel')->middleware('LogUser');

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

Route::resource('/dashboard/data-kabupaten-kota', DataKabupatenKotaController::class)->middleware('LogUser');
Route::get('/data-kabupaten-kota/export', [DataKabupatenKotaController::class, 'saveToExcel'])->name('data-pekerjaan.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-kecamatan', DataKecamatanController::class)->middleware('LogUser');
Route::get('/data-kecamatan/export', [DataKecamatanController::class, 'saveToExcel'])->name('data-pekerjaan.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-desa', DataDesaController::class)->middleware('LogUser');
Route::get('/data-desa/export', [DataDesaController::class, 'saveToExcel'])->name('data-pekerjaan.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-rw', DataRWController::class)->middleware('LogUser');
Route::get('/data-rw/export', [DataRWController::class, 'saveToExcel'])->name('data-pekerjaan.saveToExcel')->middleware('LogUser');

Route::resource('/dashboard/data-rt', DataRWController::class)->middleware('LogUser');
Route::get('/data-rt/export', [DataRWController::class, 'saveToExcel'])->name('data-pekerjaan.saveToExcel')->middleware('LogUser');
