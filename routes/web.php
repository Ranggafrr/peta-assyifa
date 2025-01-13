<?php

use App\Http\Controllers\AccessMenuController;
use App\Http\Controllers\AccessSubMenuController;
use App\Http\Controllers\GolonganDarahController;
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

//#################################
