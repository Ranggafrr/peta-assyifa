<div id="alert"
    class="absolute right-5 top-5 z-[60] mt-2 rounded-lg px-3 py-3 text-xs font-medium inline-flex items-center gap-x-2 {{ $type == 'success' ? 'alert-success' : 'alert-error' }} alert"
    role="alert" tabindex="-1" aria-labelledby="hs-soft-color-{{ $type }}-label">
    @if ($type == 'success')
        <i data-lucide="circle-check-big" class="size-4 text-teal-600"></i>
    @else
        <i data-lucide="circle-x" class="size-4 text-red-600"></i>
    @endif
    {{ $message }}
</div>

<script>
    setTimeout(() => {
        // Menambahkan kelas hidden untuk menutup alert dengan animasi
        const alert = document.getElementById('alert');
        if (alert) {
            alert.classList.add('fade-out');
        }
    }, 5000);
</script>

<style>
    /* Animasi untuk muncul alert */
    .alert {
        animation: fadeIn 0.5s ease-in-out;
    }

    /* Animasi fade-in */
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animasi fade-out */
    .fade-out {
        animation: fadeOut 0.5s ease-in-out forwards;
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
</style>
