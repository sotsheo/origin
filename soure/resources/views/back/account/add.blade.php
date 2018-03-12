<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{  asset('bower_components/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{  asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
	<link href="css/sb-admin-2.css" rel="stylesheet">
	<style type="text/css">
		
		.sidebar{
			padding-top: 30px;
			margin-top: 0px;
			height: 100%;
		}
		
		#side-menu li{
			width: 100%;
			padding: 10px;
		}
		
		#side-menu li a:hover{
			text-decoration: none;

		}
		.nav-second-level{
			display: none;
		}
		.fa{
			line-height: 20px;
		}
		
		.text h2{
			list-style: none;
			float: right;
		}
		.navbar-collapse img{
			padding: 10px;
		}
		.table{
			margin-top: 15rem;
		}
		.center{
			width: 50%;	
			margin-left: 10px;
			margin-top: 10rem;
		}
	</style>
</head>
<body>
	   
  @include('back.menu')



    <div class="col col-lg-10 text">
		    	 <h2 class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          <i class="fa fa-user fa-fw"></i>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="#">Logout</a>
			          
			       </div>
		      </h2>


      <form class="center" action="{{ route('add_account') }}" method="post">
		  <div class="form-group">
		    <div class="form-group ">
		    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		      <label for="Name">Name</label>
		      <input type="text" class="form-control" id="Name" placeholder="Name" name="name">
		    </div>
		   </div>
		   <div class="form-group">
		    <div class="form-group">
		      <label for="inputPassword4">Password</label>
		      <input type="text" class="form-control" id="inputPassword4" placeholder="Password" name="password">
		    </div>
		  </div>
		 
		  <div class="form-group">
		   <label for="inputState">Category</label>
		      <select name="category" class="form-control">
		      	<?php
		      	 foreach ($category as $key => $value):
		      	?>
		        
		        <option value="{{  $value->id }}">{{  $value->name }}</option>
		    <?php endforeach;?>
		      </select>
		  </div>
		  <button type="submit" class="btn btn-primary">Add</button>
		</form>
    </div>
   
  </div>

	
            <!-- /.navbar-static-side -->
       




	  <script src="{{  asset('js/jquery.js')}}"></script>
    <script src="{{  asset('js/bootstrap.min.js')}}"></script>
   	<script type="text/javascript">
   		$("#side-menu li").each(function(){
   			$(this).click(function(){
   				if($(this).children().hasClass("nav-second-level")){
   					$(this).children(".nav-second-level").toggle("slow");
   				}
   			});
   		});
   		$(".row").height($(window).height());
   	</script>
</body>
</html>