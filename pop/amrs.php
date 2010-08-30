<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add moshtari
 */
 
 include("../inc/Config.php");
 $t = 'تلاش برای ثبت نام';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions

 $name = anti_injection($_POST['ffname']);
 $idm  = anti_injection($_POST['idm']);
 $mail = anti_injection($_POST['mail']);
 if (trim($_POST['p1'])== trim($_POST['p2']))
 {
    $pass = PassWordGen($_POST['p1']);
 }else
 {
    die('پسورد یکی نیست');
 }
 $tel = anti_injection($_POST['tel']);
 $addrr = anti_injection($_POST['addr']);
 $idp = anti_injection($_POST['idp']);
 
    if (strlen($name)<6)
    {
        die('نام کاربری درست وارد نشده');
    }
    if (!strlen($idm)<10)
    {
        if (!ereg("[0-9]",$idm,$regs))
        {
            die("کد ملی درست وارد نشده");
        }
    }else
    {
        die('کد ملی درست وارد نشده');
    }
    
    if (!ereg(".+@.+\.[A-z]{2,3}",$mail,$regs))
    {
        die('ایمیل درست وارد نشده');
    }
    if (!ereg("^\0[0-9]{11}$",$tel,$regs))
    {
        die('تلفن اشتباه هست');
    }
    if (strlen($addrr)<8)
    {
        die('آدرس خیلی کوتاه هست');
    }
    if (!ereg("^[0-9]{10}$",$idp,$regs))
    {
        die('کد پستی اشتباه وارد شده است');
    }
    $ip = $_SERVER['REMOTE_ADDR'];
    
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
        
    $query = "SELECT `name` FROM `msh` WHERE `vip` = '$ip'";
    
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
            
            if (mysqli_num_rows($result)>0)
            {
                
             while ( $rows = mysqli_fetch_row($result))
              {
                $nme .= '<pre>'.$rows[0].'</pre>';
              }  
              echo '<font face="tahoma" size="3" color="#0E01FF">';
              echo "</pre>قبلا با IP شما ثبت نام شده '<pre>";
              echo "<pre><strong>$ip</strong></pre>";
              echo "<pre>با نام های:</pre>";
              print_r($nme);
              mysqli_close($isCon);
              die('<pre>حتما با مدیر تماس بگیرید</pre>');
              echo '</font>';
            }
            
        
    $query = "INSERT INTO
     `msh` (`name`,`mail`,`pass`,`idm`,`tel`,`addr`,`idp`,`vip`,`ban`,`con`)
    VALUES ('$name','$mail','$pass','$idm','$tel','$addrr','$idp','$ip','0','0')";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
 
        
    echo 'شما با موفقیت ثبت نام کردید';
    echo '<meta http-equiv="Refresh" content="3;../index.php">';
    mysqli_close($isCon);
?>