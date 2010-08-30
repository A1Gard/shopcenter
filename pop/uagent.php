<?php

/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @Edit preduct
 */
 
 include("../inc/Config.php");
 $t = 'تلاش براي افزودن كاربر';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
  $agent= 13 ;
 include_once('../inc/logindo.php'); // login test
 
 if (isset($_POST['ids']))
 {
    $id = $_POST['ids'];
    
    unset($_POST['ids']);
    
    $typ ='0';
    
    foreach ($_POST as $tmp)
    {
        $typ.= '|'.$tmp;
    }
    
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
        
        $query = "UPDATE `users` SET `typ` = '$typ' WHERE `id` = '$id'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        echo 'سطح دسترسي معين شد...';
        echo '<meta http-equiv="Refresh" content="3;../cp/index.php">';
 }
?>