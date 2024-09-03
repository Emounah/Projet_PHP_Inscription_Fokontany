<?php
session_start();

unset($_SESSION["pseudoadmin"]);
unset($_SESSION["mdpadmin"]);

session_destroy();
header("location:../index.php");