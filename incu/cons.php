    <div class="posttop">ارتباط با ما</div>
    <div class="posttxt">
<?php

/**
 * @author 
 * @copyright 2010
 */
 
 $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
  
  
        $query = "SELECT `fvar`,`mvar` FROM `diff` WHERE `tit` = 'tels'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $ars = mysqli_fetch_row($result);
        
        $tel1 = $ars[0];
        $tel2 = $ars[1];
        
        $query = "SELECT `fvar` AS mails FROM `diff` WHERE `tit` = 'smail'";
  
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
        
        $ar = mysqli_fetch_array($result);
        
        $mail = $ar[mails];
         
         
    if  (!(isset($_POST['mail']) && isset($_POST['name']) 
    && isset($_POST['tel'])&& isset($_POST['text'])) )    
    {
        
        echo '<br /><br />
         با سلام<br /> ضمن خير مقدم خدمت شما
         <br />
         به اطلاعتان مي رسانيم
         <br /><br />
         براي برقراري ارتباط با مسئولين سايت مي توانيد با شماره هاي زير:
         <br /><br /><br /><b>'.$tel1.'</b><br /><br /><b>'.$tel2.'</b><br /><br />
         تماس حاصل نماييد و يا به ايميل زير ميل ارسايل كنيد :
         <br /><br /><br /><b>'.$mail.'</b><br /><br />
         ويا مي توانيد از طريق فرم زير ازتباط برقرار كنيد
         <br /><br /><br />';
         
         ?>
         
         <script type="text/javascript">
<!--
function ValidateForm1(theForm)
{
if (theForm.TextArea2.value == "")
{
   alert("پيام خيلي كوتاه است");
   theForm.TextArea2.focus();
   return false;
}
if (theForm.TextArea2.value.length < 10)
{
   alert("پيام خيلي كوتاه است");
   theForm.TextArea2.focus();
   return false;
}
var strFilter = /^0[-+]?\d*\.?\d*$/;
var chkVal = theForm.Editbox1.value;
if (!strFilter.test(chkVal))
{
   alert("شماره تماس را وارد كنيد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value == "")
{
   alert("شماره تماس را وارد كنيد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length < 10)
{
   alert("شماره تماس را وارد كنيد");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length > 12)
{
   alert("شماره تماس را وارد كنيد");
   theForm.Editbox1.focus();
   return false;
}
var strValue = theForm.Editbox3.value;
var strFilter = /^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i;
if (!strFilter.test(strValue))
{
   alert("آدرس ايميل صحيح نيست");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value == "")
{
   alert("آدرس ايميل صحيح نيست");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox3.value.length < 5)
{
   alert("آدرس ايميل صحيح نيست");
   theForm.Editbox3.focus();
   return false;
}
if (theForm.Editbox2.value == "")
{
   alert("نام مناسب نيست");
   theForm.Editbox2.focus();
   return false;
}
if (theForm.Editbox2.value.length < 4)
{
   alert("نام مناسب نيست");
   theForm.Editbox2.focus();
   return false;
}
return true;

}

var a = 2;

function MPT(e)
{
if (a=='1')
{

}
else
{
   e.value = '';
   a = '1';
}
}
//-->
</script>
<br /><br />
<div id="wb_Form1" style="position:absolute; background-color:#F7F9FC;border:1px #000000 solid;width:361px;height:305px;margin:0px;margin-right:75px;">
<form name="Form1" method="post" action="contact.php" id="Form1" onsubmit="return ValidateForm1(this)">
<textarea name="text" id="TextArea2" onclick="MPT(this);return false;" style="position:absolute;left:18px;top:125px;width:318px;height:136px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:0" rows="7" cols="35">پيام شما</textarea>
<input type="text" id="Editbox1" style="position:absolute;left:17px;top:88px;width:244px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:1" name="tel" value="" maxlength="11">
<input type="text" id="Editbox3" style="position:absolute;left:16px;top:53px;width:244px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:2" name="mail" value="" maxlength="45">
<input type="text" id="Editbox2" style="position:absolute;left:16px;top:19px;width:244px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:3" name="name" value="" maxlength="25">
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:280px;top:89px;width:69px;height:18px;text-align:left;z-index:4;">
<font style="font-size:15px" color="#000000" face="Arial"><b>شماره تماس:</b></font></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:280px;top:56px;width:57px;height:18px;text-align:left;z-index:5;">
<font style="font-size:15px" color="#000000" face="Arial"><b>ايميل شما:</b></font></div>
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:280px;top:19px;width:57px;height:18px;text-align:left;z-index:6;">
<font style="font-size:15px" color="#000000" face="Arial"><b>نام شما:</b></font></div>
<input type="submit" id="Button2" name="" value="ارسال" style="position:absolute;left:18px;top:271px;width:96px;height:25px;font-family:Arial;font-size:13px;z-index:7">
</form>
</div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

         
         
         <?php
         echo'<br /><br />موفق باشيد<br /><br />';
    }
    else
    {
    //send mail
    $subject=$_POST['name'];//Subject OF Mail
    $from=$_POST['mail'];//User Email Address
    $message=$_POST['text'].'<br /><br />
    Tel : '.$_POST['tel'];//Body Of Mail

    // Additional headers
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'To: '.$to . "\r\n";
    $headers .= 'From: '.$from . "\r\n";
    $headers .= 'Reply-To: '.$to . "\r\n";
    
    // Mail it
    $sendmail=mail($mail, $subject, $message, $headers);
    if ($sendmail)
    echo "<br /><br />نامه شما با موفقت ارسال شد<br /><br />به زودي پاسخ آن را دريافت مي كنيد <br /><br />";//Sucess Message
    else
    echo "<br /><br />در ارسال نامه مشکلي وجود دارد مجدد سعي کنيد<br /><br />";//Failed Message

    }
?>        
           
</div>