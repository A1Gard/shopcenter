<?php

/**
 * @author 
 * @copyright 2010
 */
 include("../inc/Config.php");
 include_once('../inc/func.php'); //include functions
 $agent= 12 ;
 include_once('../inc/login2.php'); // login test
 
 if(isset($_GET['id']))
 {
    $id = intval($_GET['id']);
    if($id > 0)
    {
        
            $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
    or die (mysqli_error($isCon));
        $query = "SELECT `id`,`perss`,`ted`,`prices`,`uid` FROM `sabad` WHERE  `id` = '$id'";
    
           $result = mysqli_query($isCon,$query)
           or die ($isCon);
           
        if (mysqli_num_rows($result)!=1)
        {
       echo 'سبد معتبر نيست'; 
         }
        else
        {

        while ($rwu = mysqli_fetch_row($result))
        {
            $sid  = $rwu[0];
            $pers = $rwu[1];
            $ted  = $rwu[2];
            $prc  = $rwu[3];
            $uid  = $rwu[4];
        }
        
        
        if ($td == 0)
        {
                $perss = split('[|]',$pers);
                $teds =  split('[|]',$ted);
    
                $iconuter = 0 ;
                unset($pers);
                foreach ($perss as $pr)
                 {
                    if ($pr != '')
                     {
        
                    $query = "SELECT `tit` AS tit FROM `pers` WHERE `id` = '$pr'";
       
                        $result = mysqli_query($isCon,$query)
                        or die ($isCon);
       
                        $ars = mysqli_fetch_array($result);
                        $pers[$iconuter] =  $ars[tit];
                        $iconuter++;
                    }
                }
          }
 ?>
 
   <table align="center" style="text-align:center;"  border="1" >
    <tr>
    <td>شماره</td><td>محصول</td><td>تعداد</td>
    </tr>
    
<?php
 $iconuter = 0 ;
 foreach ($pers as $tit)
 {
    echo '<tr><td>'.($iconuter + 1).'</td><td>'.$tit.'</td><td>'.$teds[$iconuter].'</td></tr>';
    $iconuter++;
 }
?>
 
 </table><br /><br />
 <div style="text-align:center;">
 <?php    
     
     echo 'مبلغ : '.$prc.' تومان <br />';
     
     $query ="SELECT `name` AS tit , `tel` AS tell ,`addr` AS address 
     , `idp` AS postid 
            FROM `msh` WHERE `id` = '$uid'";
     
            $result = mysqli_query($isCon,$query)
           or die ($isCon);
           
           $ar = mysqli_fetch_array($result);
     
 
     echo '<br /> فيش شماره ي : <b><font color="#FF0101">'.$_GET['ff'].'</font></b><br /><br />';
     echo 'توسط جناب:'."$ar[tit]<br /><br />";
     echo 'با شماره تلفن:'."$ar[tell]<br /><br />";
     echo 'كد پستي:'."$ar[postid]<br /><br />";
     echo 'آدرس :'."$ar[address]<br /><br /><br />";
     echo 'شماره كابري :'."$uid<br /><br />";
     }
  }else
  {
    echo 'از وجود سبد مطمئنيد؟';
  }
  
  }
 else
 {
    echo 'خطا در درخواست شما';
 }
?>
</div> 