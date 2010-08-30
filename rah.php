<?php
/**
 * @author 
 * @copyright 2010
 */
include_once("inc/Config.php");

    $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
       
  $query = "SELECT `fvar` AS tit FROM `diff` WHERE `id` = '1'";  
        
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    $ar = mysqli_fetch_array($result);
    $tit = $ar[tit];
    $t = $tit . '- رهگيري سفارش' ;
include_once ('incu/header.php');
    echo "<title>$t</title>";
echo '<h2 style="position:absolute;top:5%;left:20%;z-index:7;">'.$tit.'</h2>';
include_once ('incu/usaid.php');
echo '  <div class="postbox">';
include ('incu/rr.php');
include ('incu/footer.php');
echo '  </div>';
include ('incu/inter.php');
?>