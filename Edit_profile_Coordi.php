<?php
   include("config_new.php");
   include('session_new_Coordi.php');

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mynew_name = mysqli_real_escape_string($conn,$_POST['new_name']);
      $mynew_User_name = mysqli_real_escape_string($conn,$_POST['new_User_name']);
      $mynew_password = mysqli_real_escape_string($conn,$_POST['new_password']);
      $mynew_email_id = mysqli_real_escape_string($conn,$_POST['new_email_id']);

      $sql = "update Coordi set Name = '$mynew_name' , Uname = '$mynew_User_name' ,Password = '$mynew_password' ,Email = '$mynew_email_id' where CID= '$login_session'";
      $result= mysqli_query($conn,$sql);

      $sql_1 = "select  Name , Uname , Password , Email from Coordi where CID= '$login_session'";
      $result_1 = mysqli_query($conn,$sql_1);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
      $row = $result_1->fetch_assoc();


      if(($mynew_name == $row['Name']) and ($mynew_User_name == $row['Uname']) and ($mynew_password == $row['Password']) and ($mynew_email_id == $row['Email']))
      {
        echo "<hr> Profile details Edited <hr>";
         header("refresh:3; url = welcome_new2_Coordi.php");
      }

      else
      {
        echo "Seem that some error occured : E:03";
         header("refresh:3; url = Edit_profile_Coordi.html");

      }
   }
?>
