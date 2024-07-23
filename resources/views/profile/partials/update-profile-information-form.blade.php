<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Profile Information') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __("Update your account's profile information and email address.") }}
    </p>
  </header>

  <form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
  </form>

  <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-3">
    @csrf
    @method('patch')

    <x-inputs.wrapper :label="__('Name')">
      <x-inputs.text name="name" :placeholder="__('Name')" :value="Auth::user()->name" />
    </x-inputs.wrapper>

    <x-inputs.wrapper :label="__('Email')">
      <x-inputs.text name="email" :placeholder="__('Email')" :value="Auth::user()->email" />
    </x-inputs.wrapper>

    <x-inputs.button :value="__('Save')" class="w-24" />
  </form>
</section>
