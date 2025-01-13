@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('menu.update', ['menu' => $data->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('menu.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                            class="size-4"></i> Update data</button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 m-5 pb-4">
                <div class="w-full">
                    <x-Input type="text" name="kode_menu" label="Kode menu" :required="true" :value="$data->kode_menu" />
                </div>
                <div class="w-full">
                    <x-search-select name="modul" label="Modul" :options="$ListModuls" placeholder="Pilih modul..."
                        :hasSearch="true" :required="true" :value="$data->modul" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="nama_menu" label="Nama menu" :required="true" :value="$data->nama_menu" />
                </div>
                <div class="w-full">
                    <x-search-select name="sub_menu" label="Sub menu" :options="['Y' => 'Ya', 'N' => 'Bukan']" placeholder="Pilih status..."
                        :hasSearch="false" :required="true" :value="$data->sub_menu" />
                    <small class="text-red-600">*Note: Pilih 'Ya' untuk menu yang memiliki sub menu</small>
                </div>
                <div class="w-full">
                    <x-Input type="text" name="route" label="Nama rute" :required="false" :value="$data->route" />
                    <small class="text-red-600">*Note: Wajib isi jika sub menu bernilai 'Bukan'</small>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
