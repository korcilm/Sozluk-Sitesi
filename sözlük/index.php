<?php include"config.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sözlük</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">

	<style>
		tr{
			line-height: 0.5 !important;
		}

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
					<a class="nav-link text-white active" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
					<a class="nav-link text-white" href="kelime-ekle.php">Kelime Ekle</a>
				</div>
			</div>
		</div>
	</nav>

	<div class="container mt-5 mb-5">
		<div class="row bg-warning justify-content-center pt-4">
			<div class="col-md-10 bg-danger p-5 rounded-top">
				<form class="form" method="post" action="#">						
					<div class="form-group-row">	
						<input type="text" name="word" class="form-control float-left w-75" id="ara" placeholder="İngilizce veya Türkçe Kelime Giriniz">
					</div>
					<button type="submit" class="btn btn-secondary form-control float-left w-25 ">Search</button>
				</form>
			</div>
		</div>

		<?php 
		if ($_POST)
		{
			$word=$_POST["word"];
			if ($word!=NULL) {  ?>
				<div class="row bg-light justify-content-center">
					<div class="col-md-10 bg-info pl-5 py-1">
						<h5 class="text-white"> Aranan kelime " <?=$word?> " <?php  
						$query=$db->prepare("SELECT * FROM kelime WHERE ingilizce LIKE '%".$word."%' OR turkce LIKE '%".$word."%' ");
						$query->execute();
						$query->fetch(PDO::FETCH_ASSOC);
						$say=$query->rowCount();
						echo $say;
						?>  sonuç bulundu.</h5>
					</div>
				</div>
				<?php
			}
			else{

			}
		}
		?>

		<div class="row bg-light justify-content-center pb-4">
			<div class="col-md-10 bg-danger p-5 rounded-bottom">
				<table class="table table-hover bg-white">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>							
							<th scope="col">İngilizce</th>
							<th scope="col">Türkçe</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if ($_POST)
						{
							$word=$_POST["word"];
							if ($word!=NULL) {
								$cek = $db->query("SELECT * FROM kelime WHERE ingilizce LIKE '%".$word."%' OR turkce LIKE '%".$word."%' ",PDO::FETCH_ASSOC);

								if($cek->rowCount()){
									$i=0;
									foreach($cek as $kayit){
										$i++;
										?> 
										<tr>
											<th scope="row"><?=$i?></th>											
											<td><?=$kayit["ingilizce"]?></td>
											<td><?=$kayit["turkce"]?></td>
										</tr>


										<?php 

									}
								}
							}
							else{
								// retrieve selected results from database and display them on page
								$sql="SELECT * FROM kelime LIMIT ". $this_page_first_result .",".  $results_per_page ;
								$query=$db->prepare($sql);	
								$query->execute();
								
								while($row = $query->fetch()) {
									?> 
									<tr>
										<th scope="row"><?=$row['ID']?></th>

										<td><?=$row['ingilizce']?></td>
										<td><?=$row['turkce']?></td>
									</tr>
									<?php 
								}					
							}
						}

						else{
								// retrieve selected results from database and display them on page
							$sql="SELECT * FROM kelime LIMIT ". $this_page_first_result .",".  $results_per_page ;
							$query=$db->prepare($sql);	
							$query->execute();

							while($row = $query->fetch()) {
								?> 
								<tr>
									<th scope="row"><?=$row['ID']?></th>
									<td><?=$row['ingilizce']?></td>
									<td><?=$row['turkce']?></td>
								</tr>
								<?php 
							}
						}
						?>
					</tbody>
				</table>
				<nav aria-label="Page navigation example">
					
					<ul class="pagination justify-content-center">
						<?php // display the links to the pages
						for ($page=1;$page<=$number_of_pages;$page++) {
							?>
							<li class="page-item"><a class="page-link" href="index.php?page=<?=$page?>"><?=$page?></a></li>
							<?php  
						}
						?>					
					</ul>

				</nav>
			</div>
		</div>
	</div>
	<footer class="bg-dark text-center text-white p-2">
		<p>Muhammet Korçil 2020</p>
	</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>
