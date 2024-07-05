<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Patient List') }}
    </h2>
    <a href="{{route('home.create')}}" class="block h-10 rounded-lg bg-primary-100 p-3 text-sm font-semibold text-primary-600">{{ __('Create Patient') }}</a>
  </x-slot>

  <div class="mx-auto flex max-w-7xl flex-col gap-3 py-12 sm:px-6 lg:px-8">
    @foreach ($patients as $patient)
      <x-block.patient-card :patient="$patient" />
    @endforeach
  </div>
</x-app-layout>
