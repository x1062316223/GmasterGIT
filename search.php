<?php
	include 'header.php'
?>

	<div class="container">
		<div class="container">
			<div class="modal-header">
				<?php 
        if($result->num_rows > 0){
        echo '<h1>'.$result->num_rows.' results:</h1>' ;
            }
else{
    echo '<h1>No results found</h1>' ;
}
                ?>
			</div>
		<div class="row">
			<?php
			$i = 0;
			require_once( "db_connect.php" );

        $searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

		$sql = "SELECT id, name, price FROM p_list WHERE name LIKE '%$searchq%' ORDER BY name ASC";
		$result = $conn->query($sql);

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
<?php
include 'footer.php';
?>
</html>