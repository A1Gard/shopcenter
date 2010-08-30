    <div class="posttop">رهگيري سفارش</div>
    <div class="posttxt">
<?php

/**
 * @author 
 * @copyright 2010
 */
 
  include_once('inc/func.php');
 
  if (isset($_GET['word']))
  {
    $wd = anti_injection($_GET['word']);
    if (strlen($wd) > 2)
     {
    
        
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
        
        $query = "SELECT `id` , `tit`
                FROM `pers`
                WHERE `txt` LIKE '%$wd%' OR `tit` LIKE '%$wd%'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        if (mysqli_num_rows($result)== 0)
        {
            echo '<br /><br />هيچ عبارتي مطابق با در خواست شما يافت نشد<br /><br />';
        }
        else
        {
            $i = 0 ;
            while ($rw = mysqli_fetch_row($result))
            {
                $i++;
                echo '<br />'.$i.' :  <a href="http://shop.jmbafgh.ir/show.php?id='.$rw[0].'">'.$rw[1].'</a><br />';
            }
            echo '<br /><br />';
        }
        
     }
     else
     {
        echo '<br /><br />كلمه شما بسيار كوتاه است<br /><br />';
     }
    }
    else
    {
        echo '<br /><br />درخواست نا معتبر است<br /><br />';
    }
?>        
           
</div>