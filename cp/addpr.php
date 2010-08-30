<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add preduct
 */
 
 include("../inc/Config.php");
 $t = 'اضافه کردن محصول';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 1 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
?>
<script language="JavaScript" type="text/javascript" src="wysiwyg.js">
</script>

<script type="text/javascript">
<!--
function Validateadd_post(theForm)
{
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox2.value;
if (!strFilter.test(chkVal))
{
   alert("يک ماه نهايتاً 31 روز دارد");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length < 1)
{
   alert("يک ماه نهايتاً 31 روز دارد");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length > 2)
{
   alert("يک ماه نهايتاً 31 روز دارد");
   theForm.Editbox2.focus();
   return false;
}
var strValue = theForm.Editbox2.value;
if (strValue != "" && !(strValue < 32))
{
   alert("يک ماه نهايتاً 31 روز دارد");
   theForm.Editbox2.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox3.value;
if (!strFilter.test(chkVal))
{
   alert("يک سال نهايتاً 12 ماه دارد");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value.length < 1)
{
   alert("يک سال نهايتاً 12 ماه دارد");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value.length > 2)
{
   alert("يک سال نهايتاً 12 ماه دارد");
   theForm.Editbox3.focus();
   return false;
}
var strValue = theForm.Editbox3.value;
if (strValue != "" && !(strValue < 13))
{
   alert("يک سال نهايتاً 12 ماه دارد");
   theForm.Editbox3.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox4.value;
if (!strFilter.test(chkVal))
{
   alert("شما مي توانيد بين سالهاي 1380 تا 1399 انتخاب نماييد");
   theForm.Editbox4.focus();
   return false;
}
if (theForm.Editbox4.value.length < 1)
{
   alert("شما مي توانيد بين سالهاي 1380 تا 1399 انتخاب نماييد");
   theForm.Editbox4.focus();
   return false;
}
if (theForm.Editbox4.value.length > 2)
{
   alert("شما مي توانيد بين سالهاي 1380 تا 1399 انتخاب نماييد");
   theForm.Editbox4.focus();
   return false;
}
var strValue = theForm.Editbox4.value;
if (strValue != "" && !(strValue < 100 && strValue > 79))
{
   alert("شما مي توانيد بين سالهاي 1380 تا 1399 انتخاب نماييد");
   theForm.Editbox4.focus();
   return false;
}
var strFilter = /^[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox5.value;
if (!strFilter.test(chkVal))
{
   alert("فقط عدد مجاز هست");
   theForm.Editbox5.focus();
   return false;
}
var strValue = theForm.Editbox5.value;
if (strValue != "" && !(strValue > 99))
{
   alert("قيمت شما خيلي کم است حتي به 100 تومان هم نمي رسد");
   theForm.Editbox5.focus();
   return false;
}
return true;
}
//-->
</script>


<div id="wb_Form1" style="position:absolute;background-color:#F7F9FC;border:2px #000000 double;left:214px;top:18px;width:538px;height:492px;z-index:19">
<form name="add_post" method="post" action="../pop/apr.php" id="Form1" onsubmit="return Validateadd_post(this)">
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:483px;top:27px;width:45px;height:16px;text-align:left;z-index:0;">
<font style="font-size:13px" color="#000000" face="Arial"><b>عنوان:</b></font></div>

<input type="text" id="Editbox1" style="position:absolute;left:25px;top:26px;width:448px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:1" name="tit" value="" maxlength="30" tabindex="1">
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:479px;top:64px;width:55px;height:16px;text-align:left;z-index:2;">
<font style="font-size:13px" color="#000000" face="Arial"><b>توضيحات:</b></font></div>

<input type="text" id="Editbox2" style="position:absolute;left:396px;top:340px;width:33px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:3" name="day" value="" maxlength="2" tabindex="3">
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:435px;top:342px;width:36px;height:16px;text-align:left;z-index:4;">
<font style="font-size:13px" color="#000000" face="Arial"><b>روز:</b></font></div>
<div id="wb_Text4" style="margin:0;padding:0;position:absolute;left:343px;top:342px;width:27px;height:16px;text-align:left;z-index:5;">
<font style="font-size:13px" color="#000000" face="Arial"><b>ماه:</b></font></div>

<input type="text" id="Editbox3" style="position:absolute;left:304px;top:340px;width:33px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:6" name="mon" value="" maxlength="2" tabindex="4">
<div id="wb_Text5" style="margin:0;padding:0;position:absolute;left:237px;top:342px;width:27px;height:16px;text-align:left;z-index:7;">
<font style="font-size:13px" color="#000000" face="Arial"><b>سال:</b></font></div>
<div id="wb_Text6" style="margin:0;padding:0;position:absolute;left:174px;top:342px;width:18px;height:16px;text-align:left;z-index:8;">
<font style="font-size:13px" color="#000000" face="Arial"><b>13</b></font></div>

<input type="text" id="Editbox4" style="position:absolute;left:195px;top:340px;width:33px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:9" name="yer" value="" maxlength="2" tabindex="5">
<div id="wb_Text7" style="margin:0;padding:0;position:absolute;left:436px;top:392px;width:55px;height:16px;text-align:left;z-index:10;">
<font style="font-size:13px" color="#000000" face="Arial"><b>گروه:</b></font></div>
<div id="wb_Text8" style="margin:0;padding:0;position:absolute;left:118px;top:344px;width:41px;height:16px;text-align:left;z-index:11;">
<font style="font-size:13px" color="#000000" face="Arial"><b>قيمت:</b></font></div>
<div style="position:absolute;left:272px;top:389px;width:153px;height:20px;border:1px #C0C0C0 solid;z-index:12">


<select name="gp" size="1" id="Combobox1" style="position:absolute;	left:0px;top:0px;width:100%;height:100%;border-width:0px;font-family:Courier New;font-size:13px;" tabindex="7">

<option selected value="0">بدون گروه</option>

<?php

    $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
        

  $query = "SELECT * FROM `gp`";
  
        
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
        
        while($rw = mysqli_fetch_row($result))
        {
            echo '<option  value="'.$rw[0].'">'.$rw[1].'</option>';
        }
        
            mysqli_close($isCon);
?>


</select>


</div>

<input type="text" id="Editbox5" style="position:absolute;left:21px;top:341px;width:88px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:13" name="prc" value="" maxlength="9" tabindex="6">

<div style="position:absolute;left:25px;top:64px;width:450px;height:215px;border:0px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:14" > <textarea name="txt" id="TextArea1"  rows="12" cols="52" tabindex="2"></textarea> </div>

<div id="wb_Text9" style="margin:0;padding:0;position:absolute;left:79px;top:393px;width:114px;height:16px;text-align:left;z-index:15;">
<font style="font-size:13px" color="#000000" face="Arial"><b>اين محصول وجود دارد</b></font></div>

<input type="checkbox" id="Checkbox1" name="vj" value="on" checked style="position:absolute;left:58px;top:391px;z-index:16" tabindex="8">

<input type="submit" id="Button1" name="" value="ارسال محصول" style="position:absolute;left:316px;top:441px;width:147px;height:26px;font-family:Arial;font-size:13px;z-index:17" tabindex="9">
<input type="reset" id="Button2" name="" value="پاک کردن همه" style="position:absolute;left:166px;top:441px;width:142px;height:26px;font-family:Arial;font-size:13px;z-index:18" tabindex="10">
</form>
</div>

<script language="javascript1.2">
  generate_wysiwyg('TextArea1');
</script>
