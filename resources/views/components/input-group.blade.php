<div>
    <label class="form-label">{{ $label }} @if ($required)
            <span class="is-error">*</span>
        @endif
    </label>
    <div class="flex rounded-lg shadow-sm">
        <span class="form-group-label">{{ $textGroup }}</span>
        <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}"
            placeholder="{{ $placeholder }}" required{{ $required ? 'required' : '' }} class="form-group">
    </div>
</div>
