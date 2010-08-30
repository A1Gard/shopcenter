<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add user 
 */
 
 include("../inc/Config.php");
 $t = 'ويرايش اطلاعات شما';// title string
 include_once('../inc/header.php'); 
 include_once('../inc/func.php'); //include functions
 $agent= 6 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
 
         $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    

    $query = "SELECT `fvar` AS tit  FROM `diff` WHERE `tit` = 'titr'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $title = $ar[tit];
 


    $query = "SELECT `fvar` AS tit  FROM `diff` WHERE `tit` = 'surl'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $url = $ar[tit];
 
 
     $query = "SELECT `fvar` AS tit  FROM `diff` WHERE `tit` = 'smail'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $mail = $ar[tit];
 
 
 $query = "SELECT `fvar` AS tit,`mvar` AS ttt  FROM `diff` WHERE `tit` = 'tels'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $tel1 = $ar[tit];
     $tel2 =  $ar[ttt];
     
     
     $query = "SELECT `fvar` AS tit,`mvar` AS ttt  FROM `diff` WHERE `tit` = 'sh1'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $sh_kart1 = $ar[tit];
     $sh_hesab1 =  $ar[ttt];
     
     
     
     $query = "SELECT `fvar` AS tit,`mvar` AS ttt  FROM `diff` WHERE `tit` = 'sh2'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $sh_kart2 = $ar[tit];
     $sh_hesab2 =  $ar[ttt];
     
     
     
     $query = "SELECT `fvar` AS tit,`mvar` AS ttt  FROM `diff` WHERE `tit` = 'sa1'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $n1 = $ar[tit];
     $b1 =  $ar[ttt];
     
     
     $query = "SELECT `fvar` AS tit,`mvar` AS ttt  FROM `diff` WHERE `tit` = 'sa2'";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
     
     $ar =  mysqli_fetch_array($result);
     $n2 = $ar[tit];
     $b2 =  $ar[ttt];
 
    
