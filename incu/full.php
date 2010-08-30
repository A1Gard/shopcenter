    <div class="posttop">پايان خريد</div>
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
    echo "لطفا يا وارد شويد يا ثبت نام كنيد بعد وارد شودي".'<br />'.'<br /><a href="http://shop.jmbafgh.ir/register.php"><br /> <b>ثبت نام كنيد</b><br /></a><br />';
    echo '<form action="final.php" method="POST" style="border: 1px solid black;width:60%;">
ورود: <br /><br />
<label>پست الكترونيك :<input type="text" name="mail" /></label><br /><br />
<label>گذر واژه شما : <input type="password" name="pass" /></label> <br /><br />
<input type="submit" value="ورود" /></form>'.'<br />';
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
                        echo '<meta http-equiv="Refresh" content="4;final.php">';
                        
                        
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
    
 ?>   
    <title>پايان خريد</title>
    <form id="frm" onsubmit="return confirm ('آيا از اطلاعات خود مطمئن هستيد؟ اين عمل برگشت پذير نيست')"  style="text-align: center;" method="POST" action="sub.php" >
    <br /><br />
    <table border="1" style="border-color:black;" align="center" >
    <tr>
    <td>شماره</td><td>محصول</td><td>تعداد</td>
    </tr>
     <?php 
        $query = "SELECT `fvar` AS ccc FROM `diff` WHERE `tit` = 'surl'";
                
        $result = mysqli_query($isCon,$query)
        or Die(mysqli_error($isCon));
        
        $tem = mysqli_fetch_array($result);
        $url = $tem[ccc];
        
        $iconuter = 0 ;
        $ar = split('[|]',$_SESSION['sabad']);
        foreach ($ar as $temp)
        {
                $query = "SELECT `tit` AS tii FROM `pers` WHERE `id` = '$temp'";
                
                $result = mysqli_query($isCon,$query)
                or Die(mysqli_error($isCon));
                
                $iconuter++;
                
                $tem = mysqli_fetch_array($result);
                $pers[$iconuter] = $tem[tii];
                $pid[$iconuter] = $temp ;
        }
        $iconuter = 0 ;
        foreach ($pers as $tmp)
        {
            if ($tmp=='')
             {continue;}
             
            $iconuter++;
            echo '<tr>
            <td>'.$iconuter.': </td><td> <a href="'.$url.'/show.php?id='.$pid[$iconuter].'" >'.$tmp.'</a></td><td><input type="text" maxlength="3" name="'.$iconuter.'" value="1" style="width:30px;" /></td></tr>'; 
        }
        echo '</table>';
        echo '<br /><br />'.'<input type="submit" value="پايان خريد" />';

 }
 
 ///////////////////////////////////////////////////////////////////////////


?>
</form>
    </div>
           
</div>