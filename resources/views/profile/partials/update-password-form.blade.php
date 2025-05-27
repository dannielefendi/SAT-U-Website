{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <br>
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}


<section>
    <header>
        <h2 style="font-size: 1.125rem; font-weight: 500; color: #212529;">
            {{ __('Update Password') }}
        </h2>
        <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #6c757d;">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" style="margin-top: 1.5rem;">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <input
                type="password"
                class="form-control"
                id="update_password_current_password"
                name="current_password"
                autocomplete="current-password"
            >
            @if ($errors->updatePassword->has('current_password'))
                <div class="text-danger mt-1" style="font-size: 0.875rem;">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <input
                type="password"
                class="form-control"
                id="update_password_password"
                name="password"
                autocomplete="new-password"
            >
            @if ($errors->updatePassword->has('password'))
                <div class="text-danger mt-1" style="font-size: 0.875rem;">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
            <input
                type="password"
                class="form-control"
                id="update_password_password_confirmation"
                name="password_confirmation"
                autocomplete="new-password"
            >
            @if ($errors->updatePassword->has('password_confirmation'))
                <div class="text-danger mt-1" style="font-size: 0.875rem;">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <span class="text-muted" style="font-size: 0.875rem;">
                    {{ __('Saved.') }}
                </span>
            @endif
        </div>
    </form>
</section>
