<?php

namespace App\Http\Controllers;

use App\Exports\DataPropinsiExport;
use App\Http\Requests\DataPropinsiRequest;
<<<<<<< HEAD
=======
use App\Imports\ProvinsiImport;
>>>>>>> a984a0b (fix import data)
use App\Models\DataPropinsiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DataPropinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Propinsi', 'url' => null],
        ];

        $search = $request->get('query');
        $akreditasi = $request->get('akreditasi');
        $query = DataPropinsiModel::query();

        if ($search) {
            $query->where('nama_propinsi', 'like', '%' . $search . '%');
        }

        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_propinsi.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Propinsi',
            'page' => 'Data Propinsi',
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
            ['name' => 'Data Propinsi', 'url' => route('data-propinsi.index')],
            ['name' => 'Tambah Data Propinsi', 'url' => null],
        ];
        return view('dashboard.data_propinsi.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Propinsi',
            'page' => 'Tambah Data Propinsi',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataPropinsiRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            DataPropinsiModel::create($storeData);
            return redirect()->route('data-propinsi.index')->with('success', 'Data Propinsi berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-propinsi.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Propinsi', 'url' => route('data-propinsi.index')],
            ['name' => 'Edit Data Propinsi', 'url' => null],
        ];

        $data = DataPropinsiModel::where('id', $id)->first();
        return view('dashboard.data_propinsi.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Propinsi',
            'page' => 'Edit Data Propinsi',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataPropinsiRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            DataPropinsiModel::where('id', $id)->update($updateData);
            return redirect()->route('data-propinsi.index')->with('success', 'Data Pendidikan berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-propinsi.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            DataPropinsiModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-propinsi.index')->with('success', 'Data Propinsi berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function saveToExcel(Request $request)
    {
        return Excel::download(new DataPropinsiExport(), 'laporan_data_propinsi_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
<<<<<<< HEAD
=======
    
    public function import(Request $request)
    {
        $request->validate([
            'data_excel' => 'required|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new ProvinsiImport, $request->file('data_excel'));

        return redirect()->route('data-propinsi.index')->with('success', 'Data provinsi berhasil diimport.');
    }
    public function download()
    {
        $filePath = storage_path("app/public/template-excel/template_data-provinsi.xlsx");
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($filePath);
    }
>>>>>>> a984a0b (fix import data)
}
