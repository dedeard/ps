@props([
    'head' => '',
    'script' => '',
])

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="turbo-cache-control" content="no-cache" />
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  {{ $head }}
  @vite(['resources/fonts/feather/feather.css', 'resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data class="bg-gray-100 text-gray-700">
  <x-ui.alert />

  <div class="min-h-screen">
    {{ $slot }}
  </div>

  {{ $script }}
</body>

</html>
