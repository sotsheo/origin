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
			  <thead>
			    <tr>
			      <th scope="col">STT</th>
			      <th scope="col">Tên</th>
			      <th scope="col">Email</th>
			      <th scope="col">Money</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	foreach ($client as $key => $value):?>
			    <tr>
			      <th scope="row">1</th>
			      <td>{{ $value["name"]}}</td>
			      <td>{{ $value["email"] }}</td>
			      <td ><span class="price">{{ $value["money"] }}</span> VND</td>
			      
			    </tr>
			    <?php endforeach;?>
			  </tbody>
			</table>
			 <table class="table">
			  <thead>
			    <tr>
			      <th scope="col">STT</th>
			      <th scope="col">Tài khoản</th>
			      <th scope="col">Mật khẩu</th>
			      <th scope="col">Thời gian thuê</th>
			      <th scope="col">Thời gian hết hạn</th>
			      <th scope="col">Thời gian</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 

			  	foreach ($history as $key => $value):?>
			    <tr>
			      <th scope="row">1</th>
			      <td>{{ $value["name"]}}</td>
			      <td>{{ $value["password"] }}</td>
			      <td ><span>{{ $value["time_read"] }}</span></td>
			      <td ><span >{{ $value["time_close"] }}</span></td>
			      <td ><span >{{ $value["time"] }}h</span></td>
			      
			    </tr>
			    <?php endforeach;?>
			  </tbody>
			</table>
			
    </div>
   
  </div>

	
            <!-- /.navbar-static-side -->
       




	    <script src="{{  asset('js/jquery.js')}}"></script>
    <script src="{{  asset('js/bootstrap.min.js')}}"></script>
   	<script type="text/javascript">
   		$(".price").each(function(){
          var chuoi=$(this).text();
          var kq="";
          //alert(chuoi.length);
          for(var i=0;i<chuoi.length;i++){
            if((chuoi.length-i)%3==0 && i!=0){
              kq+=",";
            }
            kq+=chuoi.substr(i, 1);
          }
          $(this).html(kq);
      });
   	</script>
</body>
</html>