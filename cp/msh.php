<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @moshtariha list
 */
 
 include("../inc/Config.php");
 $t = 'لیست مشتریان';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 7 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
 $now = intval($_GET['page']);
    if ($now==0)
    {
      $min = 0 ;
      $max = 30;
    }else
    {
      $min =  $now * 30 ;
      $max = ($now + 1) * 30;
    }  
 $i = 0 ;
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
        
    $query = "SELECT * FROM `msh` LIMIT $min, 30 ";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        $rows = mysqli_num_rows($result);print_r($rows);
        
        while ($rw = mysqli_fetch_row($result))
        {
            $i++;
            $id[$i] = $rw[0];
            $name[$i]= $rw[1];
            $mail[$i] = $rw[2];
            $idm[$i] = $rw[4];
            $tel[$i] = $rw[5];
            $addrr[$i] = $rw[6];
            $idp[$i] = $rw[7];
            $ip[$i] = $rw[8];
            $ban[$i]= $rw[10];
            $con[$i]= $rw[11];
        }
?>
<html>
<div style="position: absolute;top: 6%;left: 20%;">
<table style="border: 2px solid black;text-align: center; width: 800px;font-size: smaller;">
<tr>
    <td style="border:1px solid black;" >شماره</td>
    <td style="border:1px solid black;" >نام و فامیل</td>
    <td style="border:1px solid black;" >ایمیل</td>
    <td style="border:1px solid black;" >کد ملی</td>
    <td style="border:1px solid black;" >تلفن</td>
    <td style="border:1px solid black;" >آدرس</td>
    <td style="border:1px solid black;" >کد پستی</td>
    <td style="border:1px solid black;" >IP address</td>
    <td style="border:1px solid black;" >محرومیت</td>
    <td style="border:1px solid black;" >تعداد خرید</td>
</tr>
<?php

    for ($j = 1; $j < $i+1;$j++)
    {
        echo '<tr><td style="border:1px solid black;" >'.$id[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$name[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$mail[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$idm[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$tel[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$addrr[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$idp[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$ip[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$ban[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$con[$j]."</td></tr>";
    }
    
?>
<tr>
    <td></td><td></td><td></td><td></td>
    <td style="border:1px solid black;" ><?php if($now > 0){echo '<a href="msh.php?page='.($now-1).'">صفحه قبلی</a>'; } ?></td>
    <td style="border:1px solid black;" ><?php echo "صفحه:".$now; ?></td>
    <td style="border:1px solid black;" ><?php if($rows > 28){echo '<a href="msh.php?page='.($now+1).'">صفحه بعدی</a>'; } ?></td>
</tr>
</table>
</div>
</html>
<?php
mysqli_close($isCon);
?>
