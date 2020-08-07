<?php 
session_start();
ob_start();

$user="root";
$pass="";

// PDO veritabanı bağlantısı 

try {
	$db=new PDO("mysql:host=localhost; dbname=sozluk; charset=utf8;" ,$user,$pass);
}catch (PDOException $error) {
	echo "Database bağlantısı kurulamadı";
	$error->getMessage();
	
}
?>