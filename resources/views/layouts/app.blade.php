<x-root-layout>
  @include('layouts.navigation')

  <!-- Page Heading -->
  @isset($header)
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl flex justify-between items-center px-4 py-6 sm:px-6 lg:px-8">
        {{ $header }}
      </div>
    </header>
  @endisset

  <!-- Page Content -->
  <main>
    {{ $slot }}
  </main>
</x-root-layout>
