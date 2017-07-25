<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3GX Hulugan| Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeIn">
        <div class="row">
            <h1><img class="animated flipInY" src="{{url('/img/login-logo-small.png')}}" alt="3GX Hulugan Logo"></h1>
            <br>
        </div>
        <div class="row">
            <h3>Log in. To see it in action.</h3>
        </div>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong><i class="fa fa-exclamation-triangle"></i> {{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class=" btn btn-primary block full-width m-b" data-style="zoom-in">Login</button>
                <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
            </form>
        <p class="m-t"> <small><strong>Copyright</strong> 3GX Computers and IT Solutions &copy; 2017</small> </p>
    </div>
    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
</body>
</html>
