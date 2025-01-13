@extends('layouts.index')
@section('content')
<<<<<<< HEAD
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('data-dpt.store') }}" method="post">
            @method('POST')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                {{-- call to action --}}
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('data-dpt.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='plus'
                            class="size-4"></i> Simpan data</button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 m-5 pb-4">
                <div class="w-full">
                    <x-Input type="text" name="nama" label="Nama" :required="true" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="nik" label="NIK" :required="false" />
                </div>
                <div class="w-full">
                    <x-search-select name="jenis_kelamin" label="Jenis Kelamin" :options="['L' => 'Laki-laki', 'P' => 'Perempuan']"
                        placeholder="Pilih jenis kelamin..." :hasSearch="false" :required="true" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="nomor_hp" label="Nomor HP" :required="false" />
                </div>
                <div class="w-full">
                    <x-date-picker name="tanggal_lahir" label="Tanggal Lahir" :required="true" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="dusun_jalan_alamat" label="Dusun/Jalan/Alamat" :required="false" />
                </div>
                <div class="w-full flex gap-x-2">
                    <div class="w-1/2">
                        <x-Input type="number" name="rt" label="RT" :required="false" />
                    </div>
                    <div class="w-1/2">
                        <x-Input type="number" name="rw" label="RW" :required="false" />
                    </div>
                </div>
                <div class="w-full">
                    <x-Input type="text" name="desa_kelurahan" label="Desa/Kelurahan" :required="false" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="kecamatan" label="Kecamatan" :required="false" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="kabupaten" label="Kabupaten" :required="false" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="propinsi" label="Propinsi" :required="false" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="tps" label="TPS" :required="false" />
                </div>
                <div class="w-full">
                    <x-Textarea type="text" name="remark" label="Catatan" :required="false" :rows="3" />
                </div>
        </form>
    </div>
@endsection
=======
<div class="mx-5 mt-3 border bg-white rounded-lg py-5">
    <form action="{{ route('data-dpt.store') }}" method="post">
        @method('POST')
        @csrf
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
            {{-- call to action --}}
            <div class="flex justify-end gap-x-2">
                <a href="{{ route('data-dpt.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                    <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='plus'
                        class="size-4"></i> Simpan data</button>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4">
            <div class="w-full">
                <x-Input type="text" name="nama" label="Nama" :required="true" />
            </div>
            <div class="w-full">
                <x-search-select name="jenis_kelamin" label="Jenis Kelamin" :options="['L' => 'Laki-laki', 'P' => 'Perempuan']" placeholder="Pilih jenis kelamin..." :hasSearch="false" :required="true" />
            </div>
            <div class="w-full">
                <x-Input type="date" name="tanggal_lahir" label="Tanggal Lahir" :required="true" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="dusun_jalan_alamat" label="Dusun/Jalan/Alamat" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="rt" label="RT" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="rw" label="RW" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="desa_kelurahan" label="Desa/Kelurahan" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="kecamatan" label="Kecamatan" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="kabupaten" label="Kabupaten" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="propinsi" label="Propinsi" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="tps" label="TPS" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="nik" label="NIK" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="nomor_hp" label="Nomor HP" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="remark" label="Remark" :required="false" />
            </div>
            <div class="w-full">
                <x-Input type="text" name="created_by" label="Created By" :required="false" />
            </div>
        </div>
    </form>
</div>
@endsection
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
