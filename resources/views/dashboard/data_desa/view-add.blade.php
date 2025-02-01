@extends('layouts.index')
@section('content')
<div class="mx-5 mt-3 border bg-white rounded-lg py-5">
    <form action="{{ route('data-desa.store') }}" method="post">
        @method('POST')
        @csrf
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
            {{-- call to action --}}
            <div class="flex justify-end gap-x-2">
                <a href="{{ route('data-desa.index') }}"
                    class="btn-outline-primary inline-flex items-center gap-x-2">
                    <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='plus'
                        class="size-4"></i> Simpan data</button>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4">
          <div class="w-full">
              <x-Input type="text" name="kode_desa" label="Kode Desa" :required="true" />
          </div>
          <div class="w-full">
              <x-Input type="text" name="nama_desa" label="Nama Desa" :required="true" />
          </div>
          <div class="w-full">
              <x-Input type="text" name="kode_kecamatan" label=" Kode Kecamatan" :required="false" />
          </div>
          <div class="w-full">
            <x-Input type="text" name="remark" label="Remark" :required="false" />
        </div>
      </div>
    </form>
</div>
@endsection
