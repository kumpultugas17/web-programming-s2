<?php

session_start();

if ($_SESSION['username'] == "") {
    header("Location:login.php?msg=login");
}

session_unset();
session_destroy();

header('Location: login.php?msg=logout');
