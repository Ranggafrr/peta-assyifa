@extends('layouts.index')
@section('content')
<div class="mx-5 mt-3 border bg-white rounded-lg py-5">
    <div class="flex justify-between mx-5 items-center">
        <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
        <div class="flex gap-4">
            <a href="{{ route('data-propinsi.create') }}" class="btn-primary inline-flex gap-x-2"> <i
                    data-lucide="plus" class="size-4"></i> Tambah
                Data</a>
            <a href="{{ route('data-propinsi.saveToExcel') }}" class="btn-success inline-flex gap-x-2"> <i
                    data-lucide="save" class="size-4"></i> Save to Excel</a>
            <a href="{{ route('menu.create') }}" class="btn-outline-primary inline-flex gap-x-2"> <i
                    data-lucide="import" class="size-4"></i>Import</a>
        </div>
    </div>
    {{-- form filter --}}
    <form action="" method="get" class="flex items-center space-x-2 mx-5 mt-5">
        <div class="w-1/4">
            <x-search-input name='query' type="text" :value="$query" placeholder="Cari data..." icon="search" />
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
                                    <th scope="col" class="table-head-row">No</th>
                                    <th scope="col" class="table-head-row">Kode Propinsi</th>
                                    <th scope="col" class="table-head-row">Nama Propinsi</th>
                                    <th scope="col" class="table-head-row">Ket</th>
                                    <th scope="col" class="table-head-row">ACT</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @if ($data->isNotEmpty())
                                    @foreach($data as $index => $item)
                                        <tr>
                                            <td class="table-body-col font-medium">{{ $index + 1 }}</td>
                                            <td class="table-body-col">{{ $item->kode_propinsi }}</td>
                                            <td class="table-body-col">{{ $item->nama_propinsi }}</td>
                                            <td class="table-body-col">{{ $item->remark }}</td>
                                            <!-- Menggunakan 'remark' sebagai kolom ket -->
                                            <td class="table-body-col">
                                                <div class="hs-dropdown relative inline-flex">
                                                    <button id="hs-dropdown-custom-icon-trigger" type="button" class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none
                                                                        aria-haspopup=" menu aria-expanded="false"
                                                        aria-label="Dropdown">
                                                        <i data-lucide="ellipsis-vertical"
                                                            class="flex-none size-4 text-gray-600"></i>
                                                    </button>
                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg mt-2 min-w-40 z-[60]"
                                                        role="menu" aria-orientation="vertical"
                                                        aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                        <div class="flex flex-col p-1 space-y-0.5">
                                                            <a class="inline-flex items-center gap-x-3.5 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                href="{{ route('data-propinsi.edit', ['data_propinsi' => $item->id]) }}">
                                                                <i data-lucide="square-pen" class="size-4"></i> Edit
                                                                Data
                                                            </a>
                                                            <a class="inline-flex items-center gap-x-3.5 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                href="{{ route('data-propinsi.show', ['data_propinsi' => $item->id]) }}">
                                                                <i data-lucide="eye" class="size-4"></i> Detail
                                                                Data
                                                            </a>
                                                            <button
                                                                class="inline-flex items-center w-full gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                data-hs-overlay="#delete-modal" data-id="{{ $item->id }}">
                                                                <i data-lucide="trash-2" class="size-4"></i> Hapus Data
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center text-sm py-2.5">Data Tidak Ditemukan</td>
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


{{-- dialog delete data --}}
<div id="delete-modal"
    class="hs-overlay [--overlay-backdrop:static] hidden size-full fixed top-40 start-0 z-[100] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4">
                <h3 id="hs-static-backdrop-modal-label" class="font-semibold text-zinc-700">
                    Apa kamu yakin?
                </h3>
            </div>
            <div class="px-4 py-2 overflow-y-auto">
                <p class="mt-1 text-zinc-800 text-sm">
                    Tindakan ini tidak dapat dibatalkan. Ini akan menghapus data secara
                    permanen.
                </p>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4">
                <button type="button" class="btn-outline inline-flex items-center gap-x-2 focus:outline-none"
                    data-hs-overlay="#delete-modal">
                    Batalkan
                </button>
                <form id="delete-form" method="post" action="">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="btn-destructive inline-flex items-center gap-x-2 text-xs hover:bg-red-700 focus:outline-none">
                        Hapus Data
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Script untuk inject id data & route delete ke form dialog delete --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteButtons = document.querySelectorAll('[data-hs-overlay="#delete-modal"]');
        const deleteForm = document.getElementById('delete-form');
        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const dataId = button.getAttribute(
                    'data-id'); // Mengambil ID pengguna dari atribut data-id
                // Menggunakan route() helper untuk menghasilkan URL DELETE berdasarkan route name
                const actionUrl = `{{ route('data-propinsi.destroy', ':data-propinsi') }}`.replace(':data-propinsi',
                    dataId);
                deleteForm.setAttribute('action', actionUrl); // Set action URL di form
            });
        });
    });
</script>

@endsection