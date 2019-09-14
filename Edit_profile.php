<?php
   include("config_new.php");
   include('session_new.php');

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mynew_name = mysqli_real_escape_string($conn,$_POST['new_name']);
      $mynew_password = mysqli_real_escape_string($conn,$_POST['new_password']);
      $mynew_email_id = mysqli_real_escape_string($conn,$_POST['new_email_id']);

      $sql = "update Student set Name = '$mynew_name' ,Password = '$mynew_password' ,Email = '$mynew_email_id' where SID= '$login_session'";
      $result= mysqli_query($conn,$sql);

      $sql_1 = "select  Name , Password , Email from Student where SID= '$login_session'";
      $result_1 = mysqli_query($conn,$sql_1);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
      $row = $result_1->fetch_assoc();


      if(($mynew_name == $row['Name']) and ($mynew_password == $row['Password']) and ($mynew_email_id == $row['Email']))
      {
        echo "<hr> Profile details Edited <hr>";
         header("refresh:3; url = welcome_new2.php");
      }

      else
      {
        echo "Seem that some error occured : E:02";
         header("refresh:3; url = Edit_profile.html");

      }
   }
?>
