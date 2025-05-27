<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Forgot Password Page">
    <meta name="author" content="Your Application">

    <title>Forgot Password</title>

    <!-- Styles -->
    <link href="{{asset('admin_asset/css/app.css')}}" rel="stylesheet" />
</head>

<body>
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Forgot your password?</h1>
                        <p class="lead">
                            No problem. Just let us know your email address, and we will email you a
                            password reset link that will allow you to choose a new one.
                        </p>
                    </div>

                    <!-- Feedback Status -->
                    <div id="session-status" class="alert alert-success" style="display: none;">
                        <!-- Use JavaScript or backend rendering to populate this -->
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="/password/email">
                                <!-- Include a CSRF Token -->
                                <input type="hidden" name="_token" value="<!-- Add CSRF Token Here -->">

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" class="form-control form-control-lg" type="email" name="email" required autofocus placeholder="Enter your email">
                                    <div id="email-error" class="text-danger mt-2">
                                        <!-- Use JavaScript or backend rendering to show email errors -->
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Email Password Reset Link</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="/login">Back to Login</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="{{asset('admin_asset/js/app.js')}}"></script>
</body>

</html>
