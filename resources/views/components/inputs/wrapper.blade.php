@props([
    'label' => '',
    'for' => '',
    'labelRequired' => false,
])

@if ($label === '')
  {{ $slot }}
@else
  <div {{ $attributes->merge(['class' => 'mb-3']) }}>
    <label @if ($for) for="{{ $for }}" @endif class="text-sm">{{ $label }}
      @if ($labelRequired)
        <span class="text-red-700">*</span>
      @endif
    </label>
    {{ $slot }}
  </div>
@endif
