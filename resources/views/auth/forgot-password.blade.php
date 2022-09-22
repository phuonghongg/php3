<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Quên mật khẩu</title>
  <link rel="stylesheet" href="login.css">

</head>
<body>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
               <h1>Lấy lại mật khẩu</h1>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Nhập email của bạn tại đây, sau đó nhấn "Lấy lại mật khẩu", cuối cùng kiểm tra email của bạn') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-field">

                    <x-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="form-field">
                    <x-button class="btn">
                        {{ __('Reset mật khẩu') }}
                    </x-button>
                </div>
            </form>
        </x-auth-card>
    </x-guest-layout>


</body>
</html>

