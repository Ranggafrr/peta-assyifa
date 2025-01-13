@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
            <a href="{{ route('access-menu.create') }}" class="btn-primary inline-flex gap-x-2"> <i data-lucide="plus"
                    class="size-4"></i> Tambah
                Data</a>
        </div>
        {{-- form filter --}}
        <form action="" method="get" class="mx-5 mt-5">
            <div class="w-1/4">
                <select name="query" onchange="this.form.submit()"
                    class="py-2 px-2 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <option value="">Role</option>
                    @foreach ($ListRole as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $query ? 'selected' : '' }}>{{ $item->role }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>
        <div class="mx-5 mt-5">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border  rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col" class="table-head-row">
                                            No</th>
                                        <th scope="col" class="table-head-row">
                                            Menu</th>
                                        <th scope="col" class="table-head-row">
                                            Role</th>
                                        <th scope="col" class="table-head-row">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @if ($data->isNotEmpty())
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="table-body-col font-medium">
                                                    {{ $loop->iteration }}</td>
                                                <td class="table-body-col">
                                                    {{ $item->nama_menu ?? '-' }} / {{ $item->kode_menu ?? '-' }}
                                                </td>
                                                <td class="table-body-col">
                                                    {{ $item->role ?? '-' }}
                                                </td>
                                                <td class="table-body-col">
                                                    <form id="form-{{ $item->id }}"
                                                        action="{{ route('access-menu.update', ['access_menu' => $item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="{{ $item->status }}">
                                                        <!-- Badge sebagai tombol -->
                                                        <button type="submit" class="p-0 border-0 bg-transparent">
                                                            <x-badge :variant="$item->status == 'Aktif' ? 'success' : 'danger'" :value="$item->status" />
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center text-sm py-2.5">Data Tidak Ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
                            <div class="mt-4">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
