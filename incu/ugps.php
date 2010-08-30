    <div class="posttop">نمايش محصولات يك گروه</div>
    <div class="posttxt">
<?php

/**
 * @author 
 * @copyright 2010
 */

 if (isset($_GET['id']))
 {
    $id = intval($_GET['id']) ;
    
    if ($id > 0)
    {
        $query = "SELECT `name` AS tit FROM `gp` WHERE `id` = $id";
        
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
            
        $ar = mysqli_fetch_array($result);
        
     }
     else
     {
        $ar[tit]= 'بندي نشده' ; 
     }   
        $tit .= ' - گروه '. $ar[tit];
        
            echo '<title>'.$tit.'</title>';
    
       $query = "SELECT `id`,`tit` FROM `pers` WHERE `gp` = '$id' AND `vj` = '1'";
            
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
            
       if(mysqli_num_rows($result)==0)
       {
            echo 'هيچ محصولي در اين گروه نيست';
       }
       else
       {    
            $iconuter = 1;
            while ( $rows = mysqli_fetch_row($result))
            {
                echo '<br />'.$iconuter.' :  <a href="http://shop.jmbafgh.ir/show.php?id='.$rows[0].' ">'.$rows[1].'</a>';
                $iconuter++;
            }
       }
 }
 else
 {
    Echo 'اطلاعات در خواست شده نمايان گر هيچ گروهي نيست';
 }

?>
    </div>
