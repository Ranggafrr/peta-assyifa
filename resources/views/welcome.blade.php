<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.header')

<body>
    <div class="relative flex max-h-screen">
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif
        @if (session('error'))
            <x-alert type="error" :message="session('error')" />
        @endif
        <div class="relative bg-sky-500/70 w-1/2">
            <div class="absolute inset-0 z-[60] bg-sky-500/40"></div>
            <div class="relative h-screen flex justify-center items-center">
                <img src="{{ asset('images/bg/joel-filipe-asL4k-U3I_s-unsplash.jpg') }}" alt=""
                    class="h-screen w-full">
            </div>
        </div>
        <div class="bg-white w-1/2">
            <div class="flex flex-col justify-center items-center h-screen mx-10">
                <div class="flex flex-col items-center mb-3">
                    <p class="text-2xl font-semibold text-zinc-800">Selamat Datang</p>
                    <p class="text-sm text-zinc-500">Masukkan username & password untuk mengakses akun Anda.</p>
                </div>
                <form action="{{ route('loginAuth') }}" method="post" class=" max-w-xs w-full">
                    @csrf
                    <div class="flex flex-col space-y-2 mt-4">
                        <div class="relative">
                            <input type="text" id="username" value="{{ old('username') }}" name="username"
                                class="form-leading-icon @error('username') is-error @enderror {{ session('error') ? 'is-error' : '' }}"
                                placeholder="Username">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-4">
                                <i data-lucide="user" class="shrink-0 size-4 text-gray-400"></i>
                            </div>
                        </div>
                        @error('username')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                        <div>
                            <div class="relative">
                                <!-- Input Password -->
                                <input type="password" id="password-input" name="password" value="{{ old('password') }}"
                                    class="form-leading-icon pe-10  @error('password') is-error @enderror {{ session('error') ? 'is-error' : '' }}"
                                    placeholder="Password">
                                <!-- Icon Kunci -->
                                <div class="absolute inset-y-0 start-0 flex items-center z-20 ps-4">
                                    <i data-lucide="key-round" class="shrink-0 size-4 text-gray-400"></i>
                                </div>
                                <!-- Toggle Icon -->
                                <div class="absolute inset-y-0 end-0 flex items-center z-20 pe-4 cursor-pointer"
                                    onclick="togglePassword()">
                                    <i id="toggle-icon" data-lucide="eye" class="shrink-0 size-5 text-gray-400"></i>
                                </div>
                            </div>
                            @error('password')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="py-2 bg-sky-700 text-white rounded-lg text-sm w-full max-w-sm mt-4">Masuk</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password-input');
            const toggleIcon = document.getElementById('toggle-icon');

            // Check current input type
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'; // Show password
                toggleIcon.setAttribute('data-lucide', 'eye-off'); // Change icon
            } else {
                passwordInput.type = 'password'; // Hide password
                toggleIcon.setAttribute('data-lucide', 'eye'); // Change icon back
            }

            // Refresh Lucide Icons
            lucide.createIcons();
        }
    </script>
</body>

</html>
