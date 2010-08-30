<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @Edit gp
 */
 
 include("../inc/Config.php");
 $t = 'ویرایش گروه';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
 $agent= 5 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
            $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
            or die (mysqli_error($isCon));
    if ( !(isset($_POST['gp'])) )
    {
?>

<!-- select form -->
<div id="wb_Form1" style="position:absolute;background-color:#F7F9FC;border:2px #000000 groove;left:300px;top:77px;width:408px;height:91px;z-index:3">
<form name="editsel" method="post" action="editgp.php" id="Form1">
<div id="wb_Text1" style="margin:0;padding:0;position:absolute;left:361px;top:37px;width:47px;height:16px;text-align:left;z-index:0;">
<font style="font-size:13px" color="#000000" face="Arial"><b>گروه:</b></font></div>
<div style="position:absolute;left:130px;top:35px;width:221px;height:20px;border:1px #C0C0C0 solid;z-index:1">
<select name="gp" size="1" id="Combobox1" style="position:absolute;	left:0px;top:0px;width:100%;height:100%;border-width:0px;font-family:Courier New;font-size:13px;">
  <?php

    $query = "SELECT * FROM `gp`";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        while($rw=mysqli_fetch_row($result))
        {
            echo '<option value="'.$rw[0].'">'.$rw[1].'</option>';
        }

  ?>



</select>
</div>
<input type="submit" id="Button1" name="" value="آماده ويرايش کن" style="position:absolute;left:14px;top:33px;width:105px;height:25px;font-family:Arial;font-size:13px;z-index:2">
</form>
</div>

<?php
  }
  else
  {
  $gp = intval($_POST['gp']);
  $query = "SELECT `name` FROM `gp` WHERE `id` = '$gp'";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon); 
        
        while ($rw = mysqli_fetch_row($result))
        {
            $name = $rw[0]; 
        }
?>

<!-- editt form -->
<script type="text/javascript">
<!--
function Validatefrmedit(theForm)
{
if (theForm.Editbox1.value == "")
{
   alert("Please enter a value for the \"مشکل با نام گروه وجود دارد\" field.");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length < 3)
{
   alert("Please enter at least 3 characters in the \"مشکل با نام گروه وجود دارد\" field.");
   theForm.Editbox1.focus();
   return false;
}
if (theForm.Editbox1.value.length > 28)
{
   alert("Please enter at most 28 characters in the \"مشکل با نام گروه وجود دارد\" field.");
   theForm.Editbox1.focus();
   return false;
}
return true;
}
//-->
</script>

<div id="wb_Form2" style="position:absolute;background-color:#F7F9FC;border:2px #000000 solid;left:299px;top:189px;width:409px;height:77px;z-index:9">
<form name="frmedit" method="post" action="../pop/egp.php" id="Form2" onsubmit="return Validatefrmedit(this)">
<div id="wb_Text2" style="margin:0;padding:0;position:absolute;left:263px;top:7px;width:131px;height:16px;text-align:left;z-index:3;">
<font style="font-size:13px" color="#000000" face="Arial"><b>ID گروه در حال ويرايش:</b></font></div>
<div id="wb_Text3" style="margin:0;padding:0;position:absolute;left:184px;top:6px;width:47px;height:16px;text-align:left;z-index:4;">
<font style="font-size:13px" color="#000000" face="Arial"><b><?php echo $gp ; ?></b></font></div>
<input type="text" id="Editbox1" style="position:absolute;left:140px;top:36px;width:198px;height:18px;border:1px #C0C0C0 solid;font-family:Courier New;font-size:13px;z-index:5" name="name" value="<?php echo $name; ?>" maxlength="30">
<div id="wb_Text4" style="margin:0;padding:0;position:absolute;left:354px;top:38px;width:44px;height:16px;text-align:left;z-index:6;">
<font style="font-size:13px" color="#000000" face="Arial"><b>نام:</b></font></div>
<input type="hidden" name="id" value="<?php echo $gp; ?>" />
<input type="submit" id="Button2" name="" value="ويرايش کن" style="position:absolute;left:17px;top:34px;width:104px;height:25px;font-family:Arial;font-size:13px;z-index:7">
</form>
</div>

<?php
  }
    mysqli_close($isCon);
?>