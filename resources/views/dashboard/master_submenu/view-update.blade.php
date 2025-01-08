@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('sub-menu.update', ['sub_menu' => $data->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('sub-menu.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                            class="size-4"></i> Update data</button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 m-5 pb-4">
                <div class="w-full">
                    <x-search-select name="kode_menu" label="Menu" :options="$ListMenu" placeholder="Pilih Menu..."
                        :hasSearch="true" :required="true" :value="$data->kode_menu" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="nama_submenu" label="Nama sub menu" :required="true" :value="$data->nama_submenu" />
                </div>
                <div class="w-full">
                    <x-Input type="number" name="no_urut" label="Nomor urut" :required="true" :value="$data->no_urut" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="route" label="Nama rute" :required="true" :value="$data->route" />
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
