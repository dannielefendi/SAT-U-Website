{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
            <input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            />
            @error('name')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror --}}

            {{-- <x-input-label for="name" :value="__('Name')" /> --}}
            {{-- <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
        {{-- </div>

        <div>
            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
            <input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            />
            @error('email')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror --}}
            {{-- <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" /> --}}

            {{-- @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <br>
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white text-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                {{ __('Save') }}
            </button> --}}
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

            {{-- @if (session('status') === 'profile-updated')
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
            {{ __('Profile Information') }}
        </h2>
        <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #6c757d;">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" style="margin-top: 1.5rem;">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >
            @error('name')
                <div class="text-danger mt-1" style="font-size: 0.875rem;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >
            @error('email')
                <div class="text-danger mt-1" style="font-size: 0.875rem;">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p style="font-size: 0.875rem; color: #212529;">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" type="submit" class="btn btn-link p-0 align-baseline" style="font-size: 0.875rem;">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <div class="text-success" style="font-size: 0.875rem;">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p class="text-muted mb-0" style="font-size: 0.875rem;">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>

