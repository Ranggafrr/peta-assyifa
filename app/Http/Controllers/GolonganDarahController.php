<?php

namespace App\Http\Controllers;

use App\Exports\GolonganDarahExport;
use App\Http\Requests\GolonganDarahRequest;
use App\Models\GolonganDarahModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class GolonganDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Golongan Darah', 'url' => null],
        ];

        // Ambil nilai golongan darah dari request
        $golongan_darah = $request->get('golongan_darah');
        $query = GolonganDarahModel::query();

        // Jika golongan darah dipilih, filter query berdasarkan nilai tersebut
        if ($golongan_darah && in_array($golongan_darah, ['A', 'B', 'AB', 'O', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])) {
            $query->where('golongan_darah', $golongan_darah);
        }

        // Ambil hasil query
        $data = $query->paginate(10);

        return view('dashboard.master_golongan_darah.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data Golongan Darah',
            'page' => 'Data Golongan Darah',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'golongan_darah' => $golongan_darah,
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
            ['name' => 'Data Golongan Darah', 'url' => route('master-golongan-darah.index')],
            ['name' => 'Tambah Data Golongan Darah', 'url' => null],
        ];
        return view('dashboard.master_golongan_darah.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Golongan Darah',
            'page' => 'Tambah Data Golongan Darah',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GolonganDarahRequest $request)
    {

        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            GolonganDarahModel::create($storeData);
            return redirect()->route('master-golongan-darah.index')->with('success', 'Data Golongan Darah berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('master-golongan-darah.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Golongan Darah', 'url' => route('master-golongan-darah.index')],
            ['name' => 'Edit Data Golongan Darah', 'url' => null],
        ];

        $data = GolonganDarahModel::find($id);

        return view('dashboard.master_golongan_darah.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Golongan Darah',
            'page' => 'Edit Data Golongan Darah',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GolonganDarahRequest $request, string $id)
    {
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            GolonganDarahModel::where('id', $id)->update($updateData);
            return redirect()->route('master-golongann-darah.index')->with('success', 'Data Golongan Darah berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('master-golongan-darah.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
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
            return redirect()->route('master-golongan-darah.index')->with('success', 'Data Golongan Darah berhasil dihapus.');
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
