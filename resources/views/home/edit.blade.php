<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      Edit Pasien
    </h2>
    <a href="{{ route('home') }}" class="block h-10 rounded-lg bg-red-100 p-3 text-sm font-semibold text-red-600">{{ __('Back') }}</a>
  </x-slot>

  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        <form method="POST" class="grid grid-cols-1 md:grid-cols-2 md:gap-6" action="{{ route('home.update', $patient->id) }}">
          @csrf
          @method('PUT')
          <div>
            <x-inputs.text name="nik" :value="$patient->nik" :placeholder="__('NIK')" :label="__('NIK')" label-required />
            <x-inputs.text name="bpjs_number" :value="$patient->bpjs_number" :placeholder="__('BPJS Number')" :label="__('BPJS Number')" />
            <x-inputs.text name="full_name" :value="$patient->full_name" :placeholder="__('Full Name')" :label="__('Full Name')" label-required />
            <x-inputs.text name="place_of_birth" :value="$patient->place_of_birth" :placeholder="__('Place of Birth')" :label="__('Place of Birth')" label-required />
            <x-inputs.text name="date_of_birth" :value="$patient->date_of_birth" :placeholder="__('Date of Birth')" :label="__('Date of Birth')" type="date" label-required />
            <x-inputs.select name="gender" :placeholder="__('Gender')" :label="__('Gender')" label-required>
              <option value="male" @if (old('gender', $patient->gender) === 'male') selected @endif>
                {{ __('Male') }}
              </option>
              <option value="female" @if (old('gender', $patient->gender) === 'female') selected @endif>
                {{ __('Female') }}
              </option>
            </x-inputs.select>
            <x-inputs.select name="doctor_id" :placeholder="__('Doctor')" :label="__('Doctor')" label-required>
              @foreach ($doctors as $doctor)
                <option value="{{ $doctor->id }}" @if (old('doctor_id', $patient->doctor->id) == $doctor->id) selected @endif>
                  {{ $doctor->name }} ({{ __($doctor->specialization) }})
                </option>
              @endforeach
            </x-inputs.select>
            <x-inputs.select name="blood_type" :placeholder="__('Blood type')" :label="__('Blood type')" label-required>
              @foreach (['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'] as $item)
                <option value="{{ $item }}" @if (old('blood_type', $patient->blood_type) === $item) selected @endif>
                  {{ $item }}
                </option>
              @endforeach
            </x-inputs.select>
            <x-inputs.textarea name="address" :value="$patient->address" :placeholder="__('Address')" :label="__('Address')" />
            <x-inputs.text name="phone" :value="$patient->phone" :placeholder="__('Phone')" :label="__('Phone')" />
          </div>
          <div>
            <x-inputs.textarea name="notes" :value="$patient->notes" rows="10" :placeholder="__('Notes')" :label="__('Notes')" />
            <x-inputs.textarea name="recipe" :value="$patient->recipe" rows="10" :placeholder="__('Recipe')" :label="__('Recipe')" />

            <x-inputs.therapeutic :data="$fornes" />
            <x-inputs.button class="w-24" :value="__('Submit')" />
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
