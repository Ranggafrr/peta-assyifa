<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessSubMenuRequest;
use App\Models\AccessMenu;
use App\Models\AccessSubMenu;
use App\Models\MenuModel;
use App\Models\RoleModel;
use App\Models\SubMenuModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class AccessSubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Utility', 'url' => null],
            ['name' => 'Role Akses', 'url' => null],
            ['name' => 'Akses sub menu', 'url' => null],
        ];

        $search = $request->get('query');
        $query = AccessSubMenu::query()
            ->leftJoin('master_role', 'master_role.id', '=', 'access_submenu.role_id')
            ->leftJoin('master_sub_menu', 'master_sub_menu.kode_submenu', '=', 'access_submenu.kode_submenu')
            ->select('access_submenu.*', 'master_sub_menu.nama_submenu', 'master_role.role');
        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('access_submenu.role_id', $search);
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.access_sub_menu.view-data', [
            'modul' => 'Utility',
            'menu' => 'Akses Sub Menu',
            'page' => 'Akses sub menu',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'query' => $search,
            'ListRole' => RoleModel::where('status', 'Aktif')->get(),
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
            ['name' => 'Role Akses', 'url' => null],
            ['name' => 'Akses sub menu', 'url' => route('access-sub-menu.index')],
            ['name' => 'Tambah akses sub menu', 'url' => null],
        ];
        return view('dashboard.access_sub_menu.view-add', [
            'modul' => 'Utility',
            'menu' => 'Akses Sub Menu',
            'page' => 'Tambah akses sub menu',
            'breadcrumbs' => $breadcrumbs,
            'ListRole' => RoleModel::pluck('role', 'id')->toArray(), //-> index 1 = key, index 2 = value 
            'ListMenu' => SubMenuModel::pluck('nama_submenu', 'kode_submenu')->toArray(), //-> index 1 = key, index 2 = value 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccessSubMenuRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            AccessSubMenu::create($storeData);

            return redirect()->route('access-sub-menu.index')->with('success', 'Data akses sub menu berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('access-sub-menu.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
