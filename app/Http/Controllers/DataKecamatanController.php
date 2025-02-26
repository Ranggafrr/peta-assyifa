<?php

namespace App\Http\Controllers;

use App\Exports\DataKecamatanExport;
use App\Http\Requests\DataKecamatanRequest;
<<<<<<< HEAD
=======
use App\Imports\KecamatanImport;
use App\Models\DataKabupatenKotaModel;
>>>>>>> a984a0b (fix import data)
use App\Models\DataKecamatanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DataKecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Kecamatan', 'url' => null],
        ];

        $search = $request->get('query');
<<<<<<< HEAD
        $query = DataKecamatanModel::query();

        if ($search) {
            $query->where('nama_kecamatan', 'like', '%' . $search . '%');
        }

=======
        $query = DataKecamatanModel::query()
            ->leftJoin('master_kabupaten_kota as a', 'master_kecamatan.kode_kabupaten_kota', '=', 'a.kode_kabupaten_kota')
            ->select('master_kecamatan.*', 'a.nama_kabupaten_kota');

        if ($search) {
            $query->where('master_kecamatan.nama_kabupaten_kota', 'like', '%' . $search . '%');
        }
>>>>>>> a984a0b (fix import data)
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_kecamatan.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Kecamatan',
            'page' => 'Data Kecamatan',
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
            ['name' => 'Data Kecamatan', 'url' => route('data-kecamatan.index')],
            ['name' => 'Tambah Data Kecamatan', 'url' => null],
        ];
        return view('dashboard.data_kecamatan.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Teritory',
            'page' => 'Tambah Data Kecamatan',
            'breadcrumbs' => $breadcrumbs,
<<<<<<< HEAD
=======
            'districtList' => DataKabupatenKotaModel::pluck('nama_kabupaten_kota', 'kode_kabupaten_kota')->toArray(),
>>>>>>> a984a0b (fix import data)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataKecamatanRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            DataKecamatanModel::create($storeData);
            return redirect()->route('data-kecamatan.index')->with('success', 'Data Kecamatan berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-kecamatan.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Kecamatan', 'url' => route('data-kecamatan.index')],
            ['name' => 'Edit Kecamatan', 'url' => null],
        ];

        $data = DataKecamatanModel::where('id', $id)->first();
        return view('dashboard.data_kecamatan.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Kecamatan',
            'page' => 'Edit Data Kecamatan',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataKecamatanRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            DataKecamatanModel::where('id', $id)->update($updateData);
            return redirect()->route('data-kecamatan.index')->with('success', 'Data Kecamatan berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-kecamatan.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            DataKecamatanModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-kecamatan.index')->with('success', 'Data Kecamatan berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
    public function saveToExcel(Request $request)
    {
        return Excel::download(new DataKecamatanExport(), 'laporan_data_kecamatan_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
<<<<<<< HEAD
=======
    public function import(Request $request)
    {
        $request->validate([
            'data_excel' => 'required|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new KecamatanImport, $request->file('data_excel'));

        return redirect()->route('data-kecamatan.index')->with('success', 'Data kecamatan berhasil diimport.');
    }
    public function download()
    {
        $filePath = storage_path("app/public/template-excel/template_data-kecamatan.xlsx");
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($filePath);
    }
>>>>>>> a984a0b (fix import data)
}
