@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('moduls.update', ['modul' => $data->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('moduls.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                            class="size-4"></i> Update data</button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 m-5 pb-4">
                <div class="w-full">
                    <x-Input type="text" name="modul" label="Nama modul" :required="true" :value="$data->modul" />
                </div>
                <div class="w-full">
                    <x-Input type="number" name="no_urut" label="Nomor urutan" :required="true" :value="$data->no_urut" />
                </div>
                <div class="w-full">
                    <x-search-select name="status" label="Status" :options="['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif']" placeholder="Pilih status..."
                        :hasSearch="true" :required="true" :value="$data->status" />
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
