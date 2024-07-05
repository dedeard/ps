@props(['patient'])

<div class="flex gap-3 rounded-lg border bg-white p-3">
  <div class="flex flex-1 gap-4">
    <div class="flex flex-1 flex-col gap-1">
      <span class="block text-2xl font-semibold uppercase text-primary-600">{{ $patient->full_name }}</span>
      <span class="flex gap-3 whitespace-nowrap text-sm">
        <span class="block">{{ $patient->address }}</span>
        <span class="block">{{ $patient->nik }}</span>
        <span class="block">{{ $patient->gender }}</span>
      </span>
      <div class="flex">
        <span class="block rounded border bg-gray-100 px-1">
          Dr Dede ismail
        </span>
      </div>
    </div>
    <div class="w-1/3">
      <span class="block font-semibold">{{ __("doctor's note") }}</span>
      <p class="text-sm">{{ $patient->notes }}</p>
    </div>
    <div class="w-1/3">
      <span class="block font-semibold">{{ __('Recipe') }}</span>
      <p class="text-sm">{{ $patient->recipe }}</p>
    </div>
  </div>
  <div class="flex gap-2">
    <a href="#" class="block h-10 rounded-lg bg-primary-600 p-3 text-sm font-semibold text-white">{{ __('Verify') }}</a>
    <a href="{{route('home.show', $patient->id)}}" class="block h-10 rounded-lg bg-primary-100 p-3 text-sm font-semibold text-primary-600">{{ __('Detail') }}</a>
  </div>
</div>
