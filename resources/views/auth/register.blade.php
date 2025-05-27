<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Register Page</title>

    <!-- Styles -->
    <link href="{{ asset('admin_asset/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Create Account</h1>
                        <p class="lead">Register to get started!</p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-3">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" class="form-control form-control-lg" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter your name">
                                        @if ($errors->has('name'))
                                            <div class="text-danger mt-2">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" class="form-control form-control-lg" type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
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

                                    <!-- Confirm Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input id="password_confirmation" class="form-control form-control-lg" type="password" name="password_confirmation" required placeholder="Confirm your password">
                                        @if ($errors->has('password_confirmation'))
                                            <div class="text-danger mt-2">
                                                {{ $errors->first('password_confirmation') }}
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Register Button -->
                                    <div class="d-grid gap-2 mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Create Account</button>
                                    </div>

                                    <!-- Already Registered Link -->
                                    <div class="text-center mt-3">
                                        Already registered?
                                        <a href="{{ route('login') }}" class="text-decoration-none text-primary">
                                            Login here
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="{{ asset('admin_asset/js/app.js') }}"></script>
</body>

</html>
