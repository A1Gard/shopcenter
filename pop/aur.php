<?php

/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @Add user
 */
 
 include("../inc/Config.php");
 $t = 'تلاش براي افزودن كاربر';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
  $agent= 13 ;
 include_once('../inc/logindo.php'); // login test


if (!(isset($_POST['name']) && isset($_POST['mail'])&&
 isset($_POST['pass1']) && isset($_POST['pass2']) ))
 {
    die('اطلاعات ناقص هست');
 }

    $name = anti_injection($_POST['name']);
    $mail = anti_injection($_POST['mail']);
    
    if ($_POST['pass2'] != $_POST['pass1'])
    {
        die('پسورد ها يكي نيست');
    }
    $pass = PassWordGen($_POST['pass1']);
    
    $len = strlen($name);
    
    if ($len > 24 || $len < 5)
    {
        die('طول نام كاربري مناسب نيست');
    }

    if (!ereg(".+@.+\.[A-z]{2,3}",$mail,$regs))
    {
        die('ایمیل درست وارد نشده');
    }
    
    
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
        // براي چند كاربره تغيير كند Admin
        
    $query = "INSERT INTO 
    `users` (`name`,`pass`,`mail`,`typ`)
    VALUES ('$name','$pass','$mail','0')";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     echo 'كاربر ساخته شد';
    
    $query = "SELECT MAX(`id`) AS mm FROM `users`";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon)); 
     
     $ar = mysqli_fetch_array($result);
     $max = $ar[mm];
     
 ?>
 
<div id="wb_Form2" style="position:absolute;background-color:#CCFFCC;border:2px #000000 outset;left:70px;top:40px;width:433px;height:484px;z-index:30">
<form name="Form2" method="post" action="uagent.php" id="Form2" onsubmit="return confirm ('آيا از اطلاعات خود مطمئن هستيد؟ اين عمل برگشت پذير نيست')"  >
<input type="hidden" name="ids" value="<?php echo $max ; ?>">
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:120px;top:55px;width:250px;height:14px;text-align:right;z-index:0;">
<font style="font-size:12px" color="#000000" face="Tahoma">توانايي ايجاد پست را داشته باشد</font></div>
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:120px;top:83px;width:250px;height:14px;text-align:right;z-index:1;">
<font style="font-size:12px" color="#000000" face="Tahoma">توانايي ويرايش پست ها&nbsp; را داشته باشد</font></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:120px;top:113px;width:250px;height:14px;text-align:right;z-index:2;">
<font style="font-size:12px" color="#000000" face="Tahoma">آمار محصولات را بتواند مشاهده كند</font></div>
<div id="wb_Text6" style="margin:0;padding:0;position:absolute;left:118px;top:169px;width:250px;height:14px;text-align:right;z-index:3;">
<font style="font-size:12px" color="#000000" face="Tahoma">بتواند&nbsp; گروه ها ويرايش كند</font></div>
<div id="wb_Text4" style="margin:0;padding:0;position:absolute;left:120px;top:142px;width:250px;height:14px;text-align:right;z-index:4;">
<font style="font-size:12px" color="#000000" face="Tahoma">بتواند گروهي ايجاد كند</font></div>
<div id="wb_Text7" style="margin:0;padding:0;position:absolute;left:120px;top:223px;width:250px;height:14px;text-align:right;z-index:5;">
<font style="font-size:12px" color="#000000" face="Tahoma">بتواند ليست مشتريان را ببيند</font></div>
<div id="wb_Text8" style="margin:0;padding:0;position:absolute;left:120px;top:250px;width:250px;height:14px;text-align:right;z-index:6;">
<font style="font-size:12px" color="#000000" face="Tahoma">بتواند مشتري را محروم كند</font></div>
<div id="wb_Text9" style="margin:0;padding:0;position:absolute;left:119px;top:277px;width:250px;height:14px;text-align:right;z-index:7;">
<font style="font-size:12px" color="#000000" face="Tahoma">بتواند سفارشات جديد را مديريت كند</font></div>
<div id="wb_Text10" style="margin:0;padding:0;position:absolute;left:118px;top:307px;width:250px;height:14px;text-align:right;z-index:8;">
<font style="font-size:12px" color="#000000" face="Tahoma">توانايي مشاهده تمام سفارشات را داشته باشد</font></div>
<div id="wb_Text11" style="margin:0;padding:0;position:absolute;left:73px;top:336px;width:296px;height:14px;text-align:right;z-index:9;">
<font style="font-size:12px" color="#000000" face="Tahoma">توانايي مديريت و تاييد فيش هاي جديد را داشته باشد </font></div>
<div id="wb_Text12" style="margin:0;padding:0;position:absolute;left:117px;top:366px;width:250px;height:14px;text-align:right;z-index:10;">
<font style="font-size:12px" color="#000000" face="Tahoma">توانايي مشاهده همه فيش ها را داشته باشد</font></div>
<div id="wb_Text13" style="margin:0;padding:0;position:absolute;left:57px;top:395px;width:312px;height:14px;text-align:right;z-index:11;">
<font style="font-size:12px" color="#000000" face="Tahoma">توانايي ايجاد كابر جديد را داشته باشد (توصيه نمي شود)</font></div>
<input type="checkbox" id="Checkbox1" name="ch1" value="1" style="position:absolute;left:374px;top:55px;z-index:12" tabindex="1">
<input type="checkbox" id="Checkbox2" name="ch2" value="2" style="position:absolute;left:374px;top:83px;z-index:13" tabindex="2">
<input type="checkbox" id="Checkbox6" name="ch6" value="6" style="position:absolute;left:374px;top:196px;z-index:14" tabindex="6">
<input type="checkbox" id="Checkbox8" name="ch8" value="8" style="position:absolute;left:374px;top:249px;z-index:15" tabindex="8">
<input type="checkbox" id="Checkbox11" name="ch11" value="11" style="position:absolute;left:374px;top:336px;z-index:16" tabindex="11">
<input type="checkbox" id="Checkbox12" name="ch12" value="12" style="position:absolute;left:374px;top:364px;z-index:17" tabindex="12">
<div id="wb_Text5" style="margin:0;padding:0;position:absolute;left:120px;top:196px;width:250px;height:14px;text-align:right;z-index:18;">
<font style="font-size:12px" color="#000000" face="Tahoma">دسترسي تنظيمات سايت داشته باشد(توصيه نمي شود)</font></div>
<input type="checkbox" id="Checkbox4" name="ch4" value="4" style="position:absolute;left:374px;top:141px;z-index:19" tabindex="4">
<input type="checkbox" id="Checkbox3" name="ch3" value="3" style="position:absolute;left:374px;top:111px;z-index:20" tabindex="3">
<input type="checkbox" id="Checkbox5" name="ch5" value="5" style="position:absolute;left:374px;top:169px;z-index:21" tabindex="5">
<input type="checkbox" id="Checkbox7" name="ch7" value="7" style="position:absolute;left:374px;top:222px;z-index:22" tabindex="7">
<input type="checkbox" id="Checkbox10" name="ch10" value="10" style="position:absolute;left:374px;top:307px;z-index:23" tabindex="10">
<input type="checkbox" id="Checkbox13" name="ch13" value="13" style="position:absolute;left:374px;top:393px;z-index:24" tabindex="13">
<input type="reset" id="Button1" name="" value="Reset" style="position:absolute;left:133px;top:440px;width:96px;height:25px;font-family:Arial;font-size:13px;z-index:25" tabindex="15">
<input type="submit" id="Button2" name="" value="تاييد" style="position:absolute;left:231px;top:440px;width:133px;height:25px;font-family:Arial;font-size:13px;z-index:26" tabindex="14">
<input type="checkbox" id="Checkbox9" name="ch9" value="9" style="position:absolute;left:374px;top:276px;z-index:27" tabindex="9">
<div id="wb_Text14" style="margin:0;padding:0;position:absolute;left:47px;top:13px;width:352px;height:19px;text-align:center;z-index:28;">
<font style="font-size:17px" color="#000000" face="Arial"><b>لطفا دسترسي ها اين كاربر را مشخص كنيد</b></font></div>
</form>
</div>

 
 <?php 
     
        mysqli_close($isCon);
?>