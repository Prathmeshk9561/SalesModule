<?php 
session_start();
unset($_SESSION['cityhead']);
header('location:index.html');
?>