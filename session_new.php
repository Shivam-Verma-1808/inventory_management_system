<?php
   include('config_new.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($conn,"select SID,Name from Student where SID = '$user_check' ");
   //$nam_sql = mysqli_query($conn,"select Name from Student where SID = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   //$row_2=mysqli_fetch_array($nam_sql,MYSQLI_ASSOC);

   $login_session = $row['SID'];
   $name_session = $row['Name'];

   if(!isset($_SESSION['login_user'])){
      header("location:index_new.html");
   }
?>
