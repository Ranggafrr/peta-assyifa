<?php

namespace App\Http\Controllers;

use App\Exports\DataDesaExport;
use App\Http\Requests\DataDesaRequest;
<<<<<<< HEAD
use App\Models\DataDesaModel;
=======
use App\Imports\DesaImport;
use App\Models\DataDesaModel;
use App\Models\DataKecamatanModel;
>>>>>>> a984a0b (fix import data)
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DataDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Desa', 'url' => null],
        ];

        $search = $request->get('query');
<<<<<<< HEAD
        $query = DataDesaModel::query();

        if ($search) {
            $query->where('nama_desa', 'like', '%' . $search . '%')->orWhere('kode_desa', 'like', '%' . $search . '%')->orWhere('kode_kecamatan', 'like', '%' . $search . '%');
        }

=======
        $query = DataDesaModel::query()
            ->leftJoin('master_kecamatan as a', 'master_desa.kode_kecamatan', '=', 'a.kode_kecamatan')
            ->select('master_desa.*', 'a.nama_kecamatan');

        if ($search) {
            $query->where('master_desa.nama_desa', 'like', '%' . $search . '%')->orWhere('master_desa.kode_desa', 'like', '%' . $search . '%')->orWhere('a.nama_kecamatan', 'like', '%' . $search . '%');
        }
>>>>>>> a984a0b (fix import data)
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_desa.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Desa',
            'page' => 'Data Desa',
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
            ['name' => 'Data Desa', 'url' => route('data-desa.index')],
            ['name' => 'Tambah Data Desa', 'url' => null],
        ];
        return view('dashboard.data_desa.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Teritory',
            'page' => 'Tambah Data Desa',
            'breadcrumbs' => $breadcrumbs,
<<<<<<< HEAD
=======
            'districtList' => DataKecamatanModel::pluck('nama_kecamatan', 'kode_kecamatan')->toArray(),
>>>>>>> a984a0b (fix import data)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataDesaRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            DataDesaModel::create($storeData);
            return redirect()->route('data-desa.index')->with('success', 'Data Desa berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-desa.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Desa', 'url' => route('data-desa.index')],
            ['name' => 'Edit Data Desa', 'url' => null],
        ];

        $data = DataDesaModel::where('id', $id)->first();
        return view('dashboard.data_desa.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Desa',
            'page' => 'Edit Data Desa',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
<<<<<<< HEAD
=======
            'districtList' => DataKecamatanModel::pluck('nama_kecamatan', 'kode_kecamatan')->toArray(),
>>>>>>> a984a0b (fix import data)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataDesaRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            DataDesaModel::where('id', $id)->update($updateData);
            return redirect()->route('data-desa.index')->with('success', 'Data Desa berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-desa.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            DataDesaModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-desa.index')->with('success', 'Data Desa berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
    public function saveToExcel(Request $request)
    {
        return Excel::download(new DataDesaExport(), 'laporan_data_desa_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
<<<<<<< HEAD
=======
    public function import(Request $request)
    {
        $request->validate([
            'data_excel' => 'required|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new DesaImport, $request->file('data_excel'));

        return redirect()->route('data-desa.index')->with('success', 'Data desa berhasil diimport.');
    }
    public function download()
    {
        $filePath = storage_path("app/public/template-excel/template_data-desa.xlsx");
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($filePath);
    }
>>>>>>> a984a0b (fix import data)
}
