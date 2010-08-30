<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @install page 2
 */
 
 // include ned files
 include_once('../inc/Config.php');
 $t = 'install final';// title string
 include_once('../inc/header.php');
  include_once('../inc/func.php');

 //siat title input //
 $stit = trim($_POST['tit']);
 // user name damin input //
 $uanme = trim($_POST['uname']);
 //pass generat //
 $pass = PassWordGen($_POST['pppppp']);
 // E-mail input //
 $mail = trim($_POST['mail']);
 
    // conect to db 
    $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
    
 // insert first user query 
 $query = "INSERT INTO `users` (`name`,`pass`,`mail`,`typ`) VALUES ('$uanme','$pass','$mail','Admin') ";
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
 
 // insert site title query  
 $query = "INSERT INTO `diff` (`tit`,`fvar`) VALUES ('titr','$stit') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    // for sait url
     $query = "INSERT INTO `diff` (`tit`,`fvar`) VALUES ('surl','http://#.ir') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
        // for sait error
     $query = "INSERT INTO `diff` (`tit`,`fvar`) VALUES ('errors','1') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
        // for sait mail
     $query = "INSERT INTO `diff` (`tit`,`fvar`) VALUES ('smail','#mail@#.ir') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
        // for sait tels
     $query = "INSERT INTO `diff` (`tit`,`fvar`,`mvar`) VALUES ('tels','#','#') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    // shomare karto hesabe 1 
    $query = "INSERT INTO `diff` (`tit`,`fvar`,`mvar`) VALUES ('sh1','#kart','#hesab') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    //shomare karto hesabe 2
    $query = "INSERT INTO `diff` (`tit`,`fvar`,`mvar`) VALUES ('sh2','#kart','#hesab') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    // etelaate hesabe 1
    $query = "INSERT INTO `diff` (`tit`,`fvar`,`mvar`) VALUES ('sa1','#name','#bank') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    // etelaate hesabe 2
    $query = "INSERT INTO `diff` (`tit`,`fvar`,`mvar`) VALUES ('sa2','#name','#bank') ";  
 
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    
    mysqli_close($isCon);
    
?>
<div id="wb_Form1" style="position:absolute;background-color:#CCFFCC;border:1px #000000 outset;left:276px;top:180px;width:267px;height:155px;z-index:2">
<form name="Form1" method="post" action="../index.php" enctype="text/plain" id="Form1">
<input type="submit" id="Button1" name="" value="پايان عمليات" style="position:absolute;left:55px;top:118px;width:158px;height:25px;font-family:Arial;font-size:13px;z-index:0">
<div id="wb_Text1" style="position:absolute;left:48px;top:12px;width:179px;height:95px;z-index:1;" align="center">
<font style="font-size:16px" color="#000000" face="Arial"><b>مدير کل سايت اضافه شد<br>
اکنون نياز است که شما پوشه نصب رو با نام<br>
install <br>
را حذف نماييد</b></font></div>
</form>
</div>