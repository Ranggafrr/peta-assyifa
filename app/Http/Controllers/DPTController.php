<?php

namespace App\Http\Controllers;

use App\Exports\DataDPTExport;
use App\Http\Requests\DPTRequest;
use App\Models\DptModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class DPTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data DPT', 'url' => null],
        ];

        $search = $request->get('query');
        $gender = $request->get('gender');
        $query = DptModel::query();

        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('nik', 'like', '%' . $search . '%');
        }
        if ($gender && $gender != 'all') {
            $query->where('jenis_kelamin', $gender);
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_dpt.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data DPT',
            'page' => 'Data DPT',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'query' => $search,
            'gender' => $gender,
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
            ['name' => 'Data DPT', 'url' => route('data-dpt.index')],
            ['name' => 'Tambah Data DPT', 'url' => null],
        ];
        return view('dashboard.data_dpt.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data DPT',
            'page' => 'Tambah Data DPT',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DPTRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            DptModel::create($storeData);
            return redirect()->route('data-dpt.index')->with('success', 'Data DPT berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('data-dpt.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data DPT', 'url' => route('data-dpt.index')],
            ['name' => 'Edit Data DPT', 'url' => null],
        ];

        $data = DptModel::where('id_dpt', $id)->first();
        return view('dashboard.data_dpt.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data DPT',
            'page' => 'Edit Data DPT',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(DPTRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            DptModel::where('id_dpt', $id)->update($updateData);
            return redirect()->route('data-dpt.index')->with('success', 'Data DPT berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('data-dpt.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            DptModel::where('id_dpt', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('data-dpt.index')->with('success', 'Data DPT berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function saveToExcel(Request $request)
    {
        $gender = $request->input('gender'); // Jenis kelamin
        $query = $request->input('query'); // Pencarian

        return Excel::download(new DataDPTExport($gender, $query), 'laporan_data_dpt_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
    }
}
