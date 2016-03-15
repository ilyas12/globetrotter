<?php
session_start();
session_destroy();
$last=$_SESSION['lasturl'];
header("Location: $last");
exit();
?>