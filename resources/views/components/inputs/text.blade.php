@props([
    'name' => '',
    'label' => '',
    'value' => '',
    'help' => '',
    'error' => $errors->first($name),
    'labelRequired' => false,
])

<x-inputs.wrapper label="{{ $label }}" for="{{ $name }}" label-required="{{ $labelRequired }}">
  <input
    {{ $attributes->merge([
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'value' => old($name, $value),
        'class' => ($error ? ' border-red-600' : '') . 'block w-full flex-1 border border-gray-200 rounded placeholder:text-gray-500',
    ]) }} />

  @if ($error)
    <span class="block text-xs text-red-900">{{ $error }}</span>
  @elseif($help)
    <span class="block text-xs">{{ $help }}</span>
  @endif
</x-inputs.wrapper>
