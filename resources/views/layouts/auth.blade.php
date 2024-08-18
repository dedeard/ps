@props([
    'head' => '',
    'script' => '',
    'title' => config('app.name', 'Laravel'),
    'description' => config('app.description', 'The Laravel Framework.'),
])

<x-root-layout>
  <x-slot:head>
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    {!! $head !!}
  </x-slot:head>
  <x-slot:script>
    {!! $script !!}
  </x-slot:script>

  <header class="flex bg-white py-5 shadow">
    <a href="{{ route('home') }}" class="m-auto block text-lg font-semibold" aria-label="Home">
      {{ config('app.name') }}
    </a>
  </header>
  <main class="px-3 py-10 md:px-0">
    <div class="mx-auto max-w-xl border bg-white">
      <div class="flex">
        <a href="{{ route('login-doctor') }}"
          class="{{ Route::is('login-doctor') ? 'border-b-0 bg-transparent ' : 'bg-gray-100 ' }}flex h-14 flex-1 items-center justify-center border-b text-sm font-bold uppercase tracking-widest text-gray-700">
          Masuk Dokter
        </a>
        <div class="h-14 w-px bg-gray-200"></div>
        <a href="{{ route('login-pharmacy') }}"
          class="{{ Route::is('login-pharmacy') ? 'border-b-0 bg-transparent ' : 'bg-gray-100 ' }}flex h-14 flex-1 items-center justify-center border-b text-sm font-bold uppercase tracking-widest text-gray-700">
          Masuk Apotek
        </a>
      </div>
      <div class="px-10 pb-10">
        <h1 class="mb-8 mt-14 text-center text-4xl font-light text-gray-700">
          {{ $title }}
        </h1>
        {{ $slot }}
      </div>
    </div>
  </main>
  <footer class="pb-10 text-center text-gray-600">
    © {{ config('app.name') }} {{ now()->year }}
  </footer>
</x-root-layout>
