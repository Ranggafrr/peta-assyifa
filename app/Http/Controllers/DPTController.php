<?php

namespace App\Http\Controllers;

use App\Exports\DataDPTExport;
<<<<<<< HEAD
use App\Http\Requests\DPTRequest;
use App\Models\DptModel;
=======
use App\Http\Requests\MenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\DptModel;
use App\Models\ModulsModel;
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
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
<<<<<<< HEAD
            ['name' => 'Master Data', 'url' => null],
=======
            ['name' => 'Data DPT', 'url' => null],
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            ['name' => 'Data DPT', 'url' => null],
        ];

        $search = $request->get('query');
<<<<<<< HEAD
        $gender = $request->get('gender');
=======
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
        $query = DptModel::query();

        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%')->orWhere('nik', 'like', '%' . $search . '%');
        }
<<<<<<< HEAD
        if ($gender && $gender != 'all') {
            $query->where('jenis_kelamin', $gender);
        }
=======
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.data_dpt.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Data DPT',
            'page' => 'Data DPT',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
            'query' => $search,
<<<<<<< HEAD
            'gender' => $gender,
=======
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
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
<<<<<<< HEAD
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
=======
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
            'jenis_kelamin' => 'required|in:L,P', // Hanya boleh 'L' atau 'P'
            'tanggal_lahir' => 'required|date|before:today', // Harus sebelum hari ini
            'dusun_jalan_alamat' => 'nullable|string', // karakter
            'rt' => 'nullable|max:20', // max 20
            'rw' => 'nullable|max:20', // max 20
            'desa_kelurahan' => 'nullable|string|max:20', // Maksimal 20 karakter
            'kecamatan' => 'nullable|string|max:20', // Maksimal 20 karakter
            'kabupaten' => 'nullable|string|max:20', // Maksimal 20 karakter
            'propinsi' => 'nullable|string|max:20', // Maksimal 20 karakter
            'tps' => 'nullable|string|max:20', // Maksimal 20 karakter
            'nik' => 'nullable|string|size:16', // Harus 16 karakter
            'nomor_hp' => 'nullable|string|max:50|regex:/^\+?[0-9]{10,15}$/', // Format nomor telepon
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
        ]);

        DptModel::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'dusun_jalan_alamat' => $request->dusun_jalan_alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'propinsi' => $request->propinsi,
            'tps' => $request->tps,
            'nik' => $request->nik,
            'nomor_hp' => $request->nomor_hp,
            'remark' => $request->remark,
            'created_by' => $request->created_by,
            'created_date' => $request->created_date,
            'update_by' => $request->update_by,
            'update_date' => $request->update_date,
        ]);

        return redirect()->route('data-dpt.index')->with('success', 'Data berhasil disimpan.');
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
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
<<<<<<< HEAD
            'modul' => 'Master Data',
=======
           'modul' => 'Master Data',
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
            'menu' => 'Data DPT',
            'page' => 'Edit Data DPT',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
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
=======
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:250',
            'jenis_kelamin' => 'required|in:L,P', // Hanya boleh 'L' atau 'P'
            'tanggal_lahir' => 'required|date|before:today', // Harus sebelum hari ini
            'dusun_jalan_alamat' => 'nullable|string', // karakter
            'rt' => 'nullable|max:20', // max 20
            'rw' => 'nullable|max:20', // max 20
            'desa_kelurahan' => 'nullable|string|max:20', // Maksimal 20 karakter
            'kecamatan' => 'nullable|string|max:20', // Maksimal 20 karakter
            'kabupaten' => 'nullable|string|max:20', // Maksimal 20 karakter
            'propinsi' => 'nullable|string|max:20', // Maksimal 20 karakter
            'tps' => 'nullable|string|max:20', // Maksimal 20 karakter
            'nik' => 'nullable|string|size:16', // Harus 16 karakter
            'nomor_hp' => 'nullable|string|max:50|regex:/^\+?[0-9]{10,15}$/', // Format nomor telepon
            'update_by' => 'nullable|string|max:20', // Maksimal 20 karakter
        ]);

        DptModel::where('id_dpt', $id)->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'dusun_jalan_alamat' => $request->dusun_jalan_alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa_kelurahan' => $request->desa_kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'propinsi' => $request->propinsi,
            'tps' => $request->tps,
            'nik' => $request->nik,
            'nomor_hp' => $request->nomor_hp,
            'remark' => $request->remark,
            'update_by' => $request->update_by,
            'update_date' => Carbon::now(),
        ]);

        return redirect()->route('data-dpt.index')->with('success', 'Data berhasil diupdate.');
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
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
<<<<<<< HEAD
            return redirect()->route('data-dpt.index')->with('success', 'Data DPT berhasil dihapus.');
=======
            return redirect()->route('data-dpt.index')->with('success', 'Data pengguna berhasil dihapus.');
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

<<<<<<< HEAD
    public function saveToExcel(Request $request)
    {
        $gender = $request->input('gender'); // Jenis kelamin
        $query = $request->input('query'); // Pencarian

        return Excel::download(new DataDPTExport($gender, $query), 'laporan_data_dpt_' . Carbon::now()->format('Y_m_d_H_i_s') . '.xlsx');
=======
    public function saveToExcel()
    {
        return Excel::download(new DataDPTExport, 'data_dpt.xlsx');
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
    }
}
