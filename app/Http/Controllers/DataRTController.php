<?php

namespace App\Http\Controllers;

use App\Exports\DataRtExport;
use App\Http\Requests\DataRtRequest;
use App\Models\DataRtModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DataRTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Rt', 'url' => null],
        ];

        $search = $request->get('query');
        $query = DataRtModel::query();

        if ($search) {
            $query->where('nama_rt', 'like', '%' . $search . '%');
        }

        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_rt.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Rt',
            'page' => 'Data Rt',
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
            ['name' => 'Data Rt', 'url' => route('data-rt.index')],
            ['name' => 'Tambah Data Rt', 'url' => null],
        ];
        return view('dashboard.data_rt.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Teritory',
            'page' => 'Tambah Data Rt',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DataRtRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_rt, 'created_at' => Carbon::now()]);
            DataRtModel::create($storeData);
            return redirect()->route('data-rt.index')->with('success', 'Data Rt berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-rt.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Rt', 'url' => route('data-rt.index')],
            ['name' => 'Edit Data Rt', 'url' => null],
        ];

        $data = DataRtModel::where('id', $id)->first();
        return view('dashboard.data_rt.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Rt',
            'page' => 'Edit Data Rt',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DataRtRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            DataRtModel::where('id', $id)->update($updateData);
            return redirect()->route('data-rt.index')->with('success', 'Data Rt berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-rt.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            DataRtModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-rt.index')->with('success', 'Data Rt berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
    public function saveToExcel(Request $request)
    {
        return Excel::download(new DataRtExport(), 'laporan_data_Rt_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
}
