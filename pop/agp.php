<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add group
 */
 
 include("../inc/Config.php");
 $t = 'تلاش برای اضافه کردن گروه';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 4 ;
 include_once('../inc/logindo.php'); // login test
 
    //add  test
    if (isset($_POST['name']))
    {
        $gpname = $_POST['name'] ;// gp name form form
        
            $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
            or die (mysqli_error($isCon));
  
        $query = "SELECT `name` FROM `gp` WHERE `name` ='$gpname'";
    
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
        
        // test for is this set before?    
        if (mysqli_num_rows($result) > 0 )
        {
            echo '<meta http-equiv="Refresh" content="3;../cp/addgp.php">';
            die('قبلا گروهی با این نام وارد شده است.');
        }
        else
        {
            $query = "INSERT INTO `gp` (`name`) VALUES ('$gpname')";
                
                $result = mysqli_query($isCon,$query)
                or die ($isCon);
            echo "گروه با موفقیت اضافه شد...";
            echo '<meta http-equiv="Refresh" content="2;../cp/addgp.php">';
        }
    
    }
    else
    {
        echo '<meta http-equiv="Refresh" content="3;../cp/addgp.php">';
        die('عملیات اضافه کردن گروه با خطا مواجه شد.');
    }
    
    mysqli_close($isCon);
?>