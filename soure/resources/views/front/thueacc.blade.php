<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	// lien ket csdl 
	$connect=mysqli_connect("localhost","root","","thueacc");
	$sql="select * from account where Status=1 limit 1";
	// lay du lieu nguoi dung
	$sql_user="select * from userss where ID=1";
	//
	$query=mysqli_query($connect,$sql);
	$id_account="";
	// lay du lieu cua acount
	if (mysqli_num_rows($query) > 0){
		while ($row=mysqli_fetch_assoc($query)) {
			// echo "id: " . $row["ID"]. " - Name: " . $row["Acount"]. " " . $row["Status"]. "<br>";
			$id_account=$row["ID"];

		}
	}else{
		echo ("Acc đã có người thuê");
	}
	// lay du lieu nguoi dung
	$price=0;
	$id_user="";
	$user=mysqli_query($connect,$sql_user);
	if (mysqli_num_rows($user) > 0){
		while ($row=mysqli_fetch_assoc($user)) {
			$price=$row["Price"];
		}
	}
	$gia="";
	for ($i=0; $i < strlen($price)-3; $i++) { 
		$gia.=$price[$i];
	}
	if($gia-3>0){
		$gia-=3;
		$gia.="000";
		// update du lieu
		$user="update userss SET Price=$gia where ID=1";
		$acount="update account SET Status=2 where ID=$id_account";
		$time=date('Y-m-d H:i:s');
		$y =substr($time,0,4);
		$d =substr($time,5,2);
		$m =substr($time,8,2);
		$h =substr($time,11,2);
		$i =substr($time,14,2);
		$s =substr($time,17,2);
		$dateint = mktime($h+3, $i, $s, $d, $m, $y);
		$date_clode=date('Y-m-d H:i:s',$dateint); // 02/12/2016
		$history="INSERT INTO history( `id_userss`, `id_account`, `Time`, `Time_read`,`Time_close`) VALUES (1,$id_account,3,'$time','$date_clode')";
	}
	$acount_update=mysqli_query($connect,$acount);
	$update_users=mysqli_query($connect,$user);
	$is_history=mysqli_query($connect,$history);
	if($is_history && $update_users && $acount_update){
		echo("Ok");
	}
	else{
		echo($history);
	}
	// update du lieu
	// them acount do vao history
	
	mysqli_close($connect);
?>