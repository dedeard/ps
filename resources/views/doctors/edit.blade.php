<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Edit Doctor') }}
    </h2>
    <a href="{{ route('doctors.index') }}"
      class="block h-10 rounded-lg bg-red-100 p-3 text-sm font-semibold text-red-600">{{ __('Back') }}</a>
  </x-slot>

  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        <form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
          @csrf
          @method('PUT')
          <x-inputs.text name="name" :value="old('name', $doctor->name)" :placeholder="__('Full Name')" :label="__('Full Name')" label-required />
          <x-inputs.select name="specialization" :placeholder="__('Specialization')" :label="__('Specialization')" label-required>
            @foreach ($specializations as $specialist)
              <option value="{{ $specialist }}" @if (old('specialization', $doctor->specialization) === $specialist) selected @endif>
                {{ $specialist }}
              </option>
            @endforeach
          </x-inputs.select>
          <x-inputs.select name="gender" :placeholder="__('Gender')" :label="__('Gender')" label-required>
            <option value="male" @if (old('gender', $doctor->gender) === 'male') selected @endif>
              {{ __('Male') }}
            </option>
            <option value="female" @if (old('gender', $doctor->gender) === 'female') selected @endif>
              {{ __('Female') }}
            </option>
          </x-inputs.select>
          <x-inputs.text name="date_of_birth" :value="old('date_of_birth', $doctor->date_of_birth->format('Y-m-d'))" :placeholder="__('Date of Birth')" :label="__('Date of Birth')" type="date" label-required />
          <x-inputs.text name="phone" :value="old('phone', $doctor->phone)" :placeholder="__('Phone')" :label="__('Phone')" />
          <x-inputs.textarea name="address" :value="old('address', $doctor->address)" :placeholder="__('Address')" :label="__('Address')" />
          <x-inputs.button class="w-24" :value="__('Update')" />
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
