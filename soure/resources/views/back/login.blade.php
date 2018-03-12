<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link href="{{  asset('bower_components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{  asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href=" {{ asset('css/style.css') }}">
  </head>
</head>
<body style="background: none">

    <form class="form-signin" action="{{ route('admin_action') }}" method="post">
      <div class="text-center mb-4">     
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>       
      </div>

      <div class="form-label-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
        <label for="inputPassword">Password</label>
      </div>

      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <a class="btn btn-lg btn-secondary btn-block" href="registration.php">Đăng kí</a>
      <p class="mt-5 mb-3 text-muted text-center">© 2017-2018</p>
    </form>
  
  <script src="{{  asset('js/jquery.js')}}"></script>
    <script src="{{  asset('js/bootstrap.min.js')}}"></script>

</body>
</html>