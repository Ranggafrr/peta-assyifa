<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Utility', 'url' => null],
            ['name' => 'Master role', 'url' => null],
        ];

        $search = $request->get('query');
        $query = RoleModel::query();

        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('role', 'like', '%' . $search . '%');
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.master_role.view-data', [
            'modul' => 'Utility',
            'menu' => 'Master Role',
            'page' => 'Master role',
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
            ['name' => 'Master role', 'url' => route('role.index')],
            ['name' => 'Tambah role', 'url' => null],
        ];
        return view('dashboard.master_role.view-add', [
            'modul' => 'Utility',
            'menu' => 'Master Role',
            'page' => 'Tambah role',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            RoleModel::create($storeData);

            return redirect()->route('role.index')->with('success', 'Data role berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('role.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Master role', 'url' => route('role.index')],
            ['name' => 'Update role', 'url' => null],
        ];

        $data = RoleModel::where('id', $id)->first();
        return view('dashboard.master_role.view-update', [
           'modul' => 'Utility',
            'menu' => 'Master Role',
            'page' => 'Update role',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id)
    {
        try {
            // Validasi data dari request
            $validatedData = $request->validated();

            // Gabungkan UUID dengan data lainnya
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            // Perbarui data pengguna
            RoleModel::where('id', $id)->update($updateData);

            // Redirect dengan pesan sukses
            return redirect()->route('role.index')->with('success', 'Data role berhasil diperbarui.');
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
            RoleModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('role.index')->with('success', 'Data role berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
