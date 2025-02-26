<?php

namespace App\Http\Controllers;

use App\Exports\DataKabupatenKotaExport;
use App\Http\Requests\DataKabupatenKotaRequest;
<<<<<<< HEAD
use App\Models\DataKabupatenKotaModel;
=======
use App\Imports\KabupatenImport;
use App\Models\DataKabupatenKotaModel;
use App\Models\DataPropinsiModel;
>>>>>>> a984a0b (fix import data)
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DataKabupatenKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
<<<<<<< HEAD
            ['name' => 'Data Kabupaten Kota', 'url' => null],
        ];

        $search = $request->get('query');
        $query = DatakabupatenKotaModel::query();

        if ($search) {
            $query->where('nama_kabupaten_kota', 'like', '%' . $search . '%');
        }

        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_kabupaten_kota.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Kabupaten Kota',
            'page' => 'Data Kabupaten Kota',
=======
            ['name' => 'Data Kabupaten', 'url' => null],
        ];

        $search = $request->get('query');
        $query = DataKabupatenKotaModel::query()
            ->leftJoin('master_propinsi as a', 'master_kabupaten_kota.kode_propinsi', '=', 'a.kode_propinsi')
            ->select('master_kabupaten_kota.*', 'a.nama_propinsi');

        if ($search) {
            $query->where('master_kabupaten_kota.nama_kabupaten_kota', 'like', '%' . $search . '%');
        }
        // Ambil hasil query dengan paginasi
        $data = $query->paginate(10);

        return view('dashboard.data_kabupaten.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Kabupaten',
            'page' => 'Data Kabupaten',
>>>>>>> a984a0b (fix import data)
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
<<<<<<< HEAD
            ['name' => 'Data Kabupaten Kota', 'url' => route('data-kabupaten-kota.index')],
            ['name' => 'Tambah Data Kabupaten', 'url' => null],
        ];
        return view('dashboard.data_kabupaten_kota.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Teritory',
            'page' => 'Tambah Data Kabupaten Kota',
            'breadcrumbs' => $breadcrumbs,
=======
            ['name' => 'Data Kabupaten', 'url' => route('data-kabupaten.index')],
            ['name' => 'Tambah Data Kabupaten', 'url' => null],
        ];
        return view('dashboard.data_kabupaten.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Teritory',
            'page' => 'Tambah Data Kabupaten',
            'breadcrumbs' => $breadcrumbs,
            'provenceList' => DataPropinsiModel::pluck('nama_propinsi', 'kode_propinsi')->toArray(),
>>>>>>> a984a0b (fix import data)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataKabupatenKotaRequest $request)
    {
        try {
            $validatedData = $request->validated();
<<<<<<< HEAD
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_kabupaten_kota, 'created_at' => Carbon::now()]);
            DataKabupatenKotaModel::create($storeData);
            return redirect()->route('data-kabupaten-kota.index')->with('success', 'Data Kabupaten berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-kabupaten-kota.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
=======
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            DataKabupatenKotaModel::create($storeData);
            return redirect()->route('data-kabupaten.index')->with('success', 'Data Kabupaten berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-kabupaten.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
>>>>>>> a984a0b (fix import data)
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
<<<<<<< HEAD
            ['name' => 'Data Kabupaten Kota', 'url' => route('data-kabupaten-kota.index')],
            ['name' => 'Edit Data Kabupaten Kota', 'url' => null],
        ];

        $data = DataKabupatenKotaModel::where('id', $id)->first();
        return view('dashboard.data_kabupaten_kota.view-update', [
=======
            ['name' => 'Data Kabupaten', 'url' => route('data-kabupaten.index')],
            ['name' => 'Edit Data Kabupaten', 'url' => null],
        ];

        $data = DataKabupatenKotaModel::where('id', $id)->first();
        return view('dashboard.data_kabupaten.view-update', [
>>>>>>> a984a0b (fix import data)
            'modul' => 'Master Data',
            'menu' => 'Data Kabupaten',
            'page' => 'Edit Data Kabupaten',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
<<<<<<< HEAD
=======
            'provenceList' => DataPropinsiModel::pluck('nama_propinsi', 'kode_propinsi')->toArray(),
>>>>>>> a984a0b (fix import data)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataKabupatenKotaRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            DataKabupatenKotaModel::where('id', $id)->update($updateData);
<<<<<<< HEAD
            return redirect()->route('data-kabupaten-kota.index')->with('success', 'Data Kabupaten berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-kabupaten-kota.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
=======
            return redirect()->route('data-kabupaten.index')->with('success', 'Data Kabupaten berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-kabupaten.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
>>>>>>> a984a0b (fix import data)
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            DataKabupatenKotaModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
<<<<<<< HEAD
            return redirect()->route('data-kabupaten-kota.index')->with('success', 'Data Kabupaten berhasil dihapus.');
=======
            return redirect()->route('data-kabupaten.index')->with('success', 'Data Kabupaten berhasil dihapus.');
>>>>>>> a984a0b (fix import data)
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function saveToExcel(Request $request)
    {
        return Excel::download(new DataKabupatenKotaExport(), 'laporan_data_kabupaten_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
<<<<<<< HEAD
=======
    public function import(Request $request)
    {
        $request->validate([
            'data_excel' => 'required|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new KabupatenImport, $request->file('data_excel'));

        return redirect()->route('data-kabupaten.index')->with('success', 'Data desa berhasil diimport.');
    }
    public function download()
    {
        $filePath = storage_path("app/public/template-excel/template_data-kabupaten.xlsx");
        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($filePath);
    }
>>>>>>> a984a0b (fix import data)
}
