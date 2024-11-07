@props(['name', 'label', 'type' => 'text', 'placeholder' => null, 'checked' => false])
<div class="flex items-center">
    <input @checked($checked) type="checkbox" name="{{ $name }}" id="{{ $name }}" class="border border-slate-700 py-2 pl-4 text-gray-900 placeholder:text-gray-400 " placeholder="{{ $placeholder }}">
    <label for="{{ $name }}" class="text-sm ml-2">
        {{ $label }} @if($attributes['required'] ?? false) * @endif
    </label>
</div>