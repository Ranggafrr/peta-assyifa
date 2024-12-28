@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <div class="flex justify-between mx-5 items-center">
            <p class="font-semibold text-zinc-800 text-lg">Master User</p>
            <div class="flex justify-end gap-x-2">
                <a href="{{ route('users.index') }}"
                    class="bg-white text-sky-700 border sborder-sky-700 text-xs py-2 px-3 rounded-lg font-medium inline-flex items-center gap-x-2">
                    <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                <a href="{{ route('users.index') }}"
                    class="bg-sky-700 text-white text-xs py-2 px-3 rounded-lg font-medium inline-flex items-center gap-x-2"><i
                        data-lucide='plus' class="size-4"></i> Simpan data</a>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4 border-b">
            <div class="w-full">
                <x-Input type="text" name="nama_lengkap" label="Nama lengkap" :required="true" />
            </div>
            <div class="w-full">
                <x-Input type="email" name="email" label="Email" />
            </div>
            <div>
                <x-input-group type="number" name="no_wa" label="Nomor Whatsapp" textGroup="+62" />
            </div>
            <div class="w-full">
                <x-search-select name="role" label="Role" :options="['Administrator' => 'Administrator', 'Member' => 'Member']" placeholder="Pilih Role..."
                    :hasSearch="true" />
            </div>
            <div class="w-full">
                <x-Textarea type="text" name="alamat" label="Alamat" :rows="3" />
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 m-5 pb-4">
            <div class="w-full">
                <x-Input type="text" name="username" label="Username" :required="true" />
            </div>
            <div class="w-full">
                <x-Input type="password" name="password" label="Password" :required="true" />
            </div>
        </div>
    </div>
    </div>
@endsection
