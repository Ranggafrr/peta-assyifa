<div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
        <i data-lucide="{{ $icon }}" class="shrink-0 size-4 text-gray-400"></i>
    </div>
    <input name="{{ $name }}" oninput="this.form.submit()" autofocus
        class="py-2 ps-10 pe-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-sky-700 focus:ring-0 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
        type="text"placeholder="{{ $placeholder }}" value="{{ $value }}">
</div>
