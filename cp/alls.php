<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @show all sabad
 */
 
 include("../inc/Config.php");
 $t = 'همه سفارشات';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 10 ;
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
    
 $query = "SELECT `id` , `uid` , `perss` , `ted` , `prices`
FROM `sabad`
LIMIT $min, 30";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        $rows = mysqli_num_rows($result);print_r($rows);
        
        while ($rw = mysqli_fetch_row($result))
        {
            $i++;
            $id[$i] = $rw[0];
            $uid[$i]= $rw[1];
            $perss[$i] = $rw[2];
            $ted[$i] = $rw[3];
            $prc[$i] = $rw[4];
        }
        for ($j = 1; $j < $i+1;$j++)
        {
            $teed = $ar = split('[|.-]',$ted[$j]);
            $ar = split('[|.-]',$perss[$j]);
            $iconuter=0;
            $pers = '';
            foreach ($ar as $temp)
            {
                $iconuter++;
                if ($temp != '')
                {
                $query = "SELECT `tit` AS tii FROM `pers` WHERE `id` = '$temp'";
                
                $result = mysqli_query($isCon,$query)
                or Die(mysqli_error($isCon));
                
                $tem = mysqli_fetch_array($result);
                $pers .= $tem[tii].' = ['.$teed[$iconuter-1].'] <br /> ';
                }
                $perss[$j]=$pers;
            } 
        }
        for ($j = 1; $j < $i+1;$j++)
        {
            $tmp = $uid[$j] ;
            
            $query = "SELECT `name` AS tii FROM `msh` WHERE `id` = '$tmp'";
                
                $result = mysqli_query($isCon,$query)
                or Die(mysqli_error($isCon));
                
                $tem = mysqli_fetch_array($result);
                $user[$j]= $tem[tii];;
        }
        mysqli_close($isCon);
?>
<div style="position: absolute;top: 6%;left: 20%;">
<table style="border: 2px solid black;text-align: center; width: 800px;font-size: smaller;">
<tr>
    <td style="border:1px solid black;" >شماره</td>
    <td style="border:1px solid black;" >نام</td>
    <td style="border:1px solid black;" > محصولات </td>
    <td style="border:1px solid black;" >قيمت كل</td>
</tr>
<?php

    for ($j = 1; $j < $i+1;$j++)
    {
        echo '<tr><td style="border:1px solid black;" >'.$id[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$user[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$perss[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$prc[$j]."</td></tr>";
    }
?>
<tr>
    <td></td>
    <td style="border:1px solid black;" ><?php if($now > 0){echo '<a href="alls.php?page='.($now-1).'">صفحه قبلی</a>'; } ?></td>
    <td style="border:1px solid black;" ><?php echo "صفحه:".$now; ?></td>
    <td style="border:1px solid black;" ><?php if($rows > 28){echo '<a href="alls.php?page='.($now+1).'">صفحه بعدی</a>'; } ?></td>
</tr>
</table>
</div>
