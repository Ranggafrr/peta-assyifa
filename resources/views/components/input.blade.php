 @switch($variant)
     @case('input-icon')
         <div class="relative w-1/4">
             <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                 <i data-lucide="{{ $icon }}" class="shrink-0 size-4 text-gray-400"></i>
             </div>
             <input name="{{ $name }}" oninput="this.form.submit()" 
                 class="py-2 ps-10 pe-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-0 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                 type="text"placeholder="Cari data..." value="{{ $value }}">
         </div>
     @break

     @default
         <label class="form-label">{{ $label }} @if ($required)
                 <span class="text-red-600">*</span>
             @endif
         </label>
         <input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ $name }}"
             value="{{ old($name, $value) }}" {{ $required ? 'required' : '' }}
             class="form-input @error($name) is-error @enderror" autocomplete="new-password">
         <!-- Menampilkan pesan error jika ada -->
         @error($name)
             <small class="text-red-600 text-xs mt-1">{{ $message }}</small>
         @enderror
 @endswitch
