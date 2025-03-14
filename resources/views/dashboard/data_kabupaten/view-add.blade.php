@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('data-kabupaten.store') }}" method="post">
            @method('POST')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                {{-- call to action --}}
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('data-kabupaten.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='plus'
                            class="size-4"></i> Simpan data</button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 m-5 pb-4">
                <div class="w-full">
                    <x-Input type="text" name="kode_kabupaten_kota" label="Kode kabupaten" :required="true" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="nama_kabupaten_kota" label="Nama kabupaten" :required="true" />
                </div>
                <div class="w-full">
                    <x-search-select name="kode_propinsi" label="provinsi" :options="$provenceList" placeholder="Pilih provinsi..."
                        :hasSearch="true" :required="true" />
                </div>
                <div class="w-full">
                    <x-Textarea type="text" rows="3" name="remark" label="Catatan" :required="false" />
                </div>
            </div>
        </form>
    </div>
@endsection
