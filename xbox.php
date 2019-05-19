<?php
	include 'header.php';
?>
<body>
	<div class="container">
		<div class="modal-header">
			<h1 style="display: inline-block;">Xbox</h1>
			<div style="float: right; display: inline-block;">
				<form name="sort" method="post">
					<select name="order" id="order" onchange="this.form.submit()" onload="this.form.submit()">
						<option value="n_az" selected="selected">Name (A - Z)</option>
						<option value="n_za">Name (Z - A)</option>
						<option value="p_lh">Price (Low to High)</option>
						<option value="p_hl">Price (High to Low)</option>
					</select>
					<script type="text/javascript">
						document.getElementById( 'order' ).value = "<?php echo $_POST['order'];?>";
						document.getElementById( 'order' ).submit();
					</script>
				</form>
			</div>
		</div>
		<div class="row">
			<?php
			$i = 0;
			require_once( "db_connect.php" );

			if ( isset( $_POST[ 'order' ] ) ) {
				$sql = 'SELECT id, name, price FROM p_list WHERE type = "Xbox"';
				switch ( $_POST[ 'order' ] ) {
					case 'n_az':
						$sql .= ' ORDER BY name ASC';
						break;
					case 'n_za':
						$sql .= ' ORDER BY name DESC';
						break;
					case 'p_lh':
						$sql .= ' ORDER BY price ASC';
						break;
					case 'p_hl':
						$sql .= ' ORDER BY price DESC';
						break;
				}
			} else {
				$sql = 'SELECT id, name, price FROM p_list WHERE type = "Xbox" ORDER BY name ASC';
			}
			$result = mysqli_query( $conn, $sql );

			while ( $row4 = mysqli_fetch_assoc( $result ) ) {
				?>
			<div class="col-3 card text-right .view">

				<div class="card-body">

					<a href="productDetail.php?id=<?php echo $row4['id']?>">

								<img class="card-img-top mg-image mt-sm-2"  src="images/products/<?php echo $row4["id"];?>.jpg" alt="Card image cap"/></a>

				

					<h5 class="card-title">
						<center>
							<?php echo $row4["name"];?>
						</center>
					</h5>
					<p class="card-text">$
						<?php echo $row4["price"];?>
					</p><br>
					<div class="addtocart">ADD TO CART</div>
				</div>
			</div>
			<?php
			$i++;
			if ( $i % 4 == 0 ) {
				echo '</div><div class="row"><br />';

			}
			}
			?>
		</div>
	</div>
	</div>

</body>

<!-- Footer-->
<?php
include 'footer.php';
?>

</html>