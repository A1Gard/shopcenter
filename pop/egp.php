<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @Edit gp
 */
 
 include("../inc/Config.php");
 $t = 'تلاش برای ویرایش گروه';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 5 ;
 include_once('../inc/logindo.php'); // login test
 
  if ( isset($_POST['name']) && isset($_POST['id']))
  {
    //go
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
    $gp   = $_POST['id'];
    $name = $_POST['name'];
    $query = "REPLACE INTO gp (`id`,`name`) VALUES ('$gp','$name')";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        mysqli_close($isCon);
        
        echo 'گروه موردنظر با موفقیت ویرایش شد...';
        echo '<meta http-equiv="Refresh" content="3;../cp/editgp.php">';
              
        
  }
  else
  {
    //die
    echo '<meta http-equiv="Refresh" content="3;../cp/editgp.php">';
    die ('ویرایش گروه با مشکل مواجه  شد لطفا دقت نمایید');
  }
?>