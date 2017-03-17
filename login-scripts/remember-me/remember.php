<?php
session_start();
if(!empty($_POST["login"])) {
	$conn = mysqli_connect("localhost", "username", "password", "blog_samples");
	$sql = "Select * from members where member_name = '" . $_POST["member_name"] . "' and member_password = '" . md5($_POST["member_password"]) . "'";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["member_id"]		   = $user["member_id"];

			if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
				if(isset($_COOKIE["member_password"])) {
					setcookie ("member_password","");
				}
			}
	} else {
		$message = "Invalid Login";
	}
}
?>
