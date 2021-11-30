<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USD - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('loginregister/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        .form-control {
    display: block;
    width: 100%;
    height: calc(2.8em + .70rem + 2px);
    padding: 0.375rem .75rem;
    font-size: 0.8rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 50px;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
        .body{   
           color: #000000;
        }
        .btn{
           background-color: #7fe757;   
           color: #000000;
           display: block;
           width: 100%;
           height: calc(2.8em + .30rem + 2px);
           padding: 0.375rem .75rem;
           font-size: 0.8rem;
           font-weight: 400;
           line-height: 1.5;
           color: #000000;
           background-clip: padding-box;
           border-radius: 50px;
           transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .small{
           color: #000000;    
        }
       </style>
</head>

<body style="background-image: url('loginregister/img/bg_login.jpg');">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 "><br><center><img src="{{asset('loginregister/img/logo_usd.jpg')}}" width="290" alt=""></center></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                                <button type="submit" class="btn btn-user btn-block">
                                                    {{ __('Send Password Reset Link') }}
                                                </button>
                                            
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('register')}}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('loginregister/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('loginregister/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('loginregister/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('loginregister/js/sb-admin-2.min.js')}}"></script>

</body>

</html>