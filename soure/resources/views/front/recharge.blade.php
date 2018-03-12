<!DOCTYPE html>
<html>
<head>
	<title>Recharge</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link href="{{  asset('bower_components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{  asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
   <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
</head>
<body style="background: none">

    <form class="form-signin">
      <div class="text-center mb-4">     
        <h1 class="h3 mb-3 font-weight-normal">Registration</h1>     
         
      </div>

      <div class="form-label-group">
        <label for="inputEmail">Chọn thẻ</label>  
       <select class="form-control" id="exampleFormControlSelect1">
              <option value="Viettel">Viettel</option>
              <option value="Mobiphone">Mobiphone</option>
              <option value="Vinaphone">Vinaphone</option>
              <option value="Gate">Gate</option>
        </select>
        <label>Số Seri</label>
      </div>
       <div class="form-label-group">
        <input type="text"  class="form-control" placeholder="Số Seri" required="" name="id">
        <label for="inputEmail">Mã thẻ</label>
      </div>    
       <div class="form-label-group py-2">
        <input type="text"  class="form-control" placeholder="Mã thẻ" required="" name="id_key">        
      </div>

      
      <button class="btn btn-lg btn-primary btn-block " type="submit">Nạp tiền</button >
      
      <p class="mt-5 mb-3 text-muted text-center">© 2017-2018</p>
    </form>
  
 <script src="{{  asset('js/jquery.js')}}"></script>
    <script src="{{  asset('js/bootstrap.min.js')}}"></script>

</body>
</html>