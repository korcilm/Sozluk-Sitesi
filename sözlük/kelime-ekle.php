<?php include"config.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sözlük</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
	<style>
		
	</style>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-dark">
		<div class="container">
			<a class="navbar-brand text-white" href="index.php">
				<img src="images/brand.png" width="40" height="40" class="d-inline-block align-top" alt="">
				Bilişim Sözlüğü
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
				<div class="navbar-nav ">
					<a class="nav-link text-white " href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
					<a class="nav-link text-white active" href="kelime-ekle.php">Kelime Ekle</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="container mt-5 mb-5">
		<div class="row bg-light justify-content-center py-4">
			<div class="col-md-8 bg-dark p-5 rounded">
				<div class="card ">
					<div class="card-header bg-info">
						<h3 class="card-title text-white">Kelime Ekle</h3>
					</div>
					<?php 
					if ($_POST) {
						if (!empty($_POST["en"]) && !empty($_POST["tr"])) {
							$ingilizce=$_POST["en"];
							$turkce=$_POST["tr"];
							
							$query =$db->prepare("INSERT INTO kelime SET ingilizce=? , turkce=?");
							$insert =$query->execute(array($ingilizce,$turkce));
							if ($insert) {
								?>
								<div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
								<?php 
							}else{
								?>
								<div class="alert alert-danger">İşleminiz başarısız.</div>
								<?php 
							}
						}
						else{
							?>
							<div class="alert alert-warning">Boş alan bırakmayınız.</div>
							<?php 
						}
					}

					?>

					<form class="form-horizontal" method="post" action="#">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">English</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="en" placeholder="İngilizce Kelime Giriniz">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Türkçe</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="tr" placeholder="Kelimenin Türkçesini Giriniz">
								</div>
							</div>
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-success col-sm-2">Ekle</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer class="bg-dark text-center text-white p-2">
		<p>Muhammet Korçil 2020</p>
	</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
</body>
</html>
