<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubMenuRequest;
use App\Models\MenuModel;
use Illuminate\Http\Request;
use App\Models\SubMenuModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
<<<<<<< HEAD
            ['name' => 'Utility', 'url' => null],
=======
            ['name' => 'Master data', 'url' => null],
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            ['name' => 'Master sub menu', 'url' => null],
        ];

        $search = $request->get('query');
        $query = SubMenuModel::query()
            ->leftJoin('master_menu', 'master_sub_menu.kode_menu', '=', 'master_menu.kode_menu')
            ->select('master_sub_menu.*', 'master_menu.nama_menu');
        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('master_sub_menu.nama_submenu', 'like', '%' . $search . '%')->orWhere('master_menu.nama_menu', 'like', '%' . $search . '%');
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.master_submenu.view-data', [
<<<<<<< HEAD
            'modul' => 'Utility',
=======
            'modul' => 'Master Data',
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            'menu' => 'Master Sub Menu',
            'page' => 'Master sub menu',
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
<<<<<<< HEAD
            ['name' => 'Utility', 'url' => null],
=======
            ['name' => 'Master data', 'url' => null],
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            ['name' => 'Master sub menu', 'url' => route('sub-menu.index')],
            ['name' => 'Tambah sub menu', 'url' => null],
        ];
        return view('dashboard.master_submenu.view-add', [
<<<<<<< HEAD
            'modul' => 'Utility',
=======
            'modul' => 'Master Data',
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            'menu' => 'Master Sub Menu',
            'page' => 'Tambah sub menu',
            'breadcrumbs' => $breadcrumbs,
            'ListMenu' => MenuModel::where('sub_menu', 'Y')->pluck('nama_menu', 'kode_menu')->toArray(), //-> index 1 = key, index 2 = value 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubMenuRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $kode_submenu = $request->kode_menu . '.' . $request->no_urut;
            $storeData = array_merge($validatedData, ['kode_submenu' => $kode_submenu, 'created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            SubMenuModel::create($storeData);

            return redirect()->route('sub-menu.index')->with('success', 'Data sub menu berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('sub-menu.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
<<<<<<< HEAD
            ['name' => 'Utility', 'url' => null],
=======
            ['name' => 'Master data', 'url' => null],
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            ['name' => 'Master sub menu', 'url' => route('sub-menu.index')],
            ['name' => 'Update sub menu', 'url' => null],
        ];

        $data = SubMenuModel::where('id', $id)->first();
        return view('dashboard.master_submenu.view-update', [
<<<<<<< HEAD
            'modul' => 'Utility',
=======
            'modul' => 'Master Data',
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            'menu' => 'Master Sub Menu',
            'page' => 'Update sub menu',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'ListMenu' => MenuModel::where('sub_menu', 'Y')->pluck('nama_menu', 'kode_menu')->toArray(), //-> index 1 = key, index 2 = value 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubMenuRequest $request, string $id)
    {
        try {
            // Validasi data dari request
            $validatedData = $request->validated();
            $kode_submenu = $request->kode_menu . '.' . $request->no_urut;
            // Gabungkan UUID dengan data lainnya
            $updateData = array_merge($validatedData, ['kode_submenu' => $kode_submenu, 'updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            // Perbarui data pengguna
            SubMenuModel::where('id', $id)->update($updateData);

            // Redirect dengan pesan sukses
            return redirect()->route('sub-menu.index')->with('success', 'Data sub menu berhasil diperbarui.');
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
            SubMenuModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('sub-menu.index')->with('success', 'Data sub menu berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
