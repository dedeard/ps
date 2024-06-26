@props(['value'])

<label {{ $attributes->merge(['class' => ' font-medium block text-sm text-gray-700']) }}>
  {{ $value ?? $slot }}
</label>
