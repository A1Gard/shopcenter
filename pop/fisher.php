<?php

/**
 * @author 
 * @copyright 2010
 */

 include("../inc/Config.php");
 $t = 'تلاش برای ثبت اطلاعات فيش';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 11 ;
 include_once('../inc/logindo.php'); // login test
 


if (!(isset($_POST['idd']) && isset($_POST['tay'])))
{
    echo 'خطا';
    echo '<meta http-equiv="Refresh" content="3;../cp/nfish.php">';
}else
{
    /* set fish if tay = 1 krof =
    0 = 2
    1 = 3
    if tay = 0  kor =
    0 = -2
    1 = -1
    
    AND paseed the sabad...
    */   
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
        
    $id = intval($_POST['idd']) ;
    $tay = intval($_POST['tay']) ;
    $query = "SELECT `korf` AS kk,`rcod` AS pp FROM `fishs` WHERE `id` = '$id'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));    
    
    $ar = mysqli_fetch_array($result);
  
        // begin new conf
        if ($tay==0)
        {
            //
            if ($ar[kk]==1)
            {
                $new = 3;
            }
            else
            {
                $new = 2;
            }
        }
        else
        {
            //
            if ($ar[kk]==1)
            {
                $new = -1;
            }
            else
            {
                $new = -2;
            }    
        }
        // end new conf
        
        $query = "UPDATE `fishs` SET `korf` = '$new' WHERE `id` = '$id'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $pp = $ar[pp];
        
        $query = "UPDATE `sabad` SET `pased` = '1' WHERE `id` = '$pp'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        ///
        $query = "SELECT `uid` AS eq FROM `sabad` WHERE `id` = '$pp'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        
        $eq = mysqli_fetch_array($result);
        
        $cc = $eq[eq];
        
        $query = "SELECT `con` AS eq FROM `msh` WHERE `id` = '$cc'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $eq = mysqli_fetch_array($result);
        
        $ca = $eq[eq]+1;
        
        $query = "UPDATE `msh` SET `con` = '$ca' WHERE `id` = '$cc'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        
        
        echo 'اطلاعات ثبت شد...';
        echo '<meta http-equiv="Refresh" content="3;../cp/nfish.php">';
}

   mysqli_close($isCon);
?>