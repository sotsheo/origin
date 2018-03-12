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
		.text{
			text-align: center;
		}
		.text li{
			list-style: none;
			float: right;
		}
		.navbar-collapse img{
			padding: 10px;
		}
		.table{
			margin-top: 15rem;
		}
	</style>
</head>
<body>
	   
  @include('back.menu')



    <div class="col col-lg-10 text">
    	 <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fa fa-user fa-fw"></i>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Logout</a>
	          
	       </div>
      </li>
      <table class="table">
      	<?php echo ($status);?>
			  <thead>
			    <tr>
			      <th scope="col">STT</th>
			      <th scope="col">ID</th>
			      <th scope="col">Tên</th>
			      <th scope="col">Thao tác</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  	$i=0;
			  	 foreach ($category as $key => $value):
			  	 $i++;?>
			    <tr>
			      <th scope="row">{{ $i }}</th>
			      <td>{{ $value->id }}</td>
			      <td>{{ $value->name }}</td>
			     <td><div class="btn-group" role="group" aria-label="Basic example">
				  <a  class="btn btn-secondary" href=" {{ url("admin/category/edit/") }}/{{ $value->id }} ">Edit</a>
				  <a  class="btn btn-secondary" href=" {{ url("admin/category/delete/") }}/{{ $value->id }}">Delete</a>
				  
				</div></td>
			    </tr>
			    <?php endforeach;?>
			  </tbody>
			</table>
			<a  class="btn btn-outline-primary btn-sm" style="float: right;margin-right: 5%;" href="{{ url("admin/category/add") }} ">Add Category</a>
			{!! $category->links() !!}
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