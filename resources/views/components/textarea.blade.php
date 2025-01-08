<div>
    <label class="form-label">{{ $label }} @if ($required)
            <span class="is-error">*</span>
        @endif
    </label>
    <textarea class="form-input" rows="{{ $rows }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        name="{{ $name }}" value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }}></textarea>
    @error($name)
        <small class="text-red-600 text-xs mt-1">{{ $message }}</small>
    @enderror
</div>
