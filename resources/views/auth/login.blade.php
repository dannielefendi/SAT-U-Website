<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>Login Page</title>

    <link href="{{asset('admin_asset/css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back!</h1>
                        <p class="lead">Sign in to your account to continue</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
                                        @if ($errors->has('email'))
                                            <div class="text-danger mt-2">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input id="password" class="form-control form-control-lg" type="password" name="password" required placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <div class="text-danger mt-2">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Remember Me -->
                                    <div>
                                        <div class="form-check align-items-center">
                                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                            <label class="form-check-label text-small" for="remember_me">Remember me</label>
                                        </div>
                                    </div>

                                    <!-- Login Button -->
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                    </div>

                                    <!-- Links -->
                                    <div class="d-flex justify-content-between mt-3">
                                        @if (Route::has('password.request'))
                                            <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">Forgot your password?</a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        Don’t have an account? <a href="{{ route('register') }}">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{asset('admin_asset/js/app.js')}}"></script>
</body>

</html>
