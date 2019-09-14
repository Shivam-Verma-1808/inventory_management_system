<?php
   include("config_new.php");
   include('session_new.php');

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

      $sql = "select Password from Student where SID= '$login_session'";
      $result = mysqli_query($conn,$sql);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
      $row = $result->fetch_assoc();

    
      if($mypassword == $row['Password'])
      {
         header("location: Edit_profile.html");
      }
      else {
         $error = "Your Password is invalid";
         header("Location: confirm_password.html");

      }
   }
?>
