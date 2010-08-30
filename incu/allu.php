    <div class="posttop">نمايش همه محصولات</div>
    <div class="posttxt"> <title>همه محصولات - <?php echo $tit; ?> </title>
<?php

    $page = intval($_GET['page']) ;
    
    if ($page <= 0)
    {
        $query = "SELECT `id`,`tit` FROM `pers` 
        WHERE `vj` = '1'  LIMIT 0 , 50";
        
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $iconuter = 0;
        
        while ($rw = mysqli_fetch_row($result))
        {
            $iconuter++;
            echo '<br />'.$iconuter.' :  <a href="http://shop.jmbafgh.ir/show.php?id='.$rw[0].' ">'.$rw[1].'</a>';
        }
        if ($iconuter>49)
        {
            $temp = $page + 1;
            echo '<br /><br />'.'  <a align="center" href="http://shop.jmbafgh.ir/all.php?page='.$temp .' ">صفحه بعدي</a>';
            echo '<br /><br />';
        }
    }
    else
    {
        $key = 0;
       for ($i = 0;$i < $page; $i++)
       {
          $query = "SELECT `id` FROM `pers` 
          WHERE `id` > '$key' AND `vj` = '1'
          LIMIT 0 , 50";
          
                 $result = mysqli_query($isCon,$query)
                 or die (mysqli_error($isCon)); 
          
          mysqli_data_seek($result,2);
          
          while ($rw = mysqli_fetch_row($result))
          {
              $key = $rw[0];
          }  
       }
       
       $query = "SELECT `id`,`tit` FROM `pers` 
          WHERE `id` > '$key' AND `vj` = '1'
          LIMIT 0 , 50";
          
                 $result = mysqli_query($isCon,$query)
                 or die (mysqli_error($isCon));
             
       $iconuter = 0; 
          
            while($rows=mysqli_fetch_row($result))
            {
                $iconuter++;
                echo '<br />'.$iconuter.' :  <a href="http://shop.jmbafgh.ir/show.php?id='.$rows[0].' ">'.$rows[1].'</a>';
            }
            
            $page--;
            echo '<br /><br />'.'  <a href="http://shop.jmbafgh.ir/all.php?page='.$page.' ">صفحه قبلي</a>';
       
       if ($iconuter>49)
        {
            $page += 2;
            echo '      '.'  <a href="http://shop.jmbafgh.ir/all.php?page='.$page.' ">صفحه بعدي</a>';
        }
       
    }
    mysqli_close($isCon);
    
?>
<br /><br />
    </div>