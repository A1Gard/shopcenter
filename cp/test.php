<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add user 
 */
 
 include("../inc/Config.php");
 $t = 'ويرايش اطلاعات شما';// title string
 include_once('../inc/header.php'); 
 include_once('../inc/func.php'); //include functions
 include_once('../inc/logindo.php'); // login test
 
 
         $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    

    $query = "SELECT * FROM `diff`";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     while ( $ar = mysqli_fetch_array($result))
     {
        print_r($ar);
        echo "<br /><br />";
     }
 

    
?>

<?php
   mysqli_close($isCon);
?>