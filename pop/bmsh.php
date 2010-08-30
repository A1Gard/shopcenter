<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @bans moshtari
 */
 
 include("../inc/Config.php");
 $t = 'تلاش برای محروم کردن';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 8 ;
 include_once('../inc/logindo.php'); // login test
 
 if (isset($_POST['ban']) & isset($_POST['hal']))
 {
    $halt = anti_injection($_POST['hal']) ;
    
    if ($halt == 'محروم کن')
    {
        $ban = 1;
    }
    else
    {
        $ban = 0;
    }
    
    $id = intval($_POST['ban']);
    
    
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
        
    $query = "UPDATE `msh` SET `ban` =  '$ban' WHERE `id` ='$id'";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        echo '<pre>کاربر با موفقیت آزاد یا محروم شد...</pre>';
        echo '<meta http-equiv="Refresh" content="3;../cp/bans.php">';
 }   
 else
 {
    mysqli_close($isCon);
    die ('خطا');
 }
mysqli_close($isCon);
?>