<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color:#646664">
    <div class="container">
    @include('menu')
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="contaner-form m-auto " style="max-width: 500px; padding: 10px">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="card-body p-5">
                                <h1 style="text-align: center; margin:20px 0;">SIGN IN</h1>
                                <form>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="form2Example1" class="form-control" />
                                    <label class="form-label" for="form2Example1">Email address</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="form2Example2" class="form-control" />
                                    <label class="form-label" for="form2Example2">Password</label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                                    </div>
                                    </div>

                                    <div class="col">
                                    <!-- Simple link -->
                                    <a class="text-body" href="#!">Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-success btn-block btn-lg text-body" style="margin: auto">Sign in</button>
                                </div>
                                <!-- Register buttons -->
                                <div class="text-center mt-4">
                                    <p>Not a member? <a class="text-body"href="/signup">Register</a></p>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </section>
</body>
</html>