<?php 
session_start();
$user_name = $_SESSION['name'];	
echo "Username : " .$user_name;

?> 


<!DOCTYPE html>

<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="static/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<link rel="stylesheet" type="text/css" href="#">

</head>
<body id="top">

<div><p align="right"><button class="logout"><a href="login.php">Logout</a></button></p></div>



 <div>
  <h3 align="center">Post Your Own Content</h3>

  <form action="insert.php" method="POST">
  <table>
   <tr>
    <td><input style="width: 600px;" type="text" name="topic" placeholder="Topic" required></td>
   </tr>
   <tr>

    <td><input style="width: 600px;" type="email" name="email" placeholder="Email" required></td>
   </tr> 

  <tr>
    <td><input style="width: 600px; height: 100px;" type="text" name="content" placeholder="News" required></td>
   </tr>
    
   <tr>
    <td></td>
    <td><input style="background-color: #f0df74;" type="submit" value="Post"></td>
   </tr>
  </table>
 </form>
     
</div>




<?php
  
  $conn = mysqli_connect("localhost", "root", "", "youtube");
  if ($conn-> connect_error) {
    die("Connection Failed : ". $conn-> connect_error);
  }


  //sql to delete record
if(isset($_REQUEST['submit'])){
  $sql = "DELETE FROM register WHERE id = {$_REQUEST['id']}";
  if(mysqli_query($conn, $sql)){
    echo "Record Deleted".'<br>';
  }
  else{
    echo "Error Unable to delete record";
  }
}




  $sql = "select id, topic, email, content from register";
  $result = $conn->query($sql);

  if($result-> num_rows > 0){
    while ($row = $result-> fetch_assoc()) {
      echo $row['topic'].'<br>'.$row['content'].'<br>'.'<br>';
      echo '<form action="" method="POST"><input
      type="hidden" name="id" value=' . $row['id'] . '><input type="submit" class="btn btn-sm btn-danger" name="submit" value="Delete"></form>'.'<br>'.'<br>'.'<br>'.'<br>';

    }
  }
  else{
    echo "There Have No Result. ";
  }

  $conn -> close();


?>


</div>












<script src="jquery.js"></script>
</body>
</html>
