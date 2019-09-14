<?php
   include("config_new.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['Uname']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['Password']);

      $sql = "SELECT SID FROM Student WHERE Uname = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();                                                                                                                //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
                                                                                            //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                                                             //$active = $row['active'];

      $count = $result->num_rows;

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myuserid");
         $_SESSION['login_user'] = $row['SID'];

         header("location: welcome_new2.php");
      }
      else {
         $error = "Your Login Name or Password is invalid";
         header("Location: index_new.html");

      }
   }
?>
