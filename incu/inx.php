    <div class="posttop">اطلاعات</div>
    <div class="posttxt">
<?php

/**
 * @author 
 * @copyright 2010
 */
 
  include_once('inc/func.php');
 
        
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
        $query = "SELECT `tit`,`fvar`,`mvar` FROM `diff` 
        WHERE `tit` = 'sh1' OR `tit` = 'sh2'
        OR `tit` = 'sa1' OR `tit` = 'sa2'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        while ($rows = mysqli_fetch_row($result))
        {
            if ($rows[0]=='sh1')
            {
                $sh_kart1 = $rows[1];
                $sh_hesab1 = $rows[2];
            }
            if ($rows[0]=='sh2')
            {
                $sh_kart2 = $rows[1];
                $sh_hesab2 = $rows[2];
            }
            if ($rows[0]=='sa1')
            {
                $n1 = $rows[1];
                $b1 = $rows[2];
            }
            if ($rows[0]=='sa2')
            {
                $n2 = $rows[1];
                $b2 = $rows[2];
            }
            
        }
        echo '<br /><br /><br />';
        echo 'اطلاعات شماره حساب ها از قرار ذيل مي باشد:<br /><br />
        شماره حساب اول : '.$sh_hesab1.'<br /><br />
        شماره كارت خود پرداز : '.$sh_kart1.'<br /><br />
        به نام : '.$n1.'<br /><br />
        در بانك : '.$b1.'<br /><br />مي باشد<br /><br /><br /><br />';
        
        echo '
        شماره حساب دوم : '.$sh_hesab2.'<br /><br />
        شماره كارت خود پرداز : '.$sh_kart2.'<br /><br />
        به نام : '.$n2.'<br /><br />
        در بانك : '.$b2.'<br /><br />مي باشد<br /><br /><br /><br />';
        
        $query = "SELECT `id` , `tit` ,`txt` FROM `pers`
        WHERE `vj` = '1' 
        ORDER BY `id` DESC 
        LIMIT 10";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        while ($rw = mysqli_fetch_row($result))
        {
            echo '</div><br /><br />
            ';
            $str = substr($rw[2],0,44);
            echo '<div class="posttop">'.$rw[1].'</div>
            ';
            echo '<div class="posttxt">
            '.$str.'... <br /><br /><a href="http://shop.jmbafgh.ir/show.php?id='.$rw[0].'">نمايش تمام اطلاعات</a><br /><br />
            ';
        }
?>        
           
</div> 