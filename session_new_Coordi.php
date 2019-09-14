<?php
   include('config_new.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($conn,"select CID,Name from Coordi where CID = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['CID'];
   $name_session = $row['Name'];

   if(!isset($_SESSION['login_user'])){
      header("location:index_new.html");
   }
?>
