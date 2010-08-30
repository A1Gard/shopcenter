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
    $t = $tit . '- ارتباط با ما' ;
    
include_once ('incu/header.php');
echo '<h2 style="position:absolute;top:5%;left:20%;z-index:7;">'.$tit.'</h2>';
echo "<title>$t</title>";
include_once ('incu/usaid.php');
echo '  <div class="postbox">';
include ('incu/cons.php');
include ('incu/footer.php');
echo '  </div>';
include ('incu/inter.php');
?>