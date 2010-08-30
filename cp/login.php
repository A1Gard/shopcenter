<?php

/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @login page
 */
 include("../inc/Config.php");
 $t = 'ورود به سامانه مدیریت';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 
        unset($_SESSION['user']);
        unset($_SESSION['test']);
        unset($_SESSION['typp']);
?>
<script type="text/javascript">
<!--
function Validatelogin(theForm)
{
var strFilter = /^[A-Za-zƒٹŒژڑœ‍ںہءآأؤإئابةتثجحخدذرزسشصضطظعغـفقكàلâمنهوçèéêëىيîïًٌٍَôُِّùْûü‎‏ے]*$/;
var chkVal = theForm.Editbox1.value;
if (!strFilter.test(chkVal))
{
   alert("نام کابري را درست وارد کنيد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length < 4)
{
   alert("نام کابري را درست وارد کنيد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length > 28)
{
   alert("نام کابري را درست وارد کنيد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox2.value == "")
{
   alert("pass");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length < 2)
{
   alert("pass");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length > 32)
{
   alert("pass");
   theForm.Editbox2.focus();
   return false;
}
return true;
}
//-->
</script>
</head>
<body>
<div id="wb_Form1" style="position:absolute;background-color:#F7F9FC;border:2px #000000 solid;left:200px;top:140px;width:331px;height:297px;z-index:8">
<form name="login" method="post" action="../pop/logtest.php" id="Form1" onsubmit="return Validatelogin(this)">
<div id="wb_Image1" style="margin:0;padding:0;position:absolute;left:88px;top:12px;width:149px;height:101px;text-align:left;z-index:0;">
<img src="http://aph.ir/images/small.png" id="Image1" alt="" border="0" style="width:149px;height:101px;"/></div>
<input type="text" id="Editbox1" style="position:absolute;left:22px;top:166px;width:228px;height:18px;border:1px #C0C0C0 solid;font-family:Tahoma;font-size:13px;z-index:1" name="user" value="" maxlength="35" tabindex="1">
<input type="password" id="Editbox2" style="position:absolute;left:22px;top:215px;width:228px;height:18px;border:1px #C0C0C0 solid;font-family:Tahoma;font-size:13px;z-index:2" name="pass" value="" maxlength="32" tabindex="2">
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:261px;top:217px;width:61px;height:16px;text-align:left;z-index:3;">
<font style="font-size:13px" color="#000000" face="Tahoma">گذرواژه:</font></div>
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:261px;top:167px;width:61px;height:16px;text-align:left;z-index:4;">
<font style="font-size:13px" color="#000000" face="Tahoma">نام کابري:</font></div>
<input type="submit" id="Button2" name="" value="ورود به سامانه" style="position:absolute;left:146px;top:260px;width:107px;height:25px;font-family:Arial;font-size:13px;z-index:5" tabindex="3"/>
<input type="reset" id="Button1" name="" value="دوباره" style="position:absolute;left:23px;top:260px;width:119px;height:25px;font-family:Arial;font-size:13px;z-index:6" tabindex="4"/>
<div id="wb_Marquee1" style="margin:0;padding:0;position:absolute;left:11px;top:115px;width:304px;height:27px;text-align:left;z-index:7;">
<marquee direction="right" height="27" scrolldelay="90" scrollamount="6" behavior="scroll" loop="0" style="background-color:transparent;" id="Marquee1" onmouseover="this.stop()" onmouseout="this.start()"><font style="font-size:11px" color="#000000" face="Tahoma"><a href="http://aph.ir">اين سامانه قدرت گرفته از سامانه هاي گروه آلفا تکنولوژي مي باشد</a></font></marquee></div>
</form>
</div>

