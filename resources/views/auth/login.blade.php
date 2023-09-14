@section('page-title')
    {{ 'লগইন' }}
@endsection
<x-guest-layout>
    <div class="container min-h-screen flex justify-center items-center bg-white dark:bg-gray-800 px-6 py-4">
        <div class="w-full flex flex-wrap bg-gray-100 dark:bg-gray-900 px-4 py-8 border border-indigo-400 rounded">
            <div class="sm:w-3/5 flex justify-center items-center"
                style="background-image: url('https://i.ibb.co/5Kqct6V/nic-rosenau-J-gal-Duu4kc-unsplash-1.jpg)');background-size: cover;background-position: top left;">
                <div class="text-md h-full w-full bg-gray-800 bg-opacity-70 flex flex-col justify-center items-center">
                    <div class="block text-green-500 mb-2 text-3xl text-gray-dark uppercase font-bold">Login
                    </div>
                    <div class="block text-green-200 text-1xl w-full text-center font-semibold">
                        {{ get_settings('site_title') }}
                    </div>
                </div>
            </div>
            {{-- <div class="w-full sm:w-1/5"></div> --}}
            <div class="px-2 w-full sm:w-2/5">

                <x-authentication-card>

                    <x-slot name="logo">
                        <x-authentication-card-logo />
                    </x-slot>

                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span
                                    class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="ml-4">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>


                </x-authentication-card>

            </div>
        </div>
    </div>
</x-guest-layout>
