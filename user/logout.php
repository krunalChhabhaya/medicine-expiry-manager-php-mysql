<?php
session_start();
unset( $_SESSION["md_id"]);
unset( $_SESSION["md_name"]);

header("Location:user_login.php");

?>