<?php
include 'header.php';
?>
<body>
<!-- Poster slider -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active" style="height: 400px">
			<img class="d-block w-100 mySlides" src="images/post1.jpg" alt="First slide">
		</div>
		<div class="carousel-item" style="height: 400px">
			<img class="d-block w-100 mySlides" src="images/post2.jpg" alt="Second slide">
		</div>
		<div class="carousel-item" style="height: 400px">
			<img class="d-block w-100 mySlides" src="images/post3.jpg" alt="Third slide">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>

	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

<!-- PC sample products-->

<div class="container">
	<div class="modal-header">
		<h1>PC</h1>
	</div>
	<div class="row">
		<?php
		require_once( "db_connect.php" );

		$sql = "SELECT id, name, price FROM p_list WHERE type = 'pc' LIMIT 4";
		$result = mysqli_query( $conn, $sql );

		while ( $row4 = mysqli_fetch_assoc( $result ) ) {
			?>
		<div class="col-3 card text-right .view">
			<a href="productDetail.php?id=<?php echo $row4['id']?>">

								<img class="card-img-top mg-image mt-sm-2"  src="images/products/<?php echo $row4["id"];?>.jpg" alt="Card image cap"/></a>

		

			<div class="card-body">
				<h5 class="card-title">
					<center>
						<?php echo $row4["name"];?>
					</center>
				</h5>
				<p class="card-text">$
					<?php echo $row4["price"];?>
				</p><br>
				<div class="btn btn-primary">+ <i class="fa fa-shopping-cart"></i>
				</div>
			</div>


		</div>
		<?php
		$row4++;
		}
		?>
		<p><a href="pc.php" style="float: right;">view more <i class="fas fa-caret-right"></i></a>
		</p>

	</div>
</div>
<!-- PS4 sample products-->

<div class="container">
	<div class="modal-header">
		<h1>PS4</h1>
	</div>
	<div class="row">
		<?php
		require_once( "db_connect.php" );

		$sql = "SELECT id, name, price FROM p_list WHERE type = 'ps4' LIMIT 4";
		$result = mysqli_query( $conn, $sql );

		while ( $row4 = mysqli_fetch_assoc( $result ) ) {
			?>
		<div class="col-3 card text-right .view">
			<a href="productDetail.php?id=<?php echo $row4['id']?>">

								<img class="card-img-top mg-image mt-sm-2"  src="images/products/<?php echo $row4["id"];?>.jpg" alt="Card image cap"/></a>

		

			<div class="card-body">
				<h5 class="card-title">
					<center>
						<?php echo $row4["name"];?>
					</center>
				</h5>
				<p class="card-text">$
					<?php echo $row4["price"];?>
				</p><br>
				<div class="btn btn-primary">+ <i class="fa fa-shopping-cart"></i>
				</div>
			</div>

		</div>
		<?php
		$row4++;
		}
		?>
		<p><a href="ps4.php" style="float: right;">view more <i class="fas fa-caret-right"></i></a>
		</p>

	</div>
</div>

<!-- Xbox sample products-->

<div class="container">
	<div class="modal-header">
		<h1>Xbox</h1>
	</div>
	<div class="row">
		<?php
		require_once( "db_connect.php" );

		$sql = "SELECT id, name, price FROM p_list WHERE type = 'xbox' LIMIT 4";
		$result = mysqli_query( $conn, $sql );

		while ( $row4 = mysqli_fetch_assoc( $result ) ) {
			?>
		<div class="col-3 card text-right .view">
			<a href="productDetail.php?id=<?php echo $row4['id']?>">

								<img class="card-img-top mg-image mt-sm-2"  src="images/products/<?php echo $row4["id"];?>.jpg" alt="Card image cap"/></a>

		

			<div class="card-body">
				<h5 class="card-title">
					<center>
						<?php echo $row4["name"];?>
					</center>
				</h5>
				<p class="card-text">$
					<?php echo $row4["price"];?>
				</p><br>
				<div class="btn btn-primary">+ <i class="fa fa-shopping-cart"></i>
				</div>
			</div>

		</div>
		<?php
		$row4++;
		}
		?>
		<p><a href="xbox.php" style="float: right;">view more <i class="fas fa-caret-right"></i></a>
		</p>
	</div>

</div>




</body>

<!-- Footer-->
<?php
include 'footer.php';
?>

</html>