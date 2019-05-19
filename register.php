

<?php
	include 'header.php';
?>	
	<div class="full_body" style="margin-top: 80px;">
			
		<div class="container">
				<div class="title_row">
				<h1>Registration</h1>
			</div>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form name="my-form" action="register.php" method="post">
								<?php
    // If the values are posted, insert them into the database.
    if (isset($_POST['email']) && isset($_POST['password'])){
        
        if($_POST['password'] == $_POST['confirmedPassword']){
        require_once( "db_connect.php" );
        
        
	    $email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        
 
        $query = "INSERT INTO user (email,password,firstname,lastname,address) VALUES ('$email', '$password', '$fname', '$lname', '$address')";      
        $result = mysqli_query($conn, $query);
        if($result){
          echo"<p> succeed</p>";
        }else{
          echo"<p> failed</p>";
        }
            }
        else{
            echo "Password is not matched";
        }
    }
                                mysqli_close($conn);
    ?>
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">*First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="fname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">*Last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lname" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">*E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">*Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">*Confirm Password</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="confirmedPassword" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                                <p>*Required</p>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" >
                                        Register
                                        </button>
                                    </div>
                            </form>
                        </div>
            </div>
        </div>
    </div>

</div>
        </div>
<!-- Footer-->
<?php
include 'footer.php';
?>
