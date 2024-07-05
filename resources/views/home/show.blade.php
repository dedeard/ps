<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Detail Patient') }}
    </h2>
    <a href="{{route('home')}}" class="block h-10 rounded-lg bg-red-100 p-3 text-sm font-semibold text-red-600">{{ __('Back') }}</a>
  </x-slot>

  <div class="mx-auto flex max-w-7xl flex-col gap-3 py-12 sm:px-6 lg:px-8">
    <div class="rounded-lg bg-white p-3 border-l-4 border-primary-600">
      <h2 class="block text-3xl mb-3 font-semibold uppercase text-primary-600">{{ $patient->full_name }}</h2>

      <div class="flex mb-3">
        <span class="rounded block border bg-gray-100 text-sm font-semibold p-1">
          Dr Dede ismail
        </span>
      </div>

      <div class="mb-3 text-lg flex gap-3">
        <span class="block">{{ $patient->address }}</span>
        <span class="block">{{ $patient->nik }}</span>
        <span class="block">{{ $patient->gender }}</span>
      </div>

      <div class="mb-3">
        <span class="block font-semibold">{{ __("doctor's note") }}</span>
        <p class="text-sm">{{ $patient->notes }}</p>
      </div>

      <div class="mb-3">
        <span class="block font-semibold">{{ __('Recipe') }}</span>
        <p class="text-sm">{{ $patient->recipe }}</p>
      </div>

    </div>
  </div>
</x-app-layout>
