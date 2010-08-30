<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @login test
 */
 include("../inc/Config.php");
 $t = 'تلاش برای ورود';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 
 $username = anti_injection($_POST['user']);
 $userpass = PassWordGen($_POST['pass']);

    $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
    
 $query = "SELECT * FROM `users` WHERE `name` = '$username' AND `pass` = '$userpass'";
    
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    if (mysqli_num_rows($result)== 1 )
    {
        // yes
        while ($rwu = mysqli_fetch_row($result))
        {
            $us = $rwu[0];
            $username = $rwu[1];
            $typ = $rwu[4];
        }
            $_SESSION['user']= $username ;
            $_SESSION['test']= md5($_SERVER['REMOTE_ADDR']);
            $_SESSION['typp']= $typ ;
            $_SESSION['id'] = $us ;
            echo 'خوش آمدید از ورود شما سپاس گذاریم شما با موفقیت وارد سیستم شدید.';
            echo '<meta http-equiv="Refresh" content="4;../cp/index.php">';
    }
    else
    {
        //no 
        damndie();
    }

 // funtion
 function damndie ()
 {  
        unset($_SESSION['user']);
        unset($_SESSION['test']);
        unset($_SESSION['typp']); 
        echo "<strong>Your IP :   " .$_SERVER['REMOTE_ADDR'] . "</strong><pre> > </pre>";                                                            
        die ('ورود شما با خطا روبرو شد لطفاً در وارد کردن نام کابری و گذرواژه دقت نمایید وگرنه IP شما مسدود می شود');
 }
    mysqli_close($isCon);
?>