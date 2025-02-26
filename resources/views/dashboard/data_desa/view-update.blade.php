@extends('layouts.index')
@section('content')
<<<<<<< HEAD
<div class="mx-5 mt-3 border bg-white rounded-lg py-5">
    <form action="{{ route('data-desa.update', ['data_desa' => $data->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
            <div class="flex justify-end gap-x-2">
                <a href="{{ route('data-desa.index') }}"
                    class="btn-outline-primary inline-flex items-center gap-x-2">
                    <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                        class="size-4"></i> Update data</button>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4">
          <div class="w-full">
              <x-Input type="text" name="kode_desa" label="Kode Desa" :required="true"
                  :value="$data->kode_desa" />
          </div>
          <div class="w-full">
              <x-Input type="text" name="nama_desa" label="Nama Desa" :required="true"
                  :value="$data->nama_desa" />
          </div>
          <div class="w-full">
            <x-Input type="text" name="kode_kecamatan" label="Kode Kecamatan" :required="true"
                :value="$data->kode_kecamatan" />
        </div>
          <div class="w-full">
              <x-Input type="text" name="remark" label="Remark" :required="false" :value="$data->remark" />
          </div>
      </div>
    </form>
</div>
=======
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('data-desa.update', ['data_desa' => $data->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('data-desa.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                            class="size-4"></i> Update data</button>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-4 m-5 pb-4">
                <div class="w-full">
                    <x-Input type="text" name="kode_desa" label="Kode Desa" :required="true" :value="$data->kode_desa" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="nama_desa" label="Nama Desa" :required="true" :value="$data->nama_desa" />
                </div>
                <div class="w-full">
                    <x-search-select name="kode_kecamatan" label="kecamatan" :options="$districtList"
                        placeholder="Pilih kecamatan..." :hasSearch="true" :value="$data->kode_kecamatan" :required="true" />
                </div>
                <div class="w-full">
                    <x-Input type="text" name="remark" label="Remark" :required="false" :value="$data->remark" />
                </div>
            </div>
        </form>
    </div>
>>>>>>> a984a0b (fix import data)
@endsection
