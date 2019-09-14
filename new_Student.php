<?php
   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // name ,username ,password and Email sent from form

      $myname     = mysqli_real_escape_string($conn,$_POST['name']);
      $myusername = mysqli_real_escape_string($conn,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      $myemail    = mysqli_real_escape_string($conn,$_POST['email_id']);

      $sql_1 = "select * from Student";
      $result_1 = mysqli_query($conn,$sql_1);
      $count_1 = $result_1->num_rows;

      $sql = "insert into Student (Name,Uname,Password,Email) values ('$myname','$myusername','$mypassword','$myemail')";//SELECT SID FROM Student WHERE SID = '$myusername' and Password = '$mypassword'
      $result = mysqli_query($conn,$sql);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
                                                                                            //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                                                                             //$active = $row['active'];

      $sql_2 = "select * from Student";
      $result_2 = mysqli_query($conn,$sql_2);
      $count_2 = $result_2->num_rows;

      if($count_2 == ($count_1 + 1)) {

         echo "Student created";
         header("refresh:3; url = index_new.html");
      }
      else {
         echo" ! Oops !, seems you made a mistake ";
         header("location: create_new_student.html");

      }
   }
?>
