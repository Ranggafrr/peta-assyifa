<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulRequest;
use App\Models\ModulsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master data', 'url' => null],
            ['name' => 'Master modul', 'url' => null],
        ];

        $search = $request->get('query');
        $query = ModulsModel::query();

        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('modul', 'like', '%' . $search . '%');
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.master_modul.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Master Modul',
            'page' => 'Master modul',
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
            ['name' => 'Master data', 'url' => null],
            ['name' => 'Master modul', 'url' => route('moduls.index')],
            ['name' => 'Tambah modul', 'url' => null],
        ];
        return view('dashboard.master_modul.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Master Modul',
            'page' => 'Tambah modul',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModulRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            ModulsModel::create($storeData);

            return redirect()->route('moduls.index')->with('success', 'Data modul berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('moduls.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Master data', 'url' => null],
            ['name' => 'Master modul', 'url' => route('moduls.index')],
            ['name' => 'Update modul', 'url' => null],
        ];

        $data = ModulsModel::where('id', $id)->first();
        return view('dashboard.master_modul.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Master Modul',
            'page' => 'Update modul',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModulRequest $request, string $id)
    {
        try {
            // Validasi data dari request
            $validatedData = $request->validated();

            // Gabungkan UUID dengan data lainnya
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            // Perbarui data pengguna
            ModulsModel::where('id', $id)->update($updateData);

            // Redirect dengan pesan sukses
            return redirect()->route('moduls.index')->with('success', 'Data modul berhasil diperbarui.');
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
            ModulsModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('moduls.index')->with('success', 'Data modul berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
