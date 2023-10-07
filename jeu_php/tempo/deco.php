<?php
session_unset();
setcookie("pseudo", "", time() - 3600);
header("location: index.php");
