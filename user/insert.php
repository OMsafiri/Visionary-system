<?php 
include_once 'db.conn.php';

$member = $_POST['member'];
		$contr = $_POST['typecontr'];
		$amt = $_POST['amount'];
		$balance = $_POST['balance'];


$sql = "INSERT INTO contributions(memberName,contributionType,Amount,balance)VALUES('$member','$contr','$amt','$gender','$balance');";
header("location:");

mysqli_query($conn, $sql);





 ?>