<?php
session_start();
unset ($_SESSION["fname"]);
unset ($_SESSION["password"]);
unset ($_SESSION["email"]);
unset ($_SESSION["contact"]);
unset ($_SESSION["address"]);
unset ($_SESSION["landline"]);
header("location:../../index.php");
?>