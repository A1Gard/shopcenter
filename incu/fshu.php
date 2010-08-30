    <div class="posttop">ثبت فيش</div>
    <div class="posttxt">
<?php

/**
 * @author 
 * @copyright 2010
 */
    
 if (!isset($_SESSION['ml']))
 {
    if  (!(isset($_POST['mail']) && isset($_POST['pass'])) )    
        {
    echo '<div style="text-align:center;">';
    echo 'لطفا وارد شويد';
    echo '<form action="fish.php" method="POST" style="border: 1px solid black;width:60%;">
ورود: <br /><br />
<label>پست الكترونيك :<input type="text" name="mail" /></label><br /><br />
<label>گذر واژه شما : <input type="password" name="pass" /></label> <br /><br />
<input type="submit" value="ورود" /></form>'.'<br /></div>';
       }else
       {
            //
            include_once('inc/func.php');
            $mail = anti_injection($_POST['mail']);
            $pass = PassWordGen($_POST['pass']);
            
            $query = "SELECT `id`,`mail`,`ban` FROM `msh` WHERE `mail` = '$mail' AND `pass` = '$pass'";
            
                $result = mysqli_query($isCon,$query)
                    or die ($isCon);
                    
    
                if (mysqli_num_rows($result)== 1 )
                {
                    while ($rwu = mysqli_fetch_row($result))
                        {
                        $ssesi  = $rwu[0].'|';
                        $ssesi .= $rwu[1].'|';
                        $ban = $rwu[2];
                        }
                        if ($ban == 1)
                        {
                            echo'شما محروم شده ايد';
                            unset($_SESSION['ml']);
                            echo "</div>";
                            exit;
                        }
                        $ssesi .= md5($_SERVER['REMOTE_ADDR']);
                        $_SESSION['ml'] = $ssesi ;
                        echo 'ورود شما موفقيت آميز بود';
                        echo '<meta http-equiv="Refresh" content="4;fish.php">';
                        
                        
                }
                else
                {
                    echo 'ايميل يا پسورد اشتباه مي باشد';
                    unset($_SESSION['ml']);
                    
                }
       }
       
}
else
{ 
    
     $ar = split('[|]',$_SESSION['ml']);

    $uid = $ar[0];
    $mail = $ar[1];
    $ip = $ar [2];
     
     if ($ip != md5($_SERVER['REMOTE_ADDR']))
     {
        unset($_SESSION['ml']);
        echo 'لطفا دوباره وارد شويد...';
     }

    
    $query = "SELECT `id`,`perss`,`ted`,`prices` FROM `sabad` WHERE  `uid` = '$uid'";
    
           $result = mysqli_query($isCon,$query)
           or die ($isCon);
           
    if (mysqli_num_rows($result)!=1)
    {
       echo 'شما هيچ سبد ثبت شده اي نداريد'; 
    }
    else
    {

        while ($rwu = mysqli_fetch_row($result))
        {
            $pers = $rwu[1];
            $ted  = $rwu[2];
            $prc  = $rwu[3];
            $sid  = $rwu[0];
        }
        
        $query = "SELECT COUNT( `id` ) AS md
        FROM `fishs`
        WHERE `rcod` = '$sid'";
        
        $result = mysqli_query($isCon,$query)
           or die ($isCon);
        
        $ars = mysqli_fetch_array($result);
        $td =  $ars[md];
        
        print_r($td);
        
        if ($td == 0)
        {
        if (!(isset($_POST['korf'])))
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
    
 ?>   
     <title>ثبت فيش</title>
     
  اطلاعات سبد خريد شما از قرار زير است <br /> <br />
 

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
<script language="javascript" type="text/javascript">

function onch (ok)
{
    var bb = ok.value ;
    if (bb == 0)
    {
        document.getElementById("tt").innerHTML = '4 رقم سمت چپ كارت : '; 
    }
    else
    {
        document.getElementById("tt").innerHTML = 'شماره فيش واريزي : ';
    }
}

</script>
    </table><br /><br />
    <?php echo 'مبلغ تمام اجناس : <b>'.$prc.'</b> تومان مي باشد'; ?>
    <br /><br />
    <form method="POST" action="fish.php">
    <label> نوع پرداخت<select name="korf" onblur="onch(this)">
    <option value="0">كارت</option>
    <option value="1">فيش بانكي</option>
    </select></label><br />
    <label id="tt">4 رقم سمت چپ كارت : </label><input type="text" name="num" maxlength="20" /><br />
   <input type="submit" value="تاييد" /><br /><br />
   </form>
<?php

}else{
    if (isset($_POST['num']) && !($_POST['num'] == ''))
    {
        if ($_POST['korf']==0 || $_POST['korf']==1 )
        {
            $ko = intval($_POST['korf']);
            
   $num = intval($_POST['num'] );
   
        if ($num > 999)
         {        
            $query="INSERT INTO `fishs` 
            (`rcod`,`korf`,`ada`)
     VALUES ('$sid','$ko','$num')";
     
            $result = mysqli_query($isCon,$query)
           or die ($isCon);
           
           $query = "SELECT COUNT(`id`) AS fin FROM `fishs` ";
           
           $result = mysqli_query($isCon,$query)
           or die ($isCon);
           
           $ars = mysqli_fetch_array($result);
           $cod =  $ars[fin]+1000;
            
            echo 'فيش شما با موفقيت به ثبت رسيد';
            echo '<br /><br /> كد رهگيري شما '.'<b>'.$cod.'</b> است. آنرا فراموش نكنيد<br /><br />';
            
            $from = 'shop@jmbafgh.ir';
                    // Additional headers
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'To: '.$mail. "\r\n";
    $headers .= 'From: '.$from . "\r\n";
    $headers .= 'Reply-To: '.$from . "\r\n";
                
                $message = ' شما فيشي در سايت ما ثبت كرديد <br /><br />
                براي رهگيري با كد : '.$cod.'مي تواند از طريق سايت اقدام نماييد<br /><br />';
                echo '<br /><br />http://shop.jmbafgh.ir<br /><br />';
            
                $sendmail=mail($mail, $subject, $message, $headers);
                if ($sendmail)
                echo 'كد رهگيري به ايميل شما ارسال شد';
                 
           }
           else {
            
             echo 'اطلاعات ارسال شده ي شماره فيش يا كارت ناقص است';
             echo '<meta http-equiv="Refresh" content="4;fish.php">';
            
           }  
        }else
        {
            echo 'اطلاعات نوع پرداخت اشتباه رسيده است';
            echo '<meta http-equiv="Refresh" content="4;fish.php">';  
        }
       
        
    }else
    {
        echo 'اطلاعات ارسال شده ي شماره فيش يا كارت ناقص است';
        echo '<meta http-equiv="Refresh" content="4;fish.php">';
    }
}

   }else
    {
         echo 'شما هيچ سبد ثبت شده اي نداريد'; 
    }
 }
 }
?>        
           
</div>