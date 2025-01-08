@extends('layouts.index')
@section('content')
    <div class="mx-5 mt-3 border bg-white rounded-lg py-5">
        <form action="{{ route('users.store') }}" method="post">
            @method('POST')
            @csrf
            <div class="flex justify-between mx-5 items-center">
                <p class="font-semibold text-zinc-800 text-lg">{{ $page }}</p>
                <div class="flex justify-end gap-x-2">
                    <a href="{{ route('users.index') }}" class="btn-outline-primary inline-flex items-center gap-x-2">
                        <i data-lucide='undo-2' class="size-4"></i> Kembali</a>
                    <button type="submit" class="btn-primary inline-flex items-center gap-x-2"><i data-lucide='plus'
                            class="size-4"></i> Simpan data</button>
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
                    <x-search-select name="role" label="Role" :options="$roleList" placeholder="Pilih Role..."
                        :hasSearch="true" :required="true" />
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
        </form>
    </div>
    </div>
@endsection
