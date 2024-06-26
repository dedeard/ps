@props([
    'name' => '',
    'label' => '',
    'help' => '',
    'error' => $errors->first($name),
    'labelRequired' => false,
])

<x-inputs.wrapper label="{{ $label }}" for="{{ $name }}" label-required="{{ $labelRequired }}">
  <select
    {{ $attributes->merge([
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => ($error ? ' border-red-600' : '') . 'block w-full flex-1 rounded border border-gray-200 placeholder:text-gray-500',
    ]) }}>{{ $slot }}</select>

  @if ($error)
    <span class="block text-xs text-red-900">{{ $error }}</span>
  @elseif($help)
    <span class="block text-xs">{{ $help }}</span>
  @endif
</x-inputs.wrapper>
