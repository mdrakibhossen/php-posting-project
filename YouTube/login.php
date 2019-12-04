<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css1/style.css" />
</head>
<body>

<?php
include "mysql_con.php";
if(isset($_POST['submit'])){
	$user_name = $_POST['user_name'];
	$user_tel = $_POST['user_tel'];
	
	$sql = "select * from user_info where user_name = '$user_name' and user_tel = '$user_tel' ";
	$result = $dbh->query($sql);
	$row_exist = $result->fetch();
	
	if($row_exist){
		session_start();
		$_SESSION['name'] = $user_name;			
		echo '<script>
				// alert("'.$user_name.' , you are welcome"); 
				window.location.href="homepage.php";
				</script>' ;
	}
	else{
		echo  '<script>
				alert("Sorry, the user does not exist");
				</script>' ;
	}
}
?>
	<div class="form">
	<form action="login.php" method="post" name="login">
		<h1>Log in </h1><br>
		<input type = "text" id="user_name" name="user_name" placeholder="Username" required />
		<input type="text" id="user_tel" name="user_tel" placeholder="Telephone" required />
		<br>
		<!-- <button type="submit" name="submit">login</button>-->
		<input name="submit" type="submit" value="Login" />


	</form>
	<p>Not registered yet? <a href='reg2.html'>Register Here</a></p>
	</div>
	<?php  ?>
</body>
</html>