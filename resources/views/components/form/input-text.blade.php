@props(['name', 'label', 'type' => 'text', 'placeholder' => null])
<div>
    <label for="{{ $name }}" class="block text-xs uppercase">
        {{ $label }} @if($attributes['required'] ?? false) * @endif
    </label>
    <div class="relative mt-1 rounded-md shadow-sm">
      <input type="text" name="{{ $name }}" id="{{ $name }}" 
        class="block w-full border border-slate-700 py-2 pl-4 text-gray-900 placeholder:text-gray-400 " placeholder="{{ $placeholder }}"
        value="{{ $attributes['value'] ?? '' }}" @if($attributes['required'] ?? false) required @endif
      >
    </div>
  </div>