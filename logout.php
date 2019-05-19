<?php
   session_start();
   unset($_SESSION["user"]);
   
   echo 'You have successfully logged out';
   header('Refresh: 2; URL = home.php');
?>