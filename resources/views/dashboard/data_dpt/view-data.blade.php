@extends('layouts.index')
@section('content')
    @php
        use Carbon\Carbon;
        Carbon::setLocale('id');
    @endphp
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
<<<<<<< HEAD
            <div class="flex gap-4">
                <a href="{{ route('data-dpt.create') }}" class="btn-primary inline-flex gap-x-2"> <i data-lucide="plus"
                        class="size-4"></i> Tambah
                    Data</a>
                <a href="{{ route('data-dpt.saveToExcel', ['query' => $query, 'gender' => $gender]) }}"
                    class="btn-success inline-flex gap-x-2"> <i data-lucide="save" class="size-4"></i> Save to Excel</a>
                <a href="{{ route('menu.create') }}" class="btn-outline-primary inline-flex gap-x-2"> <i
                        data-lucide="import" class="size-4"></i>Import</a>
=======
            {{-- call to action --}}
            <div class="flex items-center gap-x-3">
                {{-- dropdown excel --}}
                <div class="hs-dropdown relative inline-flex">
                    {{-- trigger --}}
                    <button id="hs-dropdown-default" type="button"
                        class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg bg-teal-700 text-white focus:outline-none"
                        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <i data-lucide="sheet" class="size-4"></i>
                        Excel
                        <i data-lucide="chevron-down" stroke-width="2" class="hs-dropdown-open:rotate-180 size-4"></i>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden w-52 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                        role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                        <div class="p-1 space-y-0.5">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-xs text-zinc-800 font-medium hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                            href="{{ route('data-dpt.download') }}" target="_blank">
                            <i data-lucide="file-down" class="size-4"></i> Download Template
                        </a>
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-xs text-zinc-800 font-medium hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                href="{{ route('data-dpt.saveToExcel', ['query' => $query, 'gender' => $gender]) }}">
                                <i data-lucide="download" class="size-4"></i> Export data
                            </a>
                            {{-- trigger modal form import excel --}}
                            <button type="button"
                                class="flex items-center gap-x-3.5 py-2 px-3 w-full rounded-lg text-xs text-zinc-800 font-medium hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal"
                                data-hs-overlay="#hs-scale-animation-modal">
                                <i data-lucide="upload" class="size-4"></i> Import data
                            </button>
                        </div>
                    </div>
                </div>
                {{-- add data --}}
                <a href="{{ route('data-dpt.create') }}" class="btn-primary inline-flex gap-x-2"> <i data-lucide="plus"
                        class="size-4"></i> Tambah
                    Data</a>
            </div>
            {{-- modal form import excel --}}
            <div id="hs-scale-animation-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[999] overflow-x-hidden overflow-y-auto pointer-events-none"
                role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
                <div
                    class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div
                        class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
                            <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                                Import data excel
                            </h3>
                            <button type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <form action="{{ route('data-dpt.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="p-4 overflow-y-auto">
                                <x-input type="file" name="data_dpt" label="Import data excel" />
                                <small class="text-xs text-red-600">File harus format xls/csv</small>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-neutral-700">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    data-hs-overlay="#hs-scale-animation-modal">
                                    Close
                                </button>
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Simpan data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
>>>>>>> a984a0b (fix import data)
            </div>
        </div>
        {{-- form filter --}}
        <form action="" method="get" class="flex items-center space-x-2 mx-5 mt-5">
            <div class="w-1/4">
                <x-search-input name='query' type="text" :value="$query" placeholder="Cari data..." icon="search" />
            </div>
            <div class="w-2/12">
                <select class="form-select" onchange="this.form.submit()" name="gender">
                    <option value="" disabled selected>Jenis kelamin</option>
                    <option {{ $gender == 'all' ? 'selected' : '' }} value="all">All</option>
                    <option {{ $gender == 'L' ? 'selected' : '' }} value="L">Laki-laki</option>
                    <option {{ $gender == 'P' ? 'selected' : '' }} value="P">Perempuan</option>
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
                                        <th scope="col" class="table-head-row">No</th>
                                        <th scope="col" class="table-head-row">Profil</th>
                                        <th scope="col" class="table-head-row">Jenis Kelamin</th>
<<<<<<< HEAD
                                        <th scope="col" class="table-head-row">tanggal lahir / usia</th>
=======
                                        <th scope="col" class="table-head-row">usia</th>
