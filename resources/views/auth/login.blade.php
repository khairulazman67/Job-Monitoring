<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="{{asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('assets/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login" style="background-color: #2A3F54">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                
                <section class="login_content mt-5">
                    <div class="card" style="width: 22rem;" style="margin: none">
                        <div class="card-body mt-5">
                            {{-- <h5 class="card-title">Login Form</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                            
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h1>Login Form</h1>
                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger" row="alert">
                                        {{session('loginError')}}
                                    </div>
                                @endif
                                <div>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required="" >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <button type="reset" class="btn btn-dark">cancel</button>
                                    <button type="submit" class="btn btn-primary">Log in</button>

                                </div>
                                <div class="clearfix"></div>

                                <div class="separator">
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>