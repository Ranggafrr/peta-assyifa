<div>
    <label class="form-label">{{ $label }} @if ($required)
            <span class="is-error">*</span>
        @endif
    </label>
    <input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ $name }}"
        value="{{ $value }}" required{{ $required ? 'required' : '' }} class="form-input">
</div>
