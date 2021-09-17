<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="{{asset('img/icons/icon-48x48.png')}}" />

    <title>Sign In |AdminKit Laravel</title>

    <link href="{{asset('css/master.css')}}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
</head>

<body class="loginpage">
    <main class="main-login">
        <div class="container-fluid p-0">
            <div class="row gx-0">
                <div class="col-sm-8 col-xs-12">
                    <div class="secretarybanner">
                        <img src="{{asset('img/login-bg.jpg')}}" alt="Login Banner" class="img-fluid">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="login-section">

                        <div class="mt-4">
                            <h1>Secretary</h1>
                            <p class="lead">
                                Please Enter Your Login Details.
                            </p>
                        </div>

                         <form method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="mb-3">

                                            <!-- <label class="form-label">Email</label> -->
                                            <div class="input-group mb-2 mr-sm-2">
                                                <input class="form-control form-control-lg inputstyle" type="email" name="email" placeholder="User name" value="{{ old('email', null) }}" autofocus/>
                                                @if($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <!-- <label class="form-label">Password</label> -->
                                            <div class="input-group mb-2 mr-sm-2">
                                                <input class="form-control form-control-lg inputstyle" type="password" name="password" placeholder="Password" />
                                                @if($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password') }}
                                                </div>
                                                @endif
                                            </div>
                                            <small>
                                                <a href="{{ route('password.request') }}">Forgot password?</a>
                                            </small>
                                        </div>
                                        <!-- <div>
                                            <label class="form-check">
                                                <input class="form-check-input" type="checkbox" value="remember" name="remember" checked>
                                                <span class="form-check-label">
                                                  Remember me
                                              </span>
                                          </label>
                                      </div> -->
                                      <div class="loginbtn mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary">Login</button>
                                    </div>
                                </form>

                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>