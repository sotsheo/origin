<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
   <link rel="stylesheet" type="text/css" href="{{  asset('css/style.css')}}">
  </head>
  <body>
  	
  		
  	
    <header>
     <nav class="site-header sticky-top py-1 ">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="{{ url('/') }}">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
        </a>
        <?php
       
        
        
        if(Auth::guard("client")->check()):?>
           <div class='fb-login-button' data-max-rows='1' data-size='large' data-button-type='continue_with' data-show-faces='false' data-auto-logout-link='false' data-use-continue-as='false'></div>   
                <ul class='nav nav-pills'>
              
              <li class='nav-item dropdown'>
               <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class='fa fa-user'>(<?php echo(Auth::guard("client")->user()["money"])?>VND)</i></a>
                <div class='dropdown-menu'>
                  <a class='dropdown-item' href='{{ url('recharge') }}'><i class='fa fa-cc-mastercard'></i>  Nạp tiền</a>
                  <a class='dropdown-item' href='{{ url('history') }}'><i class='fa fa-shopping-cart'></i> Lịch sử</a>
                  <a class='dropdown-item' href='{{ url('history') }}'><i class='fa fa-reply-all'></i>  Logout</a>
                
                </div>
            </ul>
        </div>
         <?php 
          endif;
         if(!Auth::guard("client")->check()):?>
          <a class='btn btn-outline-secondary' href='{{ url('login') }}'>Login</a>
         <?php endif;?>
    </nav>
    </header>

    <main role="main">

      <section class="text-center">
        <div class="container py-2">
        	<div class="row">
	        	<div class="col-md-7">
	        		<iframe width="100%" height="315" src="https://www.youtube.com/embed/H6XsLMCcUUs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	        	</div>	        	
	        	<div class="col-md-5 p-lg-5 ">
				        <p class="lead font-weight-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple's marketing pages.</p>
				        <a class="btn btn-outline-secondary" href="#">Coming soon</a>
	        	</div>
          	</div>
        </div>
      </section>
      <!--Menu main-->
      <div class="main">
      		 <div class="container py-1">
      		 	<div class="row">
	      		 	<div class="col-md-2 py-1">
		        		<a class="btn btn-info" href="{{ url('/') }}">Sẵn sàng (<?php 
                  $i=0; 
                  foreach ($ready as $key => $value) {
                   $i++;
                  }
                echo $i;?>)</a>
		        	</div>	
		        	<div class="col-md-2 py-1">
		        		<a class="btn btn-info" href="{{ url('acc_close') }}">Đang thuê (<?php 
                  $i=0; 
                  foreach ($closes as $key => $value) {
                   $i++;
                  }
                 echo $i;?>)</a>
		        	</div>	
		        </div>
      		 </div>
      </div>

      <div class="album py-1">
        <div class="container">

          <div class="row">
            <?php 
              foreach ($close as $key => $value):
                $time_date=date('Y-m-d H:i:s');
                $time_close=$value->time_close;
                if((strtotime($time_close)-strtotime($time_date))>0 ):
            ?>
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="img-thumbnail" src="img/pubg.jpg" data-holder-rendered="true">
                 	<div class="card-body">
                 		<p style="display: none;">Thời gian hết hạn :<span class="time_read">{{$value->time_close}}</span></p>
                    <p >Thời gian còn lại :<span class="countdown"></span></p>
  				    
  				    </div>
                  
                </div>

              </div>

          <?php endif; endforeach;?>
           
               
                
              </div>
            </div>

          </div>

        </div>

      </div>
     
    </main>

		    <div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			      <div class="modal-body">
			         <img class="card-img-top" src="img/pubg.jpg" data-holder-rendered="true">
			         <h1 id="id_product"></h1>
			         <div class="alert alert-info" role="alert">Bạn có chắc thuê tài khoản này với giá <strong id="time"></strong></div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Thuê</button>
			      </div>
			    </div>

			  </div>

			</div>
	 <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Design And Implementation By Thanh</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
         
      </footer>
    <!-- Optional JavaScript -->
 
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script type="text/javascript">
    var mang=[];

      $(".time_read").each(function(index){
        mang[index]=new Date($(this).text());
        
      });

     var now = new Date().getTime();
      
      // Find the distance between now an the count down date
      
      //Sat Feb 03 2018 20:20:06 GMT+0700 (SE Asia Standard Time)
      //Fri Mar 02 2018 19:17:36 GMT+0700 (SE Asia Standard Time)
    // Update the count down every 1 second
    var x = setInterval(function() {
      $(".countdown").each(function(index){
        var now = new Date().getTime();

      // Find the distance between now an the count down date
        var distance = mang[index] - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        $(this).html(days + "d " + hours + "h "
         + minutes + "m "+ seconds + "s ");

        // If the count down is finished, write some text 
        if (distance < 0) {
          clearInterval(x);
        
         $(".countdown").html("EXPIRED");
        }
      });
      // Get todays date and time
      
    }, 1000);
    </script>
  </body>
</html>