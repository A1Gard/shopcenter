<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @stat perduct
 */
 
 include("../inc/Config.php");
 $t = 'سیستم آمار گیر';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 3 ;
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
        
    $query = "SELECT * FROM `st` LIMIT $min, 30 ";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        $rows = mysqli_num_rows($result);print_r($rows);
        
        while ($rw = mysqli_fetch_row($result))
        {
            $i++;
            $id[$i] = $rw[0];
            $tit[$i]= $rw[1];
            $vv[$i] = $rw[2];
        }
?>
<html>
<table style="position: absolute;top: 6%;left: 35%; border: 2px solid black;text-align: center;">
<tr>
    <td style="border:1px solid black;" >شماره</td>
    <td style="border:1px solid black;" >محصول</td>
    <td style="border:1px solid black;" >تعداد نمایش</td>
</tr>
<?php

    for ($j = 1; $j < $i+1;$j++)
    {
        echo '<tr><td style="border:1px solid black;" >'.$id[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$tit[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$vv[$j]."</td></tr>";
    }
    
?>
<tr>
    <td style="border:1px solid black;" ><?php if($now > 0){echo '<a href="sts.php?page='.($now-1).'">صفحه قبلی</a>'; } ?></td>
    <td style="border:1px solid black;" ><?php echo "صفحه:".$now; ?></td>
    <td style="border:1px solid black;" ><?php if($rows > 28){echo '<a href="sts.php?page='.($now+1).'">صفحه بعدی</a>'; } ?></td>
</tr>
</table>
</html>
<?php
    mysqli_close($isCon);
?>