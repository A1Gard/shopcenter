<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @show all sabad
 */
 
 include("../inc/Config.php");
 $t = ' سفارشات جديد';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 10 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
         $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
 
 $now = intval($_GET['page']);
 
   $min = intval($_GET['maxx']);
   $last= intval($_GET['min']);
     $i = 0 ;
     
     if (!(isset($_GET['min'])) )
     {
        $maxy = 0;
        for ($is = 0;$is < $now ;$is++)
        {
            
            $query = "SELECT `id` FROM
             `sabad` WHERE `new` = '1' AND `id` > '$maxy'
             LIMIT 0 , 30";
   
            $res = mysqli_query($isCon,$query)
            or die (mysqli_error($isCon));
            
            mysqli_data_seek($res,28);
            
            while ($rw = mysqli_fetch_row($res))
            {
               $maxy = $rw[0]; 
            }
            
        }
        $min = $maxy ;
     }
     
    
 $query = "SELECT `id` , `uid` , `perss` , `ted` , `prices`
FROM `sabad`
WHERE `new` = '1'
AND `id` > '$min'
LIMIT 0 , 30 ";
    
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
        $maxx = $id[$i];
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
<form method="POST" action="../pop/reads.php">
<div style="position: absolute;top: 6%;left: 20%;">
<table style="border: 2px solid black;text-align: center; width: 800px;font-size: smaller;">
<tr>
    <td style="border:1px solid black;" >شماره</td>
    <td style="border:1px solid black;" >نام</td>
    <td style="border:1px solid black;" > محصولات </td>
    <td style="border:1px solid black;" >قيمت كل</td>
    <td style="border:1px solid black;" >تاييد كردن</td>
</tr>
<?php

    for ($j = 1; $j < $i+1;$j++)
    {
        echo '<tr><td style="border:1px solid black;" >'.$id[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$user[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$perss[$j]."</td>";
        echo '<td style="border:1px solid black;" >'.$prc[$j]."</td>"; 
        echo '<td style="border:1px solid black;" ><input type="checkbox" name="'. $id[$j] .'" value="'. $id[$j] .'" />'.'خوانده شد'.'</td></tr>';
    }
?>
<tr>
    <td></td>
    <td style="border:1px solid black;" ><?php if($now > 0){echo '<a href="news.php?page='.($now-1).'&maxx='.$last.'">صفحه قبلی</a>'; } ?></td>
    <td style="border:1px solid black;" ><?php echo "صفحه:".$now; ?></td>
    <td style="border:1px solid black;" ><?php if($rows > 28){echo '<a href="news.php?page='.($now+1).'&maxx='.$maxx.'&min='.$min.'">صفحه بعدی</a>'; } ?></td>
</tr>
</table>
<br /><br />
<input type="submit" value="تيك دار ها خوانده شد" align="center" />
</form>
</div>
