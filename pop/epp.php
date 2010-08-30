<?php

/**
 * @author 
 * @copyright 2010
 */

/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add user 
 */
 
 include("../inc/Config.php");
 $t = 'سعي در ويرايش اطلاعات شما';// title string
 include_once('../inc/header.php'); 
 include_once('../inc/func.php'); //include functions
 $agent = 0 ;
 include_once('../inc/logindo.php'); // login test
 
 $id = $_SESSION['id'];
 
         $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
        
    $pass = PassWordGen($_POST['name']);

    $query = "SELECT `mail` FROM `users` WHERE `id` = '$id' AND `pass` = '$pass' ";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
 
    if (mysqli_num_rows($result)!=1)
    {
        die('پسورد شما اشتباه است');
    }
    
    if (!(isset($_POST['name']) && isset($_POST['mail'])&&
    isset($_POST['pass1']) && isset($_POST['pass2']) ))
    {
        die('اطلاعات ناقص هست');
    }
    
    $mail = anti_injection($_POST['mail']);
    
    if (!ereg(".+@.+\.[A-z]{2,3}",$mail,$regs))
    {
        die('ایمیل درست وارد نشده');
    }
    
    if ($_POST['pass2'] != $_POST['pass1'])
    {
        die('پسورد ها يكي نيست');
    }
    $pass = PassWordGen($_POST['pass1']);
    
    $query = "UPDATE `users` SET `pass` =  '$pass',
            `mail` = '$mail' WHERE `id` = '$id'";
 
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon)); 
     
     echo 'اطلاعات شما ويرايش شد';
     echo '<meta http-equiv="Refresh" content="3;../cp/index.php">';
     
        mysqli_close($isCon);
?>