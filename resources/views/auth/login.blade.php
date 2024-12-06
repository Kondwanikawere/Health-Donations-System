<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <style>

    </style>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="min-h-screen flex items-center justify-center bg-gray-200  border-4 border-green-500">
    <div class="max-w-md w-full mx-auto p-8 bg-white rounded-lg shadow-lg">
        <!-- Logo Section -->
          <div class="text-2xl font-bold text-center">{{ __('Compassionlink') }}</div>

        <div class="flex justify-center mt-4 mb-4">
            <img src="{{ asset('storage/logo/logoo.PNG') }}" alt="Logo" class="h-24 w-24">
        </div>

        @if(@session('status'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <!-- Login Title -->

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="mt-1 block w-full px-3 py-2 border border-green-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="text-red-500 text-xs mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" class="mt-1 block w-full px-3 py-2 border border-green-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="text-red-500 text-xs mt-1" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4 flex items-center">
                <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="text-sm text-gray-600" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Login') }}
                </button>
            </div>
            @if (Route::has('password.request'))
            <div class="text-sm text-center">
                <a class="text-green-500 hover:text-green-700" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
            @endif
        </form>
    </div>
</div>
</body>
</html>
