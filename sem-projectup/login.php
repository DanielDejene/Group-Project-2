<?php
session_start();
require "db.php";

function clean($str)
{
	$str = @trim($str);
	if (get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysqli_real_escape_string($str);
}


$login = ($_POST['username']);
$password = ($_POST['password']);
$qry = "SELECT * FROM admin WHERE username='$login' AND password='$password'";
$result = mysqli_query($conn, $qry);

if ($result) {
	if (mysqli_num_rows($result) > 0) {
		session_regenerate_id();
		$member = mysqli_fetch_assoc($result);
		$_SESSION['SESS_MEMBER_ID'] = $member['id'];
		$_SESSION['SESS_FIRST_NAME'] = $member['username'];
		session_write_close();
		header("location: admin/dashboard.php");
		exit();
	} else {
	
		header("location: login.html");
		exit();
	}
} else {
	die("Query failed");
}
