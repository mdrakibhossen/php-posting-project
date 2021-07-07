<?php
 include 'config.php';

 $sql = "INSERT INTO user (firstname , lastname , username , password ) 
 VALUES(' ".$_POST["username"]." ' , ' ".$_POST["lastname"]." ' , '".$_POST["username"]." ' , '".$_POST["password"]." ' )";
 
$result = $conn->query($sql);
 $conn->close();