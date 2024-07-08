<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Register Patient') }}
    </h2>
    <a href="{{route('home')}}" class="block h-10 rounded-lg bg-red-100 p-3 text-sm font-semibold text-red-600">{{ __('Back') }}</a>
   </x-slot>

  <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 py-6">
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900">
        <form method="POST" class="grid grid-cols-1 md:grid-cols-2 md:gap-6" action="{{ route('home.store') }}">
          @csrf
            <div>
              <x-inputs.text name="nik" :placeholder="_('NIK')" :label="_('NIK')" label-required />
              <x-inputs.text name="bpjs_number" :placeholder="_('BPJS Number')" :label="_('BPJS Number')" label-required />
              <x-inputs.text name="full_name" :placeholder="_('Full Name')" :label="_('Full Name')" label-required />
              <x-inputs.text name="place_of_birth" :placeholder="_('Place of Birth')" :label="_('Place of Birth')" label-required />
              <x-inputs.text name="date_of_birth" :placeholder="_('Date of Birth')" :label="_('Date of Birth')" type="date" label-required />
              <x-inputs.select name="gender" :placeholder="_('Gender')" :label="_('Gender')" label-required>
                <option value="male" @if (old('gender') === 'male') selected @endif>
                  {{ __('Male') }}
                </option>
                <option value="female" @if (old('gender') === 'female') selected @endif>
                  {{ __('Female') }}
                </option>
              </x-inputs.select>
              <x-inputs.select name="doctor_id" :placeholder="_('Doctor')" :label="_('Doctor')" label-required>
                <option value="" disabled @empty (old('doctor_id')) selected @endempty>
                  {{ __('Select') }}
                </option>
                @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id }}" @if (old('doctor_id') == $doctor->id) selected @endif>
                    {{ $doctor->name }} ({{__($doctor->specialization)}})
                  </option>
                @endforeach
              </x-inputs.select>
              <x-inputs.select name="blood_type" :placeholder="_('Blood type')" :label="_('Blood type')" label-required>
                @foreach (['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'] as $item)
                  <option value="{{ $item }}" @if (old('blood_type') === $item) selected @endif>
                    {{ $item }}
                  </option>
                @endforeach
              </x-inputs.select>
              <x-inputs.textarea name="address" :placeholder="_('Address')" :label="_('Address')" />
              <x-inputs.text name="phone" :placeholder="_('Phone')" :label="_('Phone')" />
            </div>
            <div>
              <x-inputs.textarea name="notes" rows="10" :placeholder="_('Notes')" :label="_('Notes')" />
              <x-inputs.textarea name="recipe" rows="10" :placeholder="_('Recipe')" :label="_('Recipe')" />
              <x-inputs.button class="w-24" :value="__('Submit')" />
            </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
