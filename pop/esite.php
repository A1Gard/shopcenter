<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add group
 */
 
 include("../inc/Config.php");
 $t = 'تلاش براي تغييرات';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
  $agent= 6 ;
 include_once('../inc/logindo.php'); // login test

  if ( !( isset($_POST['tit']) && isset($_POST['mail']) &&
  isset($_POST['url']) && isset($_POST['tel1']) && isset($_POST['tel2']) &&
  isset($_POST['shh1']) && isset($_POST['shh2']) && isset($_POST['shk1']) &&
  isset($_POST['shk2']) && isset($_POST['bank2']) && isset($_POST['shname1']) &&
  isset($_POST['bank1']) && isset($_POST['shname2']) && isset($_POST['check']) ) )
  {
    die ('اطلاعات ناقص دريافت شده');
  } 
  
  $title = anti_injection($_POST['tit']);
  $mail = anti_injection($_POST['mail']);
  $url = anti_injection($_POST['url']);
  $tel1 = anti_injection($_POST['tel1']);
  $tel2 = anti_injection($_POST['tel2']);
  $sh_kart1 =anti_injection($_POST['shk1']);
  $sh_kart2 = anti_injection($_POST['shk2']);
  $sh_hesab1 = anti_injection($_POST['shh1']);
  $sh_hesab2  = anti_injection($_POST['shh2']);
  $n1  = anti_injection($_POST['shname1']);
  $n2 = anti_injection($_POST['shname2']);
  $b1 = anti_injection($_POST['bank1']);
  $b2 =anti_injection($_POST['bank2']);
  
    if (!ereg(".+@.+\.[A-z]{2,3}",$mail,$regs))
    {
        die('ایمیل درست وارد نشده');
    }
    
    if (!ereg("(http://|https://).+\.[A-z]{2,3}",$url,$regs))
    {
        die('آدرس سايت درست نيست');
    }
        if (!ereg("^\0[0-9]{11}$",$tel1,$regs))
    {
        die('تلفن اشتباه هست');
    }
        if (!ereg("^\0[0-9]{11}$",$tel2,$regs))
    {
        die('تلفن اشتباه هست');
    }
    
    
    if (!strlen($sh_kart1)<10)
    {
        if (!ereg("[0-9]",$sh_kart1,$regs))
        {
            die("شماره كارت اول درست وارد نشده");
        }
    }else
    {
        die('شماره كارت اول درست وارد نشده');
    }
    
    
    if (!strlen($sh_kart2)<10)
    {
        if (!ereg("[0-9]",$sh_kart2,$regs))
        {
            die("شماره كارت دوم درست وارد نشده");
        }
    }else
    {
        die('شماره كارت دوم درست وارد نشده');
    }
    
    if (!strlen($sh_hesab1)<6)
    {
        if (!ereg("[0-9]",$sh_hesab1,$regs))
        {
            die("شماره حساب اول درست وارد نشده");
        }
    }else
    {
        die('شماره حساب اول درست وارد نشده');
    }
    
    if (!strlen($sh_hesab2)<6)
    {
        if (!ereg("[0-9]",$sh_hesab2,$regs))
        {
            die("شماره حساب دوم درست وارد نشده");
        }
    }else
    {
        die('شماره حساب دوم درست وارد نشده');
    }
    
    if (!strlen($b1)>3)
    {
        die('نام بانك اول اشتباه است');
    }
    if (!strlen($b2)>3)
    {
        die('نام بانك دوم اشتباه است');
    }
    if (!strlen($n1)>6)
    {
        die('نام صاحب حساب اول اشتباه است');
    }
    if (!strlen($n2)>6)
    {
        die('نام صاحب حساب دوم اشتباه است');
    }
    
  // payane etebar sanji
  
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
  
  
        $query = "UPDATE `diff` SET `fvar` = '$title' WHERE `tit` = 'titr'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        
        $query = "UPDATE `diff` SET `fvar` = '$url' WHERE `tit` = 'surl'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $query = "UPDATE `diff` SET `fvar` = '$mail' WHERE `tit` = 'smail'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $query = "UPDATE `diff` SET `fvar` =  '$tel1',
                `mvar` = '$tel2' WHERE `tit` = 'tels'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $query = "UPDATE `diff` SET `fvar` =  '$sh_kart1',
        `mvar` = '$sh_hesab1' WHERE `tit` = 'sh1'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        
        $query = "UPDATE `diff` SET `fvar` =  '$sh_kart2',
                `mvar` = '$sh_hesab2' WHERE `tit` = 'sh2'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));

        $query = "UPDATE `diff` SET `fvar` =  '$n1',
        `mvar` = '$b1' WHERE `tit` = 'sa1'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        
        $query = "UPDATE `diff` SET `fvar` =  '$n2',
                `mvar` = '$b2' WHERE `tit` = 'sa2'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));        
        
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        
        $query = "UPDATE `diff` SET `fvar` =  '0' WHERE `tit` = 'errors'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
             echo 'اطلاعات سايت شما با موفقيت ويرايش شد';
             echo '<meta http-equiv="Refresh" content="3;../cp/index.php">';
     
        mysqli_close($isCon);
  
?>