<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USD - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('loginregister/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
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
 }
 .small{
    color: #000000;    
 }
</style>

</head>

<body style="background-image: url('loginregister/img/bg_login.jpg');">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div align="bottom" class="col-lg-5 "><center><br><br><br><br><img src="{{asset('loginregister/img/logo_usd.jpg')}}" width="290" alt=""></center></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><b>CREATE ACCOUNT USD</b></h1>
                            </div>
                            <form class="user" action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" value="{{ old('name') }}" id="exampleFirstName"
                                            placeholder="Full Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input name="nim" type="text" class="form-control form-control-user @error('nim') is-invalid @enderror" value="{{ old('nim') }}" id="exampleFirstNim"
                                            placeholder="NIM">
                                        @error('nim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input name="batch" type="text" class="form-control form-control-user @error('nim') is-invalid @enderror" value="{{ old('batch') }}" id="exampleFirstBatch"
                                            placeholder="Batch USD (ex : 2019)">
                                        @error('batch')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="hidden" name="levelUser" id='level' value="user" >
                                    <input type="hidden" name="category" id='category' value="active" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="phone" type="text" class="form-control form-control-user @error('phone') is-invalid @enderror" value="{{ old('phone') }}" id="exampleInputPhone"
                                        placeholder="Phone Number">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" id="exampleInputEmail"
                                        placeholder="Email Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user  @error('password') is-invalid @enderror"
                                            id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror   
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="password confirmation" type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror 
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('password.request')}}">Forgot Password?</a>
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

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('loginregister/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('loginregister/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('loginregister/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('loginregister/js/sb-admin-2.min.js')}}"></script>

</body>

</html>