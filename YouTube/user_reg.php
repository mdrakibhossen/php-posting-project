<?php
	include "mysql_con.php";
	if(isset($_POST['submit'])){
		$user_name = $_POST['user_name'];
		$user_sex = $_POST['user_sex'];
		$user_tel = $_POST['user_tel'];
		
		$sql = "INSERT INTO `user_info`( user_name, `user_sex`, `user_tel`) VALUES ('$user_name','$user_sex','$user_tel')";
		
		$result = $dbh->query($sql);
		
		if($result){
			echo "new user is registered!";
			echo "<p>Back to Login page <a href='login.php'>Login Here</a></p>";
		}
		else{
			echo "fail to register";
		}
	}
?>