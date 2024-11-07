@props([
    'label' => 'Submit',
    'form' => null,
])

<button type="submit" form="{{ $form }}" class="inline-block rounded-full py-2 px-10 bg-yellow mt-6 text-lg">{{ $label }}</button>
