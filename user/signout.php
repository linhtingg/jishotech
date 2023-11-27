<?php
session_start();
$_SESSION['uid'] == "";
session_unset();
//session_destroy();

$_SESSION['errmsg'] = "You have successfully logout";
?>

<script language="javascript">
    document.location = "../index.php";
</script>