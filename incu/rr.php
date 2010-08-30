    <div class="posttop">رهگيري سفارش</div>
    <div class="posttxt">
<?php

/**
 * @author 
 * @copyright 2010
 */
 
  if (isset($_GET['code']))
  {
    $id = intval($_GET['code']);
    if ($id > 1000)
     {
    
        $id -= 1000;
        
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
 
        $query = "SELECT `korf` AS tit FROM `fishs` WHERE `id` = '$id'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $ars = mysqli_fetch_row($result);
        
        $res = $ars[0];
        
        
        echo '<br /><br />';
;
        switch ($res)
        {
        case 0 : echo 'به سفارش شما هنوز رسيدگي نشده';
        break;
        case 1 : echo 'به سفارش شما هنوز رسيدگي نشده';
        break;
        case -1: echo 'سفارش شما پذيرفته نشد است براي كسب اطلاعات بيشتر با مدير سايت تماس بگيريد';
        break;
        case -2: echo 'سفارش شما پذيرفته نشد است براي كسب اطلاعات بيشتر با مدير سايت تماس بگيريد';
        break;
        case 2 : echo 'سفارش شما تاييد و در حال ارسال است';
        break;
        case 3 : echo 'سفارش شما تاييد و در حال ارسال است';
        break;
        }
        echo '<br /><br />';
     }
     else
     {
        echo '<br /><br />كد شما معتبر نيست<br /><br />';
     }
    }
    else
    {
        echo '<br /><br />درخواست نا معتبر است<br /><br />';
    }
?>        
           
</div>