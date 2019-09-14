<?php
   include("config_new.php");
   include('session_new_Coordi.php');

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // name ,username ,password and Email sent from form

      $myprojectsname     = mysqli_real_escape_string($conn,$_POST['P_name']);
      $mypdesc = mysqli_real_escape_string($conn,$_POST['desc']);

      $sql_1 = "select * from projects";
      $result_1 = mysqli_query($conn,$sql_1);
      $count_1 = $result_1->num_rows;

      $sql = "insert into projects (Name,Description,CID) values ('$myprojectsname','$mypdesc','$login_session')";//SELECT SID FROM Student WHERE SID = '$myusername' and Password = '$mypassword'
      $result = mysqli_query($conn,$sql);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
                                                                                            //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                                                             //$active = $row['active'];

      $result_2 = mysqli_query($conn,$sql_1);
      $count_2 = $result_2->num_rows;

      if($count_2 == ($count_1 + 1)) {

         echo "Project created";
         header("refresh:3; url = welcome_new2_Coordi.php");
      }
      else {
         echo" ! Oops !, seems you made a mistake ";
         header("location: create_new_projet.html");

      }
   }
?>
