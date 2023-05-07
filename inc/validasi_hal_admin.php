<?
include("cek_login.php");
include("dbconnection.php");
$conn=db_connect("mysql");
$db=db_mysql_select("e-voting",$conn);
?>