<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
      {{ __('Update Password') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600">
      {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>
  </header>

  <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('put')

    <x-inputs.wrapper :label="__('Current Password')">
      <x-inputs.text name="current_password" :placeholder="__('Current Password')" type="password" />
    </x-inputs.wrapper>

    <x-inputs.wrapper :label="__('New Password')">
      <x-inputs.text name="password" :placeholder="__('New Password')" type="password" />
    </x-inputs.wrapper>

    <x-inputs.wrapper :label="__('Confirm Password')">
      <x-inputs.text name="password_confirmation" :placeholder="__('Confirm Password')" type="password" />
    </x-inputs.wrapper>

    <x-inputs.button :value="__('Save')" class="w-24" />
  </form>
</section>
