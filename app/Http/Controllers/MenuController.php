<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\MenuModel;
use App\Models\ModulsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Utility', 'url' => null],
            ['name' => 'Master menu', 'url' => null],
        ];

        $search = $request->get('query');
        $query = MenuModel::query();

        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('kode_menu', 'like', '%' . $search . '%')->orWhere('nama_menu', 'like', '%' . $search . '%');
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.master_menu.view-data', [
            'modul' => 'Utility',
            'menu' => 'Master Menu',
            'page' => 'Master menu',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'query' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Utility', 'url' => null],
            ['name' => 'Master menu', 'url' => route('menu.index')],
            ['name' => 'Tambah menu', 'url' => null],
        ];
        return view('dashboard.master_menu.view-add', [
            'modul' => 'Utility',
            'menu' => 'Master Menu',
            'page' => 'Tambah menu',
            'breadcrumbs' => $breadcrumbs,
            'ListModuls' => ModulsModel::pluck('modul', 'modul')->toArray(), //-> index 1 = value, index 2 = key 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['route' => $request->route, 'created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            MenuModel::create($storeData);

            return redirect()->route('menu.index')->with('success', 'Data menu berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('menu.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Utility', 'url' => null],
            ['name' => 'Master menu', 'url' => route('menu.index')],
            ['name' => 'Update menu', 'url' => null],
        ];

        $data = MenuModel::where('id', $id)->first();
        return view('dashboard.master_menu.view-update', [
            'modul' => 'Utility',
            'menu' => 'Master Menu',
            'page' => 'Update menu',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'ListModuls' => ModulsModel::pluck('modul', 'modul')->toArray(), //-> index 1 = value, index 2 = key 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        try {
            // Validasi data dari request
            $validatedData = $request->validated();

            // Gabungkan UUID dengan data lainnya
            $updateData = array_merge($validatedData, ['route' => $request->route, 'updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            // Perbarui data pengguna
            MenuModel::where('id', $id)->update($updateData);

            // Redirect dengan pesan sukses
            return redirect()->route('menu.index')->with('success', 'Data menu berhasil diperbarui.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            MenuModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('menu.index')->with('success', 'Data menu berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
    public function getSidebarData()
    {
        // Ambil data modul beserta menu dan submenunya
        $modules = ModulsModel::with('menus.submenus')->get();

        return view('layouts.sidebar', compact('modules'));
    }
}
