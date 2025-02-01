<?php

namespace App\Http\Controllers;

use App\Exports\DataRwExport;
use App\Http\Requests\DataRwRequest;
use App\Models\DataRwModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DataRWController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Rw', 'url' => null],
        ];

        $search = $request->get('query');
        $query = DataRwModel::query();

        if ($search) {
            $query->where('nama_rw', 'like', '%' . $search . '%');
        }

        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_rw.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Rw',
            'page' => 'Data Rw',
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
            ['name' => 'Data Rw', 'url' => route('data-rw.index')],
            ['name' => 'Tambah Data Rw', 'url' => null],
        ];
        return view('dashboard.data_rw.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Teritory',
            'page' => 'Tambah Rw',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataRwRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            DataRwModel::create($storeData);
            return redirect()->route('data-rw.index')->with('success', 'Data Rw berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-rw.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Rw', 'url' => route('data-rw.index')],
            ['name' => 'Edit Data Rw', 'url' => null],
        ];

        $data = DataRwModel::where('id', $id)->first();
        return view('dashboard.data_rw.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Rw',
            'page' => 'Edit Data Rw',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataRwRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            DataRwModel::where('id', $id)->update($updateData);
            return redirect()->route('data-rw.index')->with('success', 'Data Rw berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-rw.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            DataRwModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-rw.index')->with('success', 'Data Rw berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
    public function saveToExcel(Request $request)
    {
        return Excel::download(new DataRwExport(), 'laporan_data_rw_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
}
