<div>
    <label class="form-label">{{ $label }} @if ($required)
            <span class="is-error">*</span>
        @endif
    </label>
    <div class="flex rounded-lg shadow-sm">
        <span class="form-group-label">{{ $textGroup }}</span>
        <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} class="form-group">
        @error($name)
            <small class="text-red-600 text-xs mt-1">{{ $message }}</small>
        @enderror
    </div>
</div>
