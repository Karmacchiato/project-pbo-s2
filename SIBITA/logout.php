<?php 
session_start();

unset($_SESSION['level']);
session_unset();
session_destroy();

header("Location: index.php");
?>