<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @install page 1
 */
 
 // include ned files
 include_once('../inc/Config.php');
 $t = 'install step 1';// title string
 include_once('../inc/header.php');
 
    $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
 
 //data base char set utf-8 persian //   
 $query = "ALTER DATABASE `$DBUserVAname` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
 
   $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
 // create table  users // 
 $query = "CREATE TABLE `users` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
`name` VARCHAR( 25 ) NOT NULL ,
`pass` VARCHAR( 40 ) NOT NULL ,
`mail` VARCHAR( 30 ) NOT NULL ,
`typ` VARCHAR( 75 ) NOT NULL ,
PRIMARY KEY ( `id` )
) CHARACTER SET utf8 COLLATE utf8_general_ci";
  
  
   $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
  // create table groups //
 $query = "CREATE TABLE `gp` (
 `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `name` VARCHAR( 30 ) NOT NULL
 ) CHARACTER SET utf8 COLLATE utf8_general_ci";
  
    $result =  mysqli_query($isCon,$query)
    or die ($isCon);
 
 // create perducs table //  
 $query = "CREATE TABLE pers (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tit VARCHAR(40),
  txt LONGTEXT,
  gp INT,
  us INT,
  day TINYINT,
  mon TINYINT,
  yer TINYINT,
  prc INT UNSIGNED,
  vj TINYINT) CHARACTER SET utf8 COLLATE utf8_general_ci"; 
  
    $result = mysqli_query($isCon,$query)
    or die ($isCon);    
 
 // create state table //   
 $query = "CREATE TABLE st (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tit VARCHAR(40),
  viw INT) CHARACTER SET utf8 COLLATE utf8_general_ci"; 
  
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
  
 // create moshtari table //   
 $query = "CREATE TABLE msh (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(40),
  mail VARCHAR(30),
  pass VARCHAR(40),
  idm VARCHAR(12),
  tel VARCHAR(15),
  addr TINYTEXT,
  idp VARCHAR(12),
  vip VARCHAR(20),
  tar DATE,
  ban TINYINT,
  con INT) CHARACTER SET utf8 COLLATE utf8_general_ci"; 
  
    $result = mysqli_query($isCon,$query)
    or die ($isCon);   
    
 // create sabad table //   
 $query = "CREATE TABLE sabad (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  uid INT,
  perss TINYTEXT,
  ted TINYTEXT,
  prices BIGINT UNSIGNED,
  new TINYINT,
  pased TINYINT) CHARACTER SET utf8 COLLATE utf8_general_ci"; 
  
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
  // create diffrent table table //   
 $query = "CREATE TABLE fishs (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  rcod INT,
  korf TINYINT,
  ada INT UNSIGNED) CHARACTER SET utf8 COLLATE utf8_general_ci"; 
  
    $result = mysqli_query($isCon,$query)
    or die ($isCon);    
    
   // create diffrent table table //   
 $query = "CREATE TABLE diff (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tit VARCHAR(40),
  fvar VARCHAR(250),
  mvar VARCHAR(128),
  ivar INT) CHARACTER SET utf8 COLLATE utf8_general_ci"; 
  
    $result = mysqli_query($isCon,$query)
    or die ($isCon);    
     
    mysqli_close($isCon);
?>
<script type="text/javascript">
<!--
function Validateff(theForm)
{
if (theForm.Editbox1.value == "")
{
   alert("عنوان را تصحيح نماييد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length < 3)
{
   alert("عنوان را تصحيح نماييد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length > 38)
{
   alert("عنوان را تصحيح نماييد");
   theForm.Editbox1.focus();
   return false;
}
var strFilter = /^[A-Za-zƒٹŒژڑœ‍ںہءآأؤإئابةتيثجحخدذرزسشصضطظعغـفقكàلâمنهوçèéêëىيîïًٌٍَôُِّùْûü‎‏ے]*$/;
var chkVal = theForm.Editbox2.value;
if (!strFilter.test(chkVal))
{
   alert("نام کاربري را تصحيح کنيد");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length < 4)
{
   alert("نام کاربري را تصحيح کنيد");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length > 30)
{
   alert("نام کاربري را تصحيح کنيد");
   theForm.Editbox2.focus();
   return false;
}
var strValue = theForm.Editbox3.value;
var strFilter = /^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i;
if (!strFilter.test(strValue))
{
   alert("ايميل خود را درست وارد کنيد ايميل معتبر نيست");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value == "")
{
   alert("ايميل خود را درست وارد کنيد ايميل معتبر نيست");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value.length < 6)
{
   alert("ايميل خود را درست وارد کنيد ايميل معتبر نيست");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value.length > 35)
{
   alert("ايميل خود را درست وارد کنيد ايميل معتبر نيست");
   theForm.Editbox3.focus();
   return false;
}
return true;
}
//-->
</script>
</head>
<body>
<div id="wb_Form1" style="position:absolute;background-color:#F7F9FC;border:2px #00005E inset;left:40%;top:129px;width:329px;height:330px;z-index:12">
<form name="ff" method="post" action="install2.php" id="Form1" onsubmit="return Validateff(this)">
<div id="wb_Text5" style="margin:0;padding:0;position:absolute;left:43px;top:109px;width:258px;height:14px;text-align:left;z-index:0;">
<font style="font-size:12px" color="#000000" face="Tahoma">اطلاعات شما به عنوان مدير سايت ثبت مي شود</font></div>
<input type="text" id="Editbox1" style="position:absolute;left:15px;top:162px;width:228px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:1" name="tit" value="" maxlength="38" tabindex="1">
<input type="text" id="Editbox2" style="position:absolute;left:15px;top:197px;width:227px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:2" name="uname" value="" maxlength="30" tabindex="2">
<input type="text" id="Editbox3" style="position:absolute;left:15px;top:227px;width:227px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:3" name="mail" value="" maxlength="30" tabindex="4">
<input type="text" id="Editbox4" style="position:absolute;left:15px;top:258px;width:228px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:4" name="pppppp" value="" tabindex="5">
<input type="submit" id="Button1" name="" value="ادامه" style="position:absolute;left:135px;top:289px;width:110px;height:25px;font-family:Arial;font-size:13px;z-index:5" tabindex="6">
<input type="reset" id="Button2" name="" value="دوباره" style="position:absolute;left:15px;top:289px;width:105px;height:25px;font-family:Arial;font-size:13px;z-index:6" tabindex="7">
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:257px;top:162px;width:71px;height:14px;text-align:left;z-index:7;">
<font style="font-size:12px" color="#000000" face="Tahoma">عنوان سايت:</font></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:259px;top:199px;width:60px;height:14px;text-align:left;z-index:8;">
<font style="font-size:12px" color="#000000" face="Tahoma">نام کاربري:</font></div>
<div id="wb_Text4" style="margin:0;padding:0;position:absolute;left:261px;top:229px;width:48px;height:14px;text-align:left;z-index:9;">
<font style="font-size:12px" color="#000000" face="Tahoma">ايميل:</font></div>
<div id="wb_Text6" style="margin:0;padding:0;position:absolute;left:261px;top:261px;width:55px;height:14px;text-align:left;z-index:10;">
<font style="font-size:12px" color="#000000" face="Tahoma">گذرواژه:</font></div>
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:0px;top:13px;width:320px;height:99px;text-align:center;z-index:11;">
<font style="font-size:12px" color="#32CD32" face="Tahoma">ارتباط با ديتا بيس با موفقيت انجام شد<br>
<br>
جداول با موفقيت ساخته شدند<br>
<br>
و اکنون شما اطلاعات خود را براي راهندازي وارد کنيد<br>
<br>
</font></div>
</form>
</div>
