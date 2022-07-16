<?php
require 'koneksi.php';
unset($_SESSION['login']);
session_destroy();
header("Location: login.php");
?>