<?php
include "mysql_con.php";
if(isset($_POST['submit'])){
	$user_name = $_POST['user_name'];
	$user_sex = $_POST['user_sex'];
	$user_tel = $_POST['user_tel'];
	
	$sql = "select count(*) from user_info where user_name = '$user_name' ";
	$row_exist = $dbh->query($sql);
	$row_count = $row_exist->fetch()[0];
	
	if($row_count==0){
			$sql = "INSERT INTO `user_info`(`user_name`, `user_sex`, `user_tel`) VALUES ('$user_name','$user_sex ', '$user_tel')";
			$result = $dbh->query($sql);
			
			if($result){
				echo "New user is registered";
			    echo "<p>Back to Login page <a href='login.php'>Login Here</a></p>";
			}
			else{
				echo "sorry, fail to insert";
			}
	}
	else{
		echo "Sorry, the name has been registered. Please change another name.";
	}
}
?>