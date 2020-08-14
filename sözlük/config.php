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

$results_per_page = 150;


// veritabanındaki saklanan verinin sayısı
$query=$db->query("SELECT * FROM kelime");
$number_of_results=$query->rowCount();	


// oluşacak toplam sayfa sayısını bulma
$number_of_pages = ceil($number_of_results/$results_per_page);

// ziyaretçinin o anda hangi sayfa numarasında olduğunu belirleme
if (!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
}
// görüntülenen sayfadaki sonuçlar için sql LIMIT başlangıç numarasını belirleme
$this_page_first_result = ($page-1)*$results_per_page;
?>
