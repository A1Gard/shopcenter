<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add group
 */
 
 include("../inc/Config.php");
 $t = 'اضافه کردن گروه';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 4 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
?>
<div id="wb_Form1" style="position:absolute;background-color:#F7F9FC;border:2px #000000 solid;left:262px;top:57px;width:425px;height:89px;z-index:3">
<form name="addgp" method="post" action="../pop/agp.php" id="Form1">
<input type="text" id="Editbox1" style="position:absolute;left:124px;top:34px;width:244px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:0" name="name" value="" maxlength="30">
<input type="submit" id="Button1" name="" value="ايجاد کن" style="position:absolute;left:29px;top:32px;width:79px;height:25px;font-family:Arial;font-size:13px;z-index:1">
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:384px;top:36px;width:21px;height:16px;text-align:left;z-index:2;">
<font style="font-size:13px" color="#000000" face="Arial"><b>نام:</b></font></div>
</form>
</div>


<dir style="position: absolute; top: 150px;left: 250px;height: 250px;">
<table border="1" style="border-color: black;">

<tr>
<td> شماره </td> <td style="border-color: black;" >ID</td><td style="border-color: black;">نام گروه</td>
</tr>

<?php

    $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
  
  $query = "SELECT * FROM `gp`";
  $i= 0 ;
    
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
        while($rw = mysqli_fetch_row($result))
        {
            $i++;
            echo '<tr>
            <td>'.$i.'</td> <td style="border-color: black;" >'.$rw[0].'</td><td style="border-color: black;">'.$rw[1].'</td>
            </tr>';
        }
        mysqli_close($isCon);
?>

</table>
</dir>

