<?php
unset($_SESSION['username']);
unset($_SESSION['active']);
unset($_SESSION['quyen']);
header("location:index.php");
?>