<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Doctor List') }}
    </h2>
    <a href="{{ route('doctors.create') }}"
      class="block h-10 rounded-lg bg-primary-100 p-3 text-sm font-semibold text-primary-600">{{ __('Create Doctor') }}</a>
  </x-slot>

  <div class="mx-auto flex max-w-7xl flex-col gap-3 py-6 sm:px-6 lg:px-8">

    <div class="rounded-lg border bg-white">
      <table class="w-full table-fixed">
        <thead>
          <tr class="border-b">
            <th class="px-3 py-4 text-left">{{ __('Name') }}</th>
            <th class="px-3 py-4 text-left">{{ __('Specialization') }}</th>
            <th class="px-3 py-4 text-left">{{ __('Gender') }}</th>
            <th class="px-3 py-4 text-left">{{ __('Date of Birth') }}</th>
            <th class="px-3 py-4 text-left">{{ __('Phone') }}</th>
            <th class="px-3 py-4 text-left">{{ __('Address') }}</th>
            <th class="w-40 px-3 py-4 text-center">{{ __('Actions') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($doctors as $doctor)
            <tr class="odd:bg-gray-50">
              <td class="px-3 py-2 align-text-top">{{ $doctor->name }}</td>
              <td class="px-3 py-2 align-text-top">{{ $doctor->specialization }}</td>
              <td class="px-3 py-2 align-text-top">{{ $doctor->gender }}</td>
              <td class="px-3 py-2 align-text-top">{{ $doctor->date_of_birth->format('Y-m-d') }}</td>
              <td class="px-3 py-2 align-text-top">{{ $doctor->phone }}</td>
              <td class="px-3 py-2 align-text-top">{{ $doctor->address }}</td>
              <td class="px-3 py-2 text-center">
                <a href="{{ route('doctors.edit', $doctor->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                <button type="button" class="text-red-600 hover:text-red-900" x-data
                  x-on:click="$store.deleteConfirm(() => document.getElementById('delete-form-{{ $doctor->id }}').submit())">{{ __('Delete') }}</button>
                <form id="delete-form-{{ $doctor->id }}" action="{{ route('doctors.destroy', $doctor->id) }}" method="POST"
                  style="display:none;">
                  @csrf
                  @method('DELETE')
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>
