@extends('layouts.index')
@section('content')
<div class="mx-5 mt-3 border bg-white rounded-lg py-5">
    <form action="{{ route('data-dpt.update', ['data_dpt' => $data->id_dpt]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
            <div class="flex justify-end gap-x-2">
                <a href="{{ route('data-dpt.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                    <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                        class="size-4"></i> Update data</button>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4">
            <div class="w-full">
                <x-Input type="text" name="nama" label="Nama" :required="true" value="{{ old('nama', $data->nama) }}" />
            </div>
            <div class="w-full">
            <x-search-select name="jenis_kelamin" label="Jenis Kelamin" 
                         :options="['L' => 'Laki-laki', 'P' => 'Perempuan']" 
                         placeholder="Pilih jenis kelamin..." 
                         :hasSearch="false" 
                         :required="true" 
                         :value="old('jenis_kelamin', $data->jenis_kelamin)" />
            </div>
            <div class="w-full">
                <x-Input type="date" name="tanggal_lahir" label="Tanggal Lahir" :required="true"
                    value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="dusun_jalan_alamat" label="Dusun/Jalan/Alamat" :required="false"
                    value="{{ old('dusun_jalan_alamat', $data->dusun_jalan_alamat) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="rt" label="RT" :required="false" value="{{ old('rt', $data->rt) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="rw" label="RW" :required="false" value="{{ old('rw', $data->rw) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="desa_kelurahan" label="Desa/Kelurahan" :required="false"
                    value="{{ old('desa_kelurahan', $data->desa_kelurahan) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="kecamatan" label="Kecamatan" :required="false"
                    value="{{ old('kecamatan', $data->kecamatan) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="kabupaten" label="Kabupaten" :required="false"
                    value="{{ old('kabupaten', $data->kabupaten) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="propinsi" label="Propinsi" :required="false"
                    value="{{ old('propinsi', $data->propinsi) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="tps" label="TPS" :required="false" value="{{ old('tps', $data->tps) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="nik" label="NIK" :required="false" value="{{ old('nik', $data->nik) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="nomor_hp" label="Nomor HP" :required="false"
                    value="{{ old('nomor_hp', $data->nomor_hp) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="remark" label="Remark" :required="false"
                    value="{{ old('remark', $data->remark) }}" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="update_by" label="Update By" :required="false"
                    value="{{ old('update_by', $data->update_by) }}" />
            </div>
        </div>
    </form>
</div>
@endsection