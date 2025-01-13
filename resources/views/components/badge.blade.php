@switch($variant)
    @case('primary')
        <span
            class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-sky-100 text-sky-800">{{ $value }}</span>
    @break

    @case('success')
        <span
            class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-teal-100 text-teal-800">{{ $value }}</span>
    @break

    @case('danger')
        <span
            class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-red-100 text-red-800">{{ $value }}</span>
    @break

    @default
@endswitch
