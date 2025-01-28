@extends('layouts.index')
@section('content')
<div class="mx-5 mt-3 border bg-white rounded-lg py-5">
    <form action="{{ route('data-pendidikan.update', ['data_pendidikan' => $data->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
            <div class="flex justify-end gap-x-2">
                <a href="{{ route('data-pendidikan.index') }}"
                    class="btn-outline-primary inline-flex items-center gap-x-2">
                    <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                        class="size-4"></i> Update data</button>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4">
            <div class="w-full">
                <x-Input type="text" name="nama_pendidikan" label="Nama Pendidikan" :required="true"
                    :value="$data->nama_pendidikan" />
            </div>
            <div class="w-full">
                <x-search-select name="tingkat_pendidikan" label="Tingkat Pendidikan" :options="['PAUD' => 'PAUD', 'SD' => 'SD', 'SMP/MTS' => 'SMP/MTS', 'SMA/SMK/MAN' => 'SMA/SMK/MAN', 'D3' => 'D3', 'D4/S1' => 'D4/S1', 'S2' => 'S2', 'S3' => 'S3']" placeholder="Pilih Tingkat Pendidikan" :hasSearch="false" :required="true" :value="$data->tingkat_pendidikan" />
            </div>
            <div class="w-full">
                <x-search-select name="akreditasi" label="Akreditasi" :options="['A' => 'A', 'B' => 'B', 'C' => 'C', 'Tidak Terakreditasi' => 'Tidak Terakreditasi']" placeholder="Pilih Akreditasi" :hasSearch="false"
                    :required="true" :value="$data->akreditasi" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="remark" label="Remark" :required="false" :value="$data->remark" />
            </div>
        </div>
    </form>
</div>
@endsection