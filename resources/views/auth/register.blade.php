<x-auth-layout title="Buat akun baru">
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <x-auth.input name="name" label="Nama" autofocus />
    <x-auth.input name="email" label="Alamat Email" />
    <x-auth.input type="password" name="password" label="Password" />
    <div class="py-3 text-center">
      <x-auth.button value="Daftar" />
    </div>
  </form>
</x-auth-layout>
