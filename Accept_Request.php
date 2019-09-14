<?php
  include("config_new.php");

  if($_SERVER["REQUEST_METHOD"] == "POST") {


     $myRequest_id = mysqli_real_escape_string($conn,$_POST['Request_id']);
     $myCoordi_id = mysqli_real_escape_string($conn,$_POST['Coordi_id']);

     $sql_1 = "SELECT * FROM Request WHERE RID= '$myRequest_id'";
     $result_1 = mysqli_query($conn,$sql_1);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
     $row_1= $result_1->fetch_assoc();
     $Item_Id=$row_1['IID'];
     $Quantity=$row_1['Quantity'];
     $Accepted_1=$row_1['Accepted'];

     $sql_1_5 = "Select * from Item where ID = '$Item_Id' ";
     $result_1_5=mysqli_query($conn,$sql_1_5);
     $row_1_5= $result_1_5->fetch_assoc();
     $Issued_1_5=$row_1_5['Issued'];

     $sql_2 = "UPDATE Item SET Issued = Issued + '$Quantity' WHERE ID= '$Item_Id'";
     $result_2 = mysqli_query($conn,$sql_2);

     $result_2_5=mysqli_query($conn,$sql_1_5);
     $row_2_5= $result_2_5->fetch_assoc();
     $Issued_2_5=$row_2_5['Issued'];

     $sql_3 = "UPDATE Request SET Accepted = 1 , CID = '$myCoordi_id'  WHERE RID= '$myRequest_id'";
     $result_3 = mysqli_query($conn,$sql_3);

     $result_3_5 = mysqli_query($conn,$sql_1);                                                                                                                   //$result=$conn->query($sql);                                                                                              //$result = mysqli_query($db,$sql);
     $row_3_5= $result_3_5->fetch_assoc();
     $Accepted_3_5=$row_3_5['Accepted'];


     if(( $Issued_2_5 > $Issued_1_5) and ($Accepted_1==0) and ($Accepted_3_5==1))
     {
        echo "Request NUMBER : <b>'$myRequest_id'</b> Accepted .";
        header("refresh:3; url = welcome_new2_Coordi.php");
     }
     else
     {
        echo "Oooops! Seems somthing went wrong . E:03";
        header("refresh:3; url = welcome_new2_Coordi.php");
     }

  }

?>
