<?php

session_start();
unset($_SESSION["isim"],$_SESSION["mail"],$_SESSION["mail"],$_SESSION["sifre"]);
session_destroy();
header("Location: index.php");

?>