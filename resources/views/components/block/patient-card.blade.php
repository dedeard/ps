@props(['patient'])

<div class="flex flex-col gap-3 rounded-lg bg-white p-3 shadow">
  <div class="flex flex-col">
    <div class="flex">

      <div class="flex flex-1 gap-4">
        <div class="flex flex-1 flex-col gap-1">
          <span class="block text-2xl font-semibold uppercase text-primary-600">{{ $patient->full_name }}</span>
          <span class="flex gap-3 whitespace-nowrap text-sm">
            <span class="block">{{ $patient->address }}</span>
            <span class="block">{{ $patient->nik }}</span>
            <span class="block">{{ __($patient->gender) }}</span>
          </span>
          <div class="flex">
            <span class="block rounded border bg-gray-100 px-1">
              {{ $patient->doctor->name }}
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
        @if ($patient->status == 1)
          @if (Auth::user()->doctor)
            <a href="{{ route('home.verify', $patient->id) }}"
              class="block h-10 rounded-lg bg-primary-600 p-3 text-sm font-semibold text-white">{{ __('Verify') }}</a>
          @endif
        @elseif($patient->status == 2)
          @if (Auth::user()->doctor)
            <a href="{{ route('home.submit', $patient->id) }}"
              class="block h-10 rounded-lg bg-primary-600 p-3 text-sm font-semibold text-white">Kirim Data</a>
          @endif
        @elseif($patient->status == 3)
          @if (Auth::user()->pharmacy)
            <a href="{{ route('home.give', $patient->id) }}"
              class="block h-10 rounded-lg bg-primary-600 p-3 text-sm font-semibold text-white">Berikan Obat</a>
          @endif
        @else
          Selesai
        @endif
        @if (Auth::user()->doctor)
          <a href="{{ route('home.edit', $patient->id) }}"
            class="block h-10 rounded-lg bg-primary-600 p-3 text-sm font-semibold text-white">Edit</a>
        @endif
        <a href="{{ route('home.show', $patient->id) }}"
          class="block h-10 rounded-lg bg-primary-100 p-3 text-sm font-semibold text-primary-600">{{ __('Detail') }}</a>
      </div>
    </div>
  </div>
  <div>
    <table class="table-border table w-full text-left">
      <tr class="border">
        <th class="border">kelas terapi</th>
        <th class="border">sub kelas terapi</th>
        <th class="border">sub kelas terapi 2</th>
        <th class="border">sub kelas terapi 3</th>
      </tr>
      <tr class="border">
        <td class="border">{{ $patient->kelas_terapi }}</td>
        <td class="border">{{ $patient->sub_kelas_terapi }}</td>
        <td class="border">{{ $patient->sub_sub_kelas_terapi }}</td>
        <td class="border">{{ $patient->sub_sub_sub_kelas_terapi }}</td>
      </tr>
    </table>
  </div>
</div>
