<?php

namespace App\Http\Controllers;

use App\Exports\GolonganDarahExport;
use App\Models\GolonganDarahModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GolonganDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Golongan Darah', 'url' => null],
            ['name' => 'Master Golongan Darah', 'url' => null],
        ];

        $search = $request->get('query');
        $query = GolonganDarahModel::query();

        if ($search) {
            $query->where('golongan_darah', 'like', '%' . $search . '%');
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.master_golongan_darah.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Master Golongan Darah',
            'page' => 'Master Golongan Darah',
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
            ['name' => 'Master Golongan Darah', 'url' => route('master-golongan-darah.index')],
            ['name' => 'Tambah Data Golongan Darah', 'url' => null],
        ];
        return view('dashboard.master_golongan_darah.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Master Golongan Darah',
            'page' => 'Tambah Data Golongan Darah',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'golongan_darah' => 'required|string'
        ]);

        GolonganDarahModel::create($validatedData);

        return redirect()->route('master-golongan-darah.index')
            ->with('success', 'Data golongan darah berhasil ditambahkan');
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
            ['name' => 'Master Golongan Darah', 'url' => route('master-golongan-darah.index')],
            ['name' => 'Edit Data Golongan Darah', 'url' => null],
        ];

        $data = GolonganDarahModel::find($id);

        return view('dashboard.master_golongan_darah.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Master Golongan Darah',
            'page' => 'Edit Data Golongan Darah',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'golongan_darah' => 'required|string'
        ]);

        $data = GolonganDarahModel::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $data->update([
            'golongan_darah' => $request->golongan_darah,
            'remark' => $request->remark,
            'update_by' => $request->update_by,
        ]);
        return redirect()->route('master-golongan-darah.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            GolonganDarahModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('master-skill.index')->with('success', 'Data Golongan Darah berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function saveToExcel()
    {
        return Excel::download(new GolonganDarahExport, 'golongan_darah.xlsx');
    }
}
