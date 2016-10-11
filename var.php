<?php
$data= date("d/m/y");
//$ip= $_SERVER[SERVER_ADDR];
//$timeFloat= $_SERVER[REQUEST_TIME_FLOAT];

session_start();
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$_SESSION['username']=$username;
$_SESSION['password']=$password;
$existeLogin=isset($_SESSION['username']);
if($existeLogin==false){echo("não esta logado");}        
?>
