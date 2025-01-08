<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\MenuModel;
use App\Models\ModulsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DPTController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Master data', 'url' => null],
            ['name' => 'Master menu', 'url' => null],
        ];

        $search = $request->get('query');
        $query = MenuModel::query();

        // Jika ada pencarian nama atau email
        if ($search) {
            $query->where('kode_menu', 'like', '%' . $search . '%')->orWhere('nama_menu', 'like', '%' . $search . '%');
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
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
