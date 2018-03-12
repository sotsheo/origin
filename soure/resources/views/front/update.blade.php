<?php
	$connect=mysqli_connect("localhost","root","","thueacc");
	$sql="select * from account,history where account.Status=2 and history.id_account=account.ID and history.id_userss=1 limit 1";
	$query=mysqli_query($connect,$sql);
	$id_account=mysqli_fetch_assoc($query)["id_account"];
	$update_data="update account SET Status=1 where ID=$id_account";
	$result=mysqli_query($connect,$update_data);
	if($result){
		echo ("Ok");
	}
	else{
		echo ("Error");
	}
	mysqli_close($connect);
?>