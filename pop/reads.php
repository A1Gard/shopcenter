<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add group
 */
 
 include("../inc/Config.php");
 $t = 'تلاش براي خواندن';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 10 ;
 include_once('../inc/logindo.php'); // login test
 

            $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
            or die (mysqli_error($isCon));
  

                foreach ($_POST as $temp)
                {
                    
                 $id = intval($temp) ;
                    
                 if ($id != 0)
                 {    
                    $query = " UPDATE `sabad` SET `new` =  '0' WHERE `id` = '$id' ";
                
                    $result = mysqli_query($isCon,$query)
                    or die ($isCon);
                 }
                
                }
                
            echo "خوانده شده ها با موفقيت علامت گذاري شدند...";
            echo '<meta http-equiv="Refresh" content="2;../cp/news.php">';

    
    mysqli_close($isCon);
    
?>