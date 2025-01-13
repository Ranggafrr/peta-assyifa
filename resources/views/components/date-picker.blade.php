 <label class="form-label">{{ $label }} @if ($required)
         <span class="text-red-600">*</span>
     @endif
 </label>
 <input type="text" placeholder="{{ $placeholder }}" id="input-{{ $name }}" name="{{ $name }}"
     value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }}
     class="form-input @error($name) is-error @enderror">
 <!-- Menampilkan pesan error jika ada -->
 @error($name)
     <small class="text-red-600 text-xs mt-1">{{ $message }}</small>
 @enderror

 <script>
     $(document).ready(() => {
         config = {
             altInput: true,
             altFormat: "j F Y",
             dateFormat: "Y-m-d",
             locale: 'id',
             disableMobile: "true"
         }
         flatpickr("#input-{{ $name }}", config);
     })
 </script>
