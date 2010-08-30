<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @index cp
 */
 
 include("../inc/Config.php");
 $t = 'صفحه اصلی مدیریت';// title string
 include_once('../inc/header.php');
 include_once('../inc/func.php'); //include functions
  $agent= 0 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
  
    $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
 
   $query = "SELECT COUNT(`id`) AS max FROM `sabad` WHERE `new` = '1' ";
  
        
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    $ar = mysqli_fetch_array($result);
    
    $s_count = $ar[max];
    
    $query = "SELECT COUNT(`id`) AS max FROM `fishs` WHERE (`korf` = '1' OR `korf` = '0') ";
  
        
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    $ar = mysqli_fetch_array($result);
    
    $f_count = $ar[max];
    
    //errors = 
     
    $query = "SELECT `fvar` AS er FROM `diff` WHERE `tit` = 'errors'";
  
        
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    $ar = mysqli_fetch_array($result);
    
    $error = $ar[er];
    
    switch ($error)
    {
        case 1 : $error = '<label style="margin:12px;">خطاي مهلك تنظيمات سايت شما ناقص هست حتما آن را تكميل كنيد</label>';
        break;
        default : $error = 'همه چيز عادي است';
    }   
?>
<div style="position:absolute;top:8%;left:30%;right:10%;border-style: inset;;background-image:url(../img/alphaw.png);">
<br /><br /> <div style="text-align: center;"> <img src="http://aph.ir/images/small.png" border="0" align="middle" /><br /> قدرت گرفته از سامانه هاي گروه آلفا تكنولوژي</div><br /><br /> <br />
<b><font face="tahoma" color="#FF0101"><?php echo $error ; ?></font></b>
<br /><br /><br />
<?php
$ar = split('[| ,/]',$_SERVER['HTTP_USER_AGENT']);
if (!in_array('Firefox',$ar))
{
    echo 'لطفا از مرورگر فايرفكس (Mozilla Firefox) استفاده كنيد... <br /><br />';
}

echo '<label style="margin:12px;"> در نبود شما '.$s_count.' سفارش جديد اضافه شدند '.'<br /> <br /></label>';
echo '<label style="margin:12px;"> شما داراي '.$f_count.' فيش ثبت شده ي جديد هستيد '.'<br /> <br /></label>';
?>
<br /><br />
</div>