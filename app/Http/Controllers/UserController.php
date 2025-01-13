<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request)
  {
    $breadcrumbs = [
      ['name' => 'Dashboard', 'url' => route('dashboard')],
<<<<<<< HEAD
      ['name' => 'Utility', 'url' => null],
=======
      ['name' => 'Master data', 'url' => null],
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
      ['name' => 'Master user', 'url' => null],
    ];


    $search = $request->get('query');
    $query = User::query()
      ->leftJoin('master_role', 'users.role', '=', 'master_role.id')
      ->select('users.*', 'master_role.role as role_name');

    // Jika ada pencarian nama atau email
    if ($search) {
      $query->where('users.nama_lengkap', 'like', '%' . $search . '%')
        ->orWhere('users.email', 'like', '%' . $search . '%')
        ->orWhere('users.no_wa', 'like', '%' . $search . '%');
    }

    // Ambil hasil query
    $data = $query->paginate(10);
    return view('dashboard.master_user.view-data', [
<<<<<<< HEAD
      'modul' => 'Utility',
=======
      'modul' => 'Master Data',
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
      'menu' => 'Master User',
      'page' => 'Master user',
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
<<<<<<< HEAD
      ['name' => 'Utility', 'url' => null],
=======
      ['name' => 'Master data', 'url' => null],
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
      ['name' => 'Master user', 'url' => route('users.index')],
      ['name' => 'Tambah user', 'url' => null],
    ];
    return view('dashboard.master_user.view-add', [
<<<<<<< HEAD
      'modul' => 'Utility',
=======
      'modul' => 'Master Data',
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
      'menu' => 'Master User',
      'page' => 'Tambah user',
      'breadcrumbs' => $breadcrumbs,
      'roleList' => RoleModel::pluck('role', 'id')->toArray(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest  $request)
  {
    try {
      // Membuat UUID baru
      $uuid = Str::uuid()->toString();
      // ambil data yang divalidasi
      $validatedData = $request->validated();
      // Gabungkan UUID dengan data lainnya
      $storeData = array_merge($validatedData, ['user_id' => $uuid, 'created_by' => Session::get('user')->nama_lengkap, 'created_at' => Carbon::now()]);
      // Hash password sebelum disimpan
      $storeData['password'] = bcrypt($storeData['password']);

      User::create($storeData);
      return redirect()->route('users.index')->with('success', 'Data pengguna berhasil disimpan.');
    } catch (\Exception $e) {
      return redirect()->route('users.index')->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
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
<<<<<<< HEAD
      ['name' => 'Utility', 'url' => null],
=======
      ['name' => 'Master data', 'url' => null],
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
      ['name' => 'Master user', 'url' => route('role.index')],
      ['name' => 'Update user', 'url' => null],
    ];

    $user_id = Crypt::decryptString($id);
    $data = User::where('user_id', $user_id)->first();
    return view('dashboard.master_user.view-update', [
<<<<<<< HEAD
      'modul' => 'Utility',
=======
      'modul' => 'Master Data',
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
      'menu' => 'Master User',
      'page' => 'Update user',
      'breadcrumbs' => $breadcrumbs,
      'data' => $data,
      'roleList' => RoleModel::pluck('role', 'id')->toArray(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateUserRequest $request, string $id)
  {
    try {
      // Dekripsi ID pengguna
      $user_id = Crypt::decryptString($id);

      // Validasi data dari request
      $validatedData = $request->validated();

      // Gabungkan UUID dengan data lainnya
      $updateData = array_merge($validatedData, ['updated_by' => Session::get('user')->nama_lengkap, 'updated_at' => Carbon::now()]);
      // Perbarui data pengguna
      User::where('user_id', $user_id)->update($updateData);

      // Redirect dengan pesan sukses
      return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    } catch (\Exception $e) {
      // Penanganan error lain
      return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    try {
      // Perbarui data pengguna
      User::where('user_id', $id)->delete();

      // Redirect dengan pesan sukses
      return redirect()->route('users.index')->with('success', 'Data pengguna berhasil dihapus.');
    } catch (\Exception $e) {
      // Penanganan error lain
      return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
    }
  }
}
