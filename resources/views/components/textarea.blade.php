<div>
    <label class="form-label">{{ $label }} @if ($required)
            <span class="is-error">*</span>
        @endif
    </label>
    <textarea class="form-input" rows="{{ $rows }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
<<<<<<< HEAD
        name="{{ $name }}" {{ $required ? 'required' : '' }}> {{ old($name, $value) }}</textarea>
=======
        name="{{ $name }}" value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }}></textarea>
>>>>>>> 9053a7a6d95d4db3cafec68e7a30b50a14f9ac66
    @error($name)
        <small class="text-red-600 text-xs mt-1">{{ $message }}</small>
    @enderror
</div>
