<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ __('Admin Login') }}</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/admin/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/demo.min.css') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }


        /* show password icon */
        .password-wrapper {
            position: relative;
            width: 300px;
        }

        .password-wrapper input {
            width: 100%;
            padding: 10px 40px 10px 10px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
            font-size: 18px;
            color: #888;
        }

        .toggle-password:hover {
            color: #000;
        }
    </style>


</head>

<body class=" d-flex flex-column">
    <script src="{{ asset('assets/admin/js/demo-theme.min.js') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                {{-- Alert Status--}}
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">{{ __('Login to your account') }}</h2>
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="email">{{ __('Email address') }}</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="your@email.com" value="{{ old('email') }}" required>

                            @error('email')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror

                        </div>


                        <div class="mb-2">
                            <label class="form-label">
                                Password
                                <span class="form-label-description">
                                    @if (Route::has('admin.password.request'))
                                        <a
                                            href="{{ route('admin.password.request') }}">{{ __('I forgot password') }}</a>
                                    @endif
                                </span>
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Your password" autocomplete="off" required>
                                <span class="toggle-password" id="toggle" title="Show Password">👁️</span>

                            </div>

                            @error('password')
                                <span class="text-danger d-block"> {{ $message }} </span>
                            @enderror

                        </div>
                        <div class="mb-2">
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember" />
                                <span class="form-check-label">{{ __('Remember me on this device') }}</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('assets/admin/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/demo.min.js') }}" defer></script>
</body>

</html>

{{-- show password icon --}}
<script>
    const password = document.getElementById("password");
    const toggle = document.getElementById("toggle");

    toggle.addEventListener("click", () => {
        const isPassword = password.type === "password";
        password.type = isPassword ? "text" : "password";
        toggle.textContent = isPassword ? "🙈" : "👁️";
    });
</script>
