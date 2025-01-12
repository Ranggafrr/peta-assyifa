<?php

namespace App\Http\Controllers;

use App\Exports\MasterSkillExport;
use App\Models\SkillModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Skill', 'url' => null],
            ['name' => 'Master Skill', 'url' => null],
        ];

        $search = $request->get('query');
        $query = SkillModel::query();

        if ($search) {
            $query->where('nama_skill', 'like', '%' . $search . '%');
        }
        // Ambil hasil query
        $data = $query->paginate(10);
        return view('dashboard.master_skill.view-data', [
            'modul' => 'Master Data',
            'menu' => 'Master Skill',
            'page' => 'Master Skill',
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
            ['name' => 'Master Skill', 'url' => route('master-skill.index')],
            ['name' => 'Tambah Data Skill', 'url' => null],
        ];
        return view('dashboard.master_skill.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Master Skill',
            'page' => 'Tambah Data Skill',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_skill' => 'required|string|max:100', // Maksimal 100 karakter
            'created_by' => 'nullable|string|max:20', // Maksimal 20 karakter
        ]);

        SkillModel::create([
            'nama_skill' => $request->nama_skill,
            'remark' => $request->remark,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('data-dpt.index')->with('success', 'Data berhasil disimpan.');

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
            ['name' => 'Master Skill', 'url' => route('master-skill.index')],
            ['name' => 'Edit Data Skill', 'url' => null],
        ];

        $data = SkillModel::find($id);

        return view('dashboard.master_skill.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Master Skill',
            'page' => 'Edit Data Skill',
            'breadcrumbs' => $breadcrumbs,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_skill' => 'required|string|max:100', // Maksimal 100 karakter
            'remark' => 'nullable|string',
            'update_by' => 'nullable|string|max:20', // Maksimal 20 karakter
        ]);

        $data = SkillModel::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $data->update([
            'nama_skill' => $request->nama_skill,
            'remark' => $request->remark,
            'update_by' => $request->update_by,
        ]);

        return redirect()->route('master-skill.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Perbarui data pengguna
            SkillModel::where('id', $id)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('master-skill.index')->with('success', 'Data pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            // Penanganan error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }

    public function saveToExcel()
    {
        return Excel::download(new MasterSkillExport, 'master_skill.xlsx');
    }
}
