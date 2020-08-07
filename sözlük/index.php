<!DOCTYPE html>
<html>
<head>
	<title>Sözlük</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
	<style>
		
	</style>
</head>
<body>

	<div class="container mt-5 mb-5">
		<div class="row bg-warning justify-content-center pt-4">
			<div class="col-md-8 bg-danger p-5 rounded-top">
				<?php 
				if ($POST) {
					# code...
				}


				 ?>

				<form class="form" method="post" action="#">						
					<div class="form-group-row">	
						<input type="text" name="word" class="form-control float-left w-75" placeholder="Kelime Giriniz">
					</div>
					<button type="submit" class="btn btn-secondary form-control float-left w-25 ">Search</button>
				</form>
			</div>
		</div>
		<div class="row bg-warning justify-content-center">
			<div class="col-md-8 bg-info pl-5 py-1">
				<h5 class="text-white">Aranan kelime "tree" 3 sonuç bulundu.</h5>
			</div>
		</div>
		<div class="row bg-warning justify-content-center pb-4">
			<div class="col-md-8 bg-danger p-5 rounded-bottom">
				<table class="table table-hover bg-white">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Kategori</th>
							<th scope="col">İngilizce</th>
							<th scope="col">Türkçe</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Genel</td>
							<td>tree</td>
							<td>ağaç</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Genel</td>
							<td>tree</td>
							<td>ağaca çıkarmak</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Genel</td>
							<td>tree</td>
							<td>ağaçlarla örtmek</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

	</div>




	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
</body>
</html>