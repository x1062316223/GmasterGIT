<?php
	include 'header.php';
?>
<script src="css/style.css" rel="stylesheet"></script>

<body>
	<div class="container mt-5">
		
		<!-- Fetch detail from database-->
			<?php
					$conn = new mysqli("localhost","root","","product");
				
					if ($conn -> connect_error){
						die("Connection failed: ".$conn -> connect_error);
					}
					$sql = "SELECT ID, Name, Price, description FROM p_list WHERE id =  '" . $_GET["id"] . "'";
					$result = mysqli_query($conn, $sql);
		
			while($row6 = mysqli_fetch_assoc($result)){
		?>	
		
		
						<h2><?php echo $row6["Name"];?></h2>
		
			<div class="row wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
					<div class="col-md-6 mb-4 mt-5">
						<img src="images/products/<?php echo $row6["ID"];?>.jpg" alt="" style = "width: 60%"></img>
						</div>
									<div class="col-md-6 mb-auto">
						<div style="width: 60%">
										<center><h3>$ <?php echo $row6["Price"];?><h3></center>
											<hr>
							<button class="btn btn-success" type="button" style="width: 100% ">Add to cart</button>
										</div>

						</div>

			</div>
		<hr>
										<h3><b>Product details</b></h3>
				<div class="col_product_detail">
					
							<h5 class="product_title"><center></center></h5><br>				

					<p style="font-size: 30px"><?php echo $row6["description"];?></p>
				<?php
		}
		?>
				</div>
		</div>
			

		
		
	</div>
</body>
</html>
