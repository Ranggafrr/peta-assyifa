<?php

namespace App\Http\Controllers;

use App\Exports\MasterSkillExport;
use App\Http\Requests\SkillRequest;
use App\Models\SkillModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master Data', 'url' => null],
            ['name' => 'Data Skill', 'url' => null],
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
            'menu' => 'Data Skill',
            'page' => 'Data Skill',
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
            ['name' => 'Data Skill', 'url' => route('master-skill.index')],
            ['name' => 'Tambah Data Skill', 'url' => null],
        ];
        return view('dashboard.master_skill.view-add', [
            'modul' => 'Master Data',
            'menu' => 'Data Skill',
            'page' => 'Tambah Data Skill',
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $storeData = array_merge($validatedData, ['created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
            SkillModel::create($storeData);
            return redirect()->route('master-skill.index')->with('success', 'Data Skill berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('master-skill.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
            ['name' => 'Data Skill', 'url' => route('master-skill.index')],
            ['name' => 'Edit Data Skill', 'url' => null],
        ];

        $data = SkillModel::find($id);

        return view('dashboard.master_skill.view-update', [
            'modul' => 'Master Data',
            'menu' => 'Data Skill',
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
        try {
            $validatedData = $request->validated();
            $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
            SkillModel::where('id', $id)->update($updateData);
            return redirect()->route('master-skill.index')->with('success', 'Data Skill berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('master-skill.index')->with('error', 'Terjadi kesalahan saat mengupdate data: ' . $e->getMessage());
        }
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
