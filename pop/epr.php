<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @Edit preduct
 */
 
 include("../inc/Config.php");
 $t = 'تلاش برای ویرایش کردن محصول';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 2 ;
 include_once('../inc/logindo.php'); // login test
 
    // is form form?
    if (isset($_POST['tit']) && isset($_POST['txt']) &&
    isset($_POST['day']) && isset($_POST['mon']) && isset($_POST['id']) &&
    isset($_POST['yer']) &&isset($_POST['gp']) && isset($_POST['prc']))
    {
        if ( $_POST['vj'] == 'on' )
        {
           $vj = 1 ;
        }
        else
        {
           $vj = 0 ;
        }
        $id  =  intval($_POST['id']);
        $tit =  anti_injection($_POST['tit']);
        $txt =  $_POST['txt'];
        $day =  intval($_POST['day']);
        $mon =  intval($_POST['mon']);
        $yer =  intval($_POST['yer']);
        $prc =  intval($_POST['prc']);
        $gp  =  intval($_POST['gp']);
        $us  =  intval($_SESSION['id']);
        
            $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
            or die (mysqli_error($isCon));
  
        $query = "REPLACE INTO pers (`id`,`tit`,`txt`,`us`,`day`,`mon`,`yer`,`gp`,`prc`,`vj`) 
                 VALUES ('$id','$tit','$txt','$us','$day','$mon','$yer','$gp','$prc','$vj')";
                 
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
            
        $query = "SELECT `viw` FROM `st` WHERE `id` = '$id'";
        
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
       while ($rwu = mysqli_fetch_row($result))
       {
        $vv = $rwu[0];
       }     
            
       $query = "REPLACE INTO `st` (`id`,`tit`,`viw`) VALUES ('$id','$tit','$vv')"; 
       
            $result = mysqli_query($isCon,$query)
            or die ($isCon);        
        
        echo 'محصول با موفقیت ویرایش شد...';
        echo '<meta http-equiv="Refresh" content="3;../cp/editpr.php">';
            
    }
    else
    {   
        echo '<meta http-equiv="Refresh" content="3;../cp/editpr.php">';
        die ('ویرایش محصول با مشکل مواج شد لطفا دقت نمایید');
        
    }
    mysqli_close($isCon);
 
?>