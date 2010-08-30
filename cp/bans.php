<?php

/**
 * @author 
 * @copyright 2010
 */

/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @moshtariha list
 */
 
 include("../inc/Config.php");
 $t = 'محروم کردن مشتری';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 8 ;
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
        
    $query = "SELECT `id`,`name`,`ban` FROM `msh` LIMIT $min, 30 ";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        $rows = mysqli_num_rows($result);print_r($rows);
        
        while ($rw = mysqli_fetch_row($result))
        {
            $i++;
            $id[$i] = $rw[0];
            $name[$i]= $rw[1];
            $ban[$i]= $rw[2];
        }
 
 
?>
<div style="position: absolute;top: 6%;left: 40%;">
<table style="border: 2px solid black;text-align: center;font-size: smaller;">
<tr>
    <td style="border:1px solid black;" >شماره</td>
    <td style="border:1px solid black;" >نام و فامیل</td>
    <td style="border:1px solid black;" > محرومیت </td>
</tr>

<?php

    for ($j = 1; $j < $i+1;$j++)
    {
        if ($ban[$j]==1)
        {
            $halt= 'آزاد کن';
        } 
        else
        {
            $halt = 'محروم کن';
        }
        echo '<tr><td style="border:1px solid black;" >'.$id[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$name[$j]."</td>";
        echo '<td style="border:1px solid black;" >
        <form method="POST" action="../pop/bmsh.php">
        <input type="hidden" name="ban" value="'.$id[$j].'"/>
        <input type="submit" name="hal" value="'.$halt.'" />
        </form></td></tr>';
    }
    
?>

<tr>
    <td style="border:1px solid black;" ><?php if($now > 0){echo '<a href="bans.php?page='.($now-1).'">صفحه قبلی</a>'; } ?></td>
    <td style="border:1px solid black;" ><?php echo "صفحه:".$now; ?></td>
    <td style="border:1px solid black;" ><?php if($rows > 28){echo '<a href="bans.php?page='.($now+1).'">صفحه بعدی</a>'; } ?></td>
</tr>
</table>
</div>
<?php
mysqli_close($isCon);
?>
