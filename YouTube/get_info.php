<?php
include "mysql_con.php";
$sql = "select * from user_info where user_id = 2";
$result = $dbh->query($sql);
$row = $result->fetch();
print_r($row);

?>