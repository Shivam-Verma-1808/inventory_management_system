<?php
   include("config_new.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myRequest_id = mysqli_real_escape_string($conn,$_POST['Request_id']);

      $sql_1 = "Select * from Request where RID='$myRequest_id'";
      $result_1 = mysqli_query($conn,$sql_1);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
      $row_1 = $result_1->fetch_assoc();
      $Quantity = $row_1['Quantity'];
      $Item_id = $row_1['IID'];

      $sql_1_5= "SELECT * FROM Item WHERE ID='$Item_id'";
      $result_1_5=mysqli_query($conn,$sql_1_5);
      $row_1_5 = $result_1_5->fetch_assoc();
      $Issued_1_5=$row_1_5['Issued'];

      $sql_2 = "UPDATE Item set Issued = Issued - '$Quantity' WHERE ID='$Item_id'";
      $result_2 = mysqli_query($conn,$sql_2);

      $result_2_5=mysqli_query($conn,$sql_1_5);
      $row_2_5 = $result_2_5->fetch_assoc();
      $Issued_2_5=$row_2_5['Issued'];

      $sql_2_75="SELECT * FROM Request";
      $result_2_75=mysqli_query($conn,$sql_2_75);
      $count_2_75 = $result_2_75->num_rows;

      $sql_3 = "DELETE FROM Request WHERE RID = '$myRequest_id'";
      $result_3 = mysqli_query($conn,$sql_3);

      $result_3_5=mysqli_query($conn,$sql_2_75);
      $count_3_5 = $result_3_5->num_rows;


      if(($Issued_2_5 < $Issued_1_5) and ($count_3_5 == ($count_2_75 - 1)))
      {
         header("location:Return_Item.php");
      }
      else {
         echo "Ooops! Seems Something Went Wrong . E:04";
         header("refresh:3; url= Return_Item.php");
      }
   }
?>