?>
<script type="text/javascript">
<!--
function ValidateForm1(theForm)
{
if (theForm.Editbox1.value == "")
{
   alert("طول عنوان سايت مناسب نيست");
   theForm.Editbox1.focus();
   return false;
}
var strValue = theForm.Editbox13.value;
var strFilter = /(http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
if (!strFilter.test(strValue))
{
   alert("آدرس سايت اشتباه است");
   theForm.Editbox13.focus();
   return false;
}
if (theForm.Editbox1.value.length < 6)
{
   alert("طول عنوان سايت مناسب نيست");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length > 50)
{
   alert("طول عنوان سايت مناسب نيست");
   theForm.Editbox1.focus();
   return false;
}
var strValue = theForm.Editbox2.value;
var strFilter = /^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i;
if (!strFilter.test(strValue))
{
   alert("ايميل وارد شده صحيح نيست");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value == "")
{
   alert("ايميل وارد شده صحيح نيست");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length < 5)
{
   alert("ايميل وارد شده صحيح نيست");
   theForm.Editbox2.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox5.value;
if (!strFilter.test(chkVal))
{
   alert("شماره كارت شماره حساب اول صحيح نيست");
   theForm.Editbox5.focus();
   return false;
}
if (theForm.Editbox5.value == "")
{
   alert("شماره كارت شماره حساب اول صحيح نيست");
   theForm.Editbox5.focus();
   return false;
}
if (theForm.Editbox5.value.length < 12)
{
   alert("شماره كارت شماره حساب اول صحيح نيست");
   theForm.Editbox5.focus();
   return false;
}
if (theForm.Editbox5.value.length > 17)
{
   alert("شماره كارت شماره حساب اول صحيح نيست");
   theForm.Editbox5.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox6.value;
if (!strFilter.test(chkVal))
{
   alert("شماره حساب اول درست نيست");
   theForm.Editbox6.focus();
   return false;
}
if (theForm.Editbox6.value == "")
{
   alert("شماره حساب اول درست نيست");
   theForm.Editbox6.focus();
   return false;
}
if (theForm.Editbox6.value.length < 6)
{
   alert("شماره حساب اول درست نيست");
   theForm.Editbox6.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox10.value;
if (!strFilter.test(chkVal))
{
   alert("شماره حساب دوم اشتباه است");
   theForm.Editbox10.focus();
   return false;
}
if (theForm.Editbox10.value == "")
{
   alert("شماره حساب دوم اشتباه است");
   theForm.Editbox10.focus();
   return false;
}
if (theForm.Editbox10.value.length < 6)
{
   alert("شماره حساب دوم اشتباه است");
   theForm.Editbox10.focus();
   return false;
}
if (theForm.Editbox11.value == "")
{
   alert("نام بانك دوم كوتاه است");
   theForm.Editbox11.focus();
   return false;
}
if (theForm.Editbox11.value.length < 3)
{
   alert("نام بانك دوم كوتاه است");
   theForm.Editbox11.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox4.value;
if (!strFilter.test(chkVal))
{
   alert("تلفن دوم اشكال دارد");
   theForm.Editbox4.focus();
   return false;
}
if (theForm.Editbox4.value == "")
{
   alert("تلفن دوم اشكال دارد");
   theForm.Editbox4.focus();
   return false;
}
if (theForm.Editbox4.value.length < 8)
{
   alert("تلفن دوم اشكال دارد");
   theForm.Editbox4.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox3.value;
if (!strFilter.test(chkVal))
{
   alert("تلفن اول اشتباه است");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value == "")
{
   alert("تلفن اول اشتباه است");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value.length < 8)
{
   alert("تلفن اول اشتباه است");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox12.value == "")
{
   alert("نام صاحب حساب دوم اشتباه است");
   theForm.Editbox12.focus();
   return false;
}
if (theForm.Editbox12.value.length < 5)
{
   alert("نام صاحب حساب دوم اشتباه است");
   theForm.Editbox12.focus();
   return false;
}
if (theForm.Editbox8.value == "")
{
   alert("نام شماره حساب اول مشكل دارد");
   theForm.Editbox8.focus();
   return false;
}
if (theForm.Editbox8.value.length < 5)
{
   alert("نام شماره حساب اول مشكل دارد");
   theForm.Editbox8.focus();
   return false;
}
if (theForm.Editbox7.value == "")
{
   alert("بانك شماره حساب اول اشتباه است");
   theForm.Editbox7.focus();
   return false;
}
if (theForm.Editbox7.value.length < 3)
{
   alert("بانك شماره حساب اول اشتباه است");
   theForm.Editbox7.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox9.value;
if (!strFilter.test(chkVal))
{
   alert("شمراه كارت حساب دوم صحيح نيست");
   theForm.Editbox9.focus();
   return false;
}
if (theForm.Editbox9.value == "")
{
   alert("شمراه كارت حساب دوم صحيح نيست");
   theForm.Editbox9.focus();
   return false;
}
if (theForm.Editbox9.value.length < 11)
{
   alert("شمراه كارت حساب دوم صحيح نيست");
   theForm.Editbox9.focus();
   return false;
}
if (theForm.Checkbox1.checked != true)
{
   alert("شما هنوز تاييد نكرده ايد كه اطلاعات صحيح است");
   theForm.Checkbox1.focus();
   return false;
}
return true;
}
//-->
</script>
</head>
<body>
<div id="wb_Form1" style="position:absolute;background-color:#F2F2FD;border:3px #000000 ridge;left:216px;top:0px;width:445px;height:600px;z-index:29">
<form name="Form1" method="post" action="../pop/esite.php" id="Form1" onsubmit="return ValidateForm1(this)">
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:304px;top:95px;width:91px;height:18px;text-align:left;z-index:0;">
<font style="font-size:15px" color="#000000" face="Arial"><b>ايميل مدير:</b></font></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:304px;top:128px;width:91px;height:18px;text-align:left;z-index:1;">
<font style="font-size:15px" color="#000000" face="Arial"><b>تلفن اول :</b></font></div>
<div id="wb_Text4" style="margin:0;padding:0;position:absolute;left:304px;top:159px;width:91px;height:18px;text-align:left;z-index:2;">
<font style="font-size:15px" color="#000000" face="Arial"><b>تلفن دوم:</b></font></div>
<div id="wb_Text5" style="margin:0;padding:0;position:absolute;left:304px;top:200px;width:131px;height:18px;text-align:left;z-index:3;">
<font style="font-size:15px" color="#000000" face="Arial"><b> ش كارت حساب اول:</b></font></div>
<div id="wb_Text7" style="margin:0;padding:0;position:absolute;left:304px;top:235px;width:136px;height:18px;text-align:left;z-index:4;">
<font style="font-size:15px" color="#000000" face="Arial"><b>شماره حساب اول:</b></font></div>
<div id="wb_Text13" style="margin:0;padding:0;position:absolute;left:304px;top:457px;width:103px;height:18px;text-align:left;z-index:5;">
<font style="font-size:15px" color="#000000" face="Arial"><b>نام صاحب حساب:</b></font></div>
<input type="text" id="Editbox1" style="position:absolute;left:84px;top:60px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:6" name="tit" value="<?php echo $title; ?>" maxlength="45" tabindex="1">
<input type="text" id="Editbox2" style="position:absolute;left:84px;top:93px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:7" name="mail" value="<?php echo $mail; ?>" maxlength="45" tabindex="2">
<input type="text" id="Editbox5" style="position:absolute;left:84px;top:200px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:8" name="shk1" value="<?php echo $sh_kart1; ?>" maxlength="16" tabindex="5">
<input type="text" id="Editbox6" style="position:absolute;left:84px;top:232px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:9" name="shh1" value="<?php echo $sh_hesab1; ?>" maxlength="20" tabindex="6">
<div id="wb_Text8" style="margin:0;padding:0;position:absolute;left:304px;top:267px;width:91px;height:18px;text-align:left;z-index:10;">
<font style="font-size:15px" color="#000000" face="Arial"><b>بانك حساب اول</b></font></div>
<div id="wb_Text9" style="margin:0;padding:0;position:absolute;left:304px;top:301px;width:103px;height:18px;text-align:left;z-index:11;">
<font style="font-size:15px" color="#000000" face="Arial"><b>نام صاحب حساب:</b></font></div>
<div id="wb_Text10" style="margin:0;padding:0;position:absolute;left:304px;top:356px;width:131px;height:18px;text-align:left;z-index:12;">
<font style="font-size:15px" color="#000000" face="Arial"><b> ش كارت حساب دوم:</b></font></div>
<div id="wb_Text11" style="margin:0;padding:0;position:absolute;left:305px;top:389px;width:136px;height:18px;text-align:left;z-index:13;">
<font style="font-size:15px" color="#000000" face="Arial"><b>شماره حساب دوم:</b></font></div>
<input type="text" id="Editbox10" style="position:absolute;left:84px;top:388px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:14" name="shh2" value="<?php echo $sh_hesab2 ?>" maxlength="20" tabindex="10">
<div id="wb_Text12" style="margin:0;padding:0;position:absolute;left:305px;top:421px;width:91px;height:18px;text-align:left;z-index:15;">
<font style="font-size:15px" color="#000000" face="Arial"><b>بانك حساب دوم</b></font></div>
<input type="text" id="Editbox11" style="position:absolute;left:84px;top:420px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:16" name="bank2" value="<?php echo $b2; ?>" maxlength="25" tabindex="11">
<div id="wb_Text6" style="margin:0;padding:0;position:absolute;left:155px;top:517px;width:210px;height:18px;text-align:left;z-index:17;">
<font style="font-size:15px" color="#000000" face="Arial"><b>تاييد مي كنم اطلاعات كاملا صحيح است</b></font></div>
<input type="text" id="Editbox4" style="position:absolute;left:84px;top:157px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:18" name="tel2" value="<?php echo $tel2; ?>" maxlength="12" tabindex="4">
<input type="text" id="Editbox3" style="position:absolute;left:84px;top:125px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:19" name="tel1" value="<?php echo $tel1; ?>" maxlength="12" tabindex="3">
<input type="text" id="Editbox12" style="position:absolute;left:84px;top:454px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:20" name="shname2" value="<?php echo $n2; ?>" maxlength="45" tabindex="12">
<input type="text" id="Editbox8" style="position:absolute;left:84px;top:298px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:21" name="shname1" value="<?php echo $n1; ?>" maxlength="45" tabindex="8">
<input type="text" id="Editbox7" style="position:absolute;left:84px;top:265px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:22" name="bank1" value="<?php echo $b1; ?>" maxlength="25" tabindex="7">
<input type="text" id="Editbox9" style="position:absolute;left:84px;top:357px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:23" name="shk2" value="<?php echo $sh_kart2; ?>" maxlength="16" tabindex="9">
<input type="checkbox" id="Checkbox1" name="check" value="on" style="position:absolute;left:353px;top:515px;z-index:24" tabindex="13">
<input type="submit" id="Button1" name="" value="ويرايش" style="position:absolute;left:117px;top:557px;width:96px;height:25px;font-family:Arial;font-size:13px;z-index:25" tabindex="13">
<input type="reset" id="Button2" name="" value="Reset" style="position:absolute;left:221px;top:557px;width:96px;height:25px;font-family:Arial;font-size:13px;z-index:26" tabindex="15">
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:304px;top:64px;width:91px;height:18px;text-align:left;z-index:27;">
<font style="font-size:15px" color="#000000" face="Arial"><b>عنوان سايت:</b></font></div>
<div id="wb_Text14" style="margin:0;padding:0;position:absolute;left:105px;top:8px;width:250px;height:24px;text-align:center;z-index:28;">
<font style="font-size:20px" color="#0000FF" face="Arial"><b>ويرايش اطلاعات سايت</b></font></div>
<div id="wb_Text15" style="margin:0;padding:0;position:absolute;left:308px;top:490px;width:103px;height:18px;text-align:left;z-index:28;">
<font style="font-size:15px" color="#000000" face="Arial"><b>آدرس سايت</b></font></div>
<input type="text" id="Editbox13" style="position:absolute;left:84px;top:486px;width:202px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:30" name="url" value="<?php echo $url; ?>" maxlength="45" tabindex="12">
</form>
</div> 
<?php
   mysqli_close($isCon);
?>