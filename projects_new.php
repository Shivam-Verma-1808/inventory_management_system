<html>

<style>
table, th, td {
    border: 1px solid black;
}
</style>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>New Page 4</title>
</head>

<body background="white-wallpaper20.jpg" style="background-attachment: fixed">

<p>&nbsp;&nbsp;&nbsp;&nbsp; <font size="7">Project information</font></p>

<?php
  include("config_new.php");

    $sql="select PID, projects.Name Name,Description,Coordi.Name contact,Email from projects,Coordi where projects.CID = Coordi.CID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
                                                                                //echo "bgcolor";
      echo "<table><tr><th>ID</th><th>Name</th><th>Description</th><th>contact</th><th>Email</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>". $row["PID"]. "</td><td>". $row["Name"]. "</td><td>".$row["Description"] . "</td><td>".$row["contact"]."</td><td>" . $row["Email"]. " </td></tr>";
      }
      echo "</table>";
    }

    else
    {
    echo "0 results";
    }


?>

</body>

</html>
