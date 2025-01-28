<?php

namespace App\Http\Controllers;

use App\Exports\DataPekerjaanExport;
use App\Http\Requests\PekerjaanRequest;
use App\Models\PekerjaanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Pekerjaan', 'url' => null],
        ];

        $search = $request->get('query');
        $status_pekerjaan = $request->get('status_pekerjaan');
        $query = PekerjaanModel::query();

        if ($search) {
            $query->where('nama_pekerjaan', 'like', '%' . $search . '%')->orWhere('tingkat_pendidikan', 'like', '%' . $search . '%');
        }

        if ($status_pekerjaan && $status_pekerjaan != 'all') {
            $query->where('status_pekerjaan', $status_pekerjaan);
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_pekerjaan.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Pekerjaan',
            'page' => 'Data Pekerjaan',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'query' => $search,
            'status_pekerjaan' => $status_pekerjaan,
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
            ['name' => 'Data Pekerjaan', 'url' => route('data-pekerjaan.index')],
            ['name' => 'Tambah Data Pekerjaan', 'url' => null],
        ];
        return view('dashboard.data_pekerjaan.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Pekerjaan',
            'page' => 'Tambah Data Pekerjaan',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PekerjaanRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            PekerjaanModel::create($storeData);
            return redirect()->route('data-pekerjaan.index')->with('success', 'Data Pekerjaan berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-pkerjaan.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Pekerjaan', 'url' => route('data-pekerjaan.index')],
            ['name' => 'Edit Data Pekerjaan', 'url' => null],
        ];

        $data = PekerjaanModel::where('id', $id)->first();
        return view('dashboard.data_pekerjaan.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Pekerjaan',
            'page' => 'Edit Data Pekerjaan',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PekerjaanRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            PekerjaanModel::where('id', $id)->update($updateData);
            return redirect()->route('data-pekerjaan.index')->with('success', 'Data Pekerjaan berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-pekerjaan.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            PekerjaanModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-pekerjaan.index')->with('success', 'Data Pendidkan berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function saveToExcel(Request $request)
    {
        $nama_pekerjaan = $request->input('nama_pekerjaan'); // Jenis kelamin
        $query = $request->input('query'); // Pencarian
    
        return Excel::download(new DataPekerjaanExport($nama_pekerjaan, $query), 'laporan_data_Pekerjaan_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
}
