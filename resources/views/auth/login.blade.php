
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <h1>ĐĂNG NHẬP</h1>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="form-field">

            <input type="email" id="email" placeholder="Email"   name="email" :value="old('email')" autofocus
            />
        </div>
        @error('email')
                <p class="text-danger">
                    {{$message}}
                </p>
        @enderror
        {{-- <x-label for="password" :value="__('Password')" /> --}}
      <div class="form-field">
        <input type="password" placeholder="Password"id="password" name="password" />
        
    </div>
    @error('password')
                <p class="text-danger">
                    {{$message}}
                </p>
        @enderror
      <div class="form-field">
        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
        <x-button class="btn">
            {{ __('Log in') }}
        </x-button>
      </div>
      </form>

    </x-auth-card>
</x-guest-layout>

</body>
</html>

