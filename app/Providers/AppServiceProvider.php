<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ModulsModel;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share data modul, menu, dan submenu ke semua view yang membutuhkan sidebar
        View::composer('layouts.sidebar', function ($view) {
            $roleId = Session::get('user')->role;
            $modules = ModulsModel::where('status', 'Aktif')->orderBy('no_urut', 'asc')
                ->with([
                    'menus' => function ($query) use ($roleId) {
                        $query->whereHas('accessMenus', function ($q) use ($roleId) {
                            $q->where('role_id', $roleId);
                        })->orderBy('kode_menu', 'asc');
                    },
                    'menus.subMenus' => function ($query) use ($roleId) {
                        $query->whereHas('accessSubMenus', function ($q) use ($roleId) {
                            $q->where('role_id', $roleId);
                        })->orderBy('no_urut', 'asc');
                    }
                ])
                ->get();
            $view->with('modules', $modules);
        });
    }
}
