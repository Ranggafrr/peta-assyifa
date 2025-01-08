@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('role.store') }}" method="post">
            @method('POST')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('role.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='plus'
                            class="size-4"></i> Simpan data</button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 m-5 pb-4">
                <div class="w-full">
                    <x-Input type="text" name="role" label="Nama role" :required="true" />
                </div>
                <div class="w-full">
                    <x-search-select name="status" label="Status" :options="['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif']" placeholder="Pilih status..."
                        :hasSearch="true" :required="true" />
                </div>
                <div class="w-full">
                    <x-Textarea type="text" name="remark" label="Catatan" :rows="1" />
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection
