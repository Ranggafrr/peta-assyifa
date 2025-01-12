@extends('layouts.index')
@section('content')
<div class="mx-5 mt-3 border bg-white rounded-lg py-5">
    <form action="{{ route('master-golongan-darah.update', ['master_golongan_darah' => $data->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
            <div class="flex justify-end gap-x-2">
                <a href="{{ route('master-golongan-darah.index') }}"
                    class="btn-outline-primary inline-flex items-center gap-x-2">
                    <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='square-pen'
                        class="size-4"></i> Update data</button>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4">
            <div class="w-full">
                <x-search-select name="golongan_darah" label="Golongan Darah" :options="['A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O', 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-']" placeholder="Pilih golongan darah..." :hasSearch="false" :required="true"
                    :value="old('golongan_darah', $data->golongan_darah)" />
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