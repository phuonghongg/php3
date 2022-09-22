<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Đăng kí</title>
  <link rel="stylesheet" href="login.css">

</head>
<body>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
           <H1>ĐĂNG KÍ THÀNH VIÊN</H1>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-field">
                {{-- <x-label for="name" :value="__('Name')" /> --}}

                <x-input id="name" placeholder="Tên người dùng" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="form-field">
                {{-- <x-label for="email" :value="__('Email')" /> --}}

                <x-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="form-field">
                {{-- <x-label for="password" :value="__('Password')" /> --}}

                <x-input id="password" placeholder="Mật khẩu" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-field">
                {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

                <x-input id="password_confirmation" placeholder="Nhập lại mật khẩu" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="form-field">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Bạn đã có tài khoản?') }}
                </a>

                <x-button class="btn">
                    {{ __('Đăng kí') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
</body>
</html>

