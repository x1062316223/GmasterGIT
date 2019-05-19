<?php
    ob_start();  
    session_start();  
    include 'db_connect.php';
?>
<?php


//get searching key words and pass to search.php
	$output = '';

	if(isset($_POST['search'])){
		$searchq = $_POST['search'];
		$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

		$sql = "SELECT id, name, price FROM p_list WHERE name LIKE '%$searchq%' ORDER BY name ASC";
		$result = $conn->query($sql);
	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap 4 Website Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="css/style.css" rel="stylesheet"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="js/accountJS.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<style>
.fakeimg {
	height: 200px;
	background: #aaa;
}
</style>
</head>
<body>
	<!-- https://www.tutorialspoint.com/php/php_login_example.htm     https://www.youtube.com/watch?v=Jtw1tjk-tdo-->

	<!-- Nav Bar -->
<nav class="navbar navbar-dark bg-dark navbar navbar-expand-lg sticky-top">
	 <div class="container">
	<a class="navbar-brand" href="home.php" style="font-size: 30px">GMaster</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto p-2">
      <li class="nav-item mr-sm-2"> <a class="nav-link" href="pc.php">PC</a> </li>
      <li class="nav-item mr-sm-2"> <a class="nav-link" href="ps4.php">PS4</a> </li>
      <li class="nav-item mr-sm-2"> <a class="nav-link" href="xbox.php">XBOX</a> </li>
    </ul>
    <!-- Search Form -->
					<form class="form-inline my-2 my-lg-0 mr-0" method="post" action="search.php">
          				<input class="form-control mr-sm-2" type = "text" name = "search" placeholder="Search" aria-label="Search" id="search">
          				<button class="btn btn-outline-success my-2 my-sm-0 mr-sm-2" type="submit"><span class="fa fa-search"></span></button>
        			</form>
	  <?php
    
                //check user input with database to find if user is exist and password is correct

            if (isset($_POST['login'])) {
                $email = $_POST['emailInput'];
                $pwd = $_POST['passwordInput'];

                $sql = "SELECT * FROM `user` WHERE email = '$email'";
                
                $result = mysqli_query($conn, $sql);
                

             if (mysqli_num_rows($result) > 0) {
                 $row = mysqli_fetch_array($result);
                   
                   if(password_verify($pwd, $row['password'])){
                    $_SESSION['user'] = $row['firstname'];

                    header("Refresh:0");

                }

            }else {
                //pop up alert when user failed login
             echo "<script type='text/javascript'>alert('Login Failed');</script>";
           }
        }else if(isset($_SESSION['user'])) {
?>
            
      <style type="text/css">#loginButton{
        display:none;
  }</style>
  
        <!-- Profile icon-->
        <!-- display this when user logged in -->
       <ul class="nav navbar-nav flex-row" id = "accountProfile">
           <li class="dropdown order-1">
                      <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle"> <span class="oi oi-person"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right mt-2">
                         <li class="px-3 py-2">
                             <form class="form" role="form" style="width: 200px"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
                              <?php
                               echo '<p>Welcome '.$_SESSION['user'].' </p>' ;
                              ?>

                                  <div class="form-group">
                                  <a href="logout.php">Log Out</a>
                                  </div>

                              </form>
                          </li>
                      </ul>
                  </li>
              </ul>
      
              <?php

        }
?>


	      <!-- Login Form -->
     <ul class="nav navbar-nav flex-row" id = "loginButton" >
		 <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                       <li class="px-3 py-2">
                           <form class="form" role="form" style="width: 200px"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
							
                                <div class="form-group">
                                    <input name="emailInput" type = "text" placeholder="Email" class="form-control form-control-sm" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input name="passwordInput" type = "password" placeholder="Password" class="form-control form-control-sm" type="text" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"  name = "login">Login</button>
                                </div>
                                <div class="form-group text-center">Dont't have account yet?
                                   <a href="register.php">Register </a>here.
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

    
	  </div>
   </div> 
</nav>
</body>
</html>