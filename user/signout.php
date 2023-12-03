<?php
session_start();
include("includes/config.php");

$now = new DateTime();
$now_s = $now->format('Y-m-d H:i:s');
$username = $_SESSION['uname'];
$req = mysqli_query($con, "UPDATE users SET lastlogout = '$now_s' WHERE username='$username'");

$_SESSION['uid'] == "";
session_unset();
//session_destroy();

$_SESSION['errmsg'] = "You have successfully logout";
?>

<script language="javascript">
    document.location = "../index.php";
</script>