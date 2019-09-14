<?php
   include('session_new.php');
?>

<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<style>
table, th, td {
    border: 1px solid black;
}
</style>
<title>New Page 4</title>
<script language="JavaScript">
<!--
function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}
// -->
</script>
</head>

<body background="white-wallpaper20.jpg" style="background-attachment: fixed" onload="FP_preloadImgs(/*url*/'buttons/button8.jpg',/*url*/'buttons/button9.jpg',/*url*/'buttons/buttonE.jpg',/*url*/'buttons/buttonF.jpg',/*url*/'buttons/button14.jpg',/*url*/'buttons/button15.jpg',/*url*/'buttons/button1E.jpg',/*url*/'buttons/button1F.jpg',/*url*/'buttons/button11.jpg',/*url*/'buttons/button12.jpg')">

<p><font size="7">Welcome : <?php echo $name_session; ?> </font></p>
<hr>

<div id="left_panel"  style="float:left; width:auto;">

<p><a href="welcome_new2.php"><img border="0" src="home.png" width="88" alt="HOME" height="52"></a></p>
<p><a href="newrequest_new.php">
<img border="0" id="img1" src="buttons/button7.jpg" height="20" width="100" alt="New Request" fp-style="fp-btn: Embossed Rectangle 2" fp-title="New Request" onmouseover="FP_swapImg(1,0,/*id*/'img1',/*url*/'buttons/button8.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img1',/*url*/'buttons/button7.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img1',/*url*/'buttons/button9.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img1',/*url*/'buttons/button8.jpg')"></a></p>

<p><a href="inventort_info.php">
<img border="0" id="img3" src="buttons/button13.jpg" height="20" width="100" alt="Inventory info" fp-style="fp-btn: Embossed Rectangle 2" fp-title="Inventory info" onmouseover="FP_swapImg(1,0,/*id*/'img3',/*url*/'buttons/button14.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img3',/*url*/'buttons/button13.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img3',/*url*/'buttons/button15.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img3',/*url*/'buttons/button14.jpg')"></a></p>
<p><a href="confirm_password.html">
<img border="0" id="img5" src="buttons/button10.jpg" height="20" width="100" alt="Edit Profile" onmouseover="FP_swapImg(1,0,/*id*/'img5',/*url*/'buttons/button11.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img5',/*url*/'buttons/button10.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img5',/*url*/'buttons/button12.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img5',/*url*/'buttons/button11.jpg')" fp-style="fp-btn: Embossed Rectangle 2" fp-title="Edit Profile"></p>
<p><font size="7"><a href="logout_new.php">
<img border="0" id="img4" src="buttons/button1D.jpg" height="20" width="100" alt="Logout" onmouseover="FP_swapImg(1,0,/*id*/'img4',/*url*/'buttons/button1E.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img4',/*url*/'buttons/button1D.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img4',/*url*/'buttons/button1F.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img4',/*url*/'buttons/button1E.jpg')" fp-style="fp-btn: Embossed Rectangle 2" fp-title="Logout"></a></font></p>

</div>

<div id="right_panel"  style=" width:auto; margin-left: 200px; margin-top:50px;">
<p><b>Your History :</b></p>
<?php
  include("config_new.php");
    $sql="select RID, Item.Name Name,Request.Quantity ,Accepted Status, Coordi.Name Accepted_By from ((Request Inner join Item on Request.IID = Item.ID ) left join Coordi on Request.CID=Coordi.CID ) where SID='$login_session'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
                                                                                //echo "bgcolor";
      echo "<table><tr><th>ID</th><th>Name</th><th>Quantity</th><th>Status</th><th>Accepted_By</th></tr>";
    // output data of each row
      while($row = $result->fetch_assoc())
      {
        echo "<tr><td>". $row["RID"]. "</td><td>". $row["Name"]. "</td><td>".$row["Quantity"] . "</td><td>".$row["Status"]."</td><td>" . $row["Accepted_By"]. " </td></tr>";
      }
      echo "</table>";
    }

    else
    {
    echo " NO HISTORY TO SHOW ";
    }


?>
</div>

</body>

</html>
