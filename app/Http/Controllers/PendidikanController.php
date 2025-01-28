<?php

namespace App\Http\Controllers;

use App\Exports\DataPendidikanExport;
use App\Http\Requests\PendidikanRequest;
use App\Models\PendidikanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Pendidikan', 'url' => null],
        ];

        $search = $request->get('query');
        $akreditasi = $request->get('akreditasi');
        $query = PendidikanModel::query();

        if ($search) {
            $query->where('nama_pendidikan', 'like', '%' . $search . '%')->orWhere('tingkat_pendidikan', 'like', '%' . $search . '%');
        }

        if ($akreditasi && $akreditasi != 'all') {
            $query->where('akreditasi', $akreditasi);
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_pendidikan.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Pendidikan',
            'page' => 'Data Pendidikan',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'query' => $search,
            'akreditasi' => $akreditasi,
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
            ['name' => 'Data Pendidikan', 'url' => route('data-pendidikan.index')],
            ['name' => 'Tambah Data Pendidikan', 'url' => null],
        ];
        return view('dashboard.data_pendidikan.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Pendidikan',
            'page' => 'Tambah Data Pendidikan',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PendidikanRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            PendidikanModel::create($storeData);
            return redirect()->route('data-pendidikan.index')->with('success', 'Data Pendidikan berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-pendidikan.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Pendidikan', 'url' => route('data-pendidikan.index')],
            ['name' => 'Edit Data Pendidikan', 'url' => null],
        ];

        $data = PendidikanModel::where('id', $id)->first();
        return view('dashboard.data_pendidikan.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Pendidikan',
            'page' => 'Edit Data Pendidikan',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PendidikanRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            PendidikanModel::where('id', $id)->update($updateData);
            return redirect()->route('data-pendidikan.index')->with('success', 'Data Pendidikan berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-pendidikan.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            PendidikanModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-pendidikan.index')->with('success', 'Data Pendidkan berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function saveToExcel(Request $request)
    {
        $nama_pendidikan = $request->input('nama_pendidikan'); // Jenis kelamin
        $query = $request->input('query'); // Pencarian
    
        return Excel::download(new DataPendidikanExport($nama_pendidikan, $query), 'laporan_data_pendidikan_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
}