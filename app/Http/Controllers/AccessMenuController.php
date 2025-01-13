<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessMenuRequest;
use App\Models\AccessMenu;
use App\Models\MenuModel;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AccessMenuController extends Controller
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
            ['name' => 'Akses menu', 'url' => null],
        ];

        $search = $request->get('query');
        $query = AccessMenu::query()
            ->leftJoin('master_role', 'master_role.id', '=', 'access_menu.role_id')
            ->leftJoin('master_menu', 'master_menu.kode_menu', '=', 'access_menu.kode_menu')
            ->select('access_menu.*', 'master_menu.nama_menu', 'master_role.role');
        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('access_menu.role_id', $search);
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.access_menu.view-data', [
            'modul' => 'Utility',
            'menu' => 'Akses Menu',
            'page' => 'Akses menu',
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
            ['name' => 'Akses menu', 'url' => route('access-menu.index')],
            ['name' => 'Tambah akses menu', 'url' => null],
        ];
        return view('dashboard.access_menu.view-add', [
            'modul' => 'Utility',
            'menu' => 'Akses Menu',
            'page' => 'Tambah akses menu',
            'breadcrumbs' => $breadcrumbs,
            'ListRole' => RoleModel::pluck('role', 'id')->toArray(), //-> index 1 = key, index 2 = value 
            'ListMenu' => MenuModel::pluck('nama_menu', 'kode_menu')->toArray(), //-> index 1 = key, index 2 = value 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AccessMenuRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            AccessMenu::create($storeData);

            return redirect()->route('access-menu.index')->with('success', 'Data akses menu berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('access-menu.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
        try {
            $status = $request->status == 'Aktif' ? 'Tidak Aktif' : 'Aktif';

            AccessMenu::where('id', $id)->update([
                'status' => $status,
                'updated_by' => Session::get('user')->nama_lengkap,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('access-menu.index')->with('success', 'Data akses berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('access-menu.index')->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