>>>>>>> a984a0b (fix import data)
                                        <th scope="col" class="table-head-row">Dusun/Jalan Alamat</th>
                                        <th scope="col" class="table-head-row">RT/RW</th>
                                        <th scope="col" class="table-head-row">Ket</th>
                                        <th scope="col" class="table-head-row">ACT</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @if ($data->isNotEmpty())
                                        @foreach ($data as $index => $item)
                                            @php
                                                // Format tanggal lahir
                                                $tgl_lahir = Carbon::parse($item->tanggal_lahir);
                                                $formatted_tgl_lahir = $tgl_lahir->translatedFormat('d M Y');
                                                $usia = $tgl_lahir->diffInYears(Carbon::now());
                                            @endphp
                                            <tr>
                                                <td class="table-body-col font-medium">{{ $index + 1 }}</td>
                                                <td class="table-body-col">
                                                    {{ $item->nama }}<br />[<b>NIK:
                                                    </b>{{ $item->nik }}]<br />[<b>Kontak: </b> +{{ $item->nomor_hp }}]
                                                </td>
                                                <td class="table-body-col">
                                                    {{ $item->jenis_kelamin }}</td>
                                                <td class="table-body-col">
<<<<<<< HEAD
                                                    {{ $formatted_tgl_lahir }} / {{ round($usia) }}</td>
=======
                                                    {{ round($item->usia) }}</td>
>>>>>>> a984a0b (fix import data)
                                                <td class="table-body-col">{{ $item->dusun_jalan_alamat }}</td>
                                                <td class="table-body-col">{{ $item->rt }} / {{ $item->rw }}</td>
                                                <td class="table-body-col">{{ $item->remark }}</td>
                                                <!-- Menggunakan 'remark' sebagai kolom ket -->
                                                <td class="table-body-col">
                                                    <div class="hs-dropdown relative inline-flex">
                                                        <button id="hs-dropdown-custom-icon-trigger" type="button"
                                                            class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none
                                                        aria-haspopup="menu"
                                                            aria-expanded="false" aria-label="Dropdown">
                                                            <i data-lucide="ellipsis-vertical"
                                                                class="flex-none size-4 text-gray-600"></i>
                                                        </button>
                                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden bg-white shadow-md rounded-lg mt-2 min-w-40 z-[60]"
                                                            role="menu" aria-orientation="vertical"
                                                            aria-labelledby="hs-dropdown-custom-icon-trigger">
                                                            <div class="flex flex-col p-1 space-y-0.5">
                                                                <a class="inline-flex items-center gap-x-3.5 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                    href="{{ route('data-dpt.edit', ['data_dpt' => $item->id_dpt]) }}">
                                                                    <i data-lucide="square-pen" class="size-4"></i> Edit
                                                                    Data
                                                                </a>
                                                                <a class="inline-flex items-center gap-x-3.5 py-2 px-3 w-full rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                    href="{{ route('data-dpt.show', ['data_dpt' => $item->id_dpt]) }}">
                                                                    <i data-lucide="eye" class="size-4"></i> Detail
                                                                    Data
                                                                </a>
                                                                <button
                                                                    class="inline-flex items-center w-full gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                    data-hs-overlay="#delete-modal"
                                                                    data-id="{{ $item->id_dpt }}">
<<<<<<< HEAD
                                                                    <i data-lucide="trash-2" class="size-4"></i> Hapus Data
=======
                                                                    <i data-lucide="trash-2" class="size-4"></i> Hapus
                                                                    Data
>>>>>>> a984a0b (fix import data)
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
<<<<<<< HEAD
                                            <td colspan="8" class="text-center text-sm py-2.5">Data Tidak Ditemukan</td>
=======
                                            <td colspan="8" class="text-center text-sm py-2.5">Data Tidak Ditemukan
                                            </td>
>>>>>>> a984a0b (fix import data)
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- Pagination Links -->
<<<<<<< HEAD
                            <div class="mt-4">
=======
                            <div class="flex justify-end m-4">
>>>>>>> a984a0b (fix import data)
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
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
                const actionUrl = `{{ route('data-dpt.destroy', ':data_dpt') }}`.replace(':data_dpt',
                    dataId);
                deleteForm.setAttribute('action', actionUrl); // Set action URL di form
            });
        });
    });
</script>
=======
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
                    const actionUrl = `{{ route('data-dpt.destroy', ':data_dpt') }}`.replace(
                        ':data_dpt',
                        dataId);
                    deleteForm.setAttribute('action', actionUrl); // Set action URL di form
                });
            });
        });
    </script>
>>>>>>> a984a0b (fix import data)

@endsection
