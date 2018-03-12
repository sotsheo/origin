<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{  asset('bower_components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{  asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{  asset('css/style.css')}}">
  </head>
</head>
<body style="background: none">

    <form class="form-signin">
      <div class="text-center mb-4">     
        <h1 class="h3 mb-3 font-weight-normal">Registration</h1>     
         
      </div>

      <div class="form-label-group">
        <label for="inputEmail">Email address</label>  
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">
        <label>Account</label>
      </div>
       <div class="form-label-group">
        <input type="text"  class="form-control" placeholder="Email Acount" required="" name="account">
        <label for="inputEmail">Password</label>
      </div>

      <div class="form-label-group">
        <input type="password"  class="form-control" placeholder="Password" required="" name="password">
        <label >Age</label>
      </div>
       <div class="form-label-group">
        <input type="number"  class="form-control" placeholder="Age" required="" name="Age">
        <label>Phone</label>
      </div>
       <div class="form-label-group">
        <input type="number"  class="form-control" placeholder="Phone" required="" name="Phone">
        <label >Link face</label>
      </div>
       <div class="form-label-group">
        <input type="text"  class="form-control" placeholder="Linkface" required="" name="linkface">
       
      </div>

      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng kí</button>
      
      <p class="mt-5 mb-3 text-muted text-center">© 2017-2018</p>
    </form>
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</body>
</html>