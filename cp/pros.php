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
 $agent = 0;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
 $id = $_SESSION['id'];
 
         $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    

    $query = "SELECT `mail` AS ps FROM `users` WHERE `id` = '$id' ";
    
     $result = mysqli_query($isCon,$query)
     or die (mysqli_error($isCon));
 
    $ar = mysqli_fetch_array($result);
    
       mysqli_close($isCon);
?>
<div style="position: absolute;top:6%;left:33%;right:30%;text-align:center;background-color:#DDEEEF;border: groove;">
<form action="../pop/epp.php" method="POST" style="width:100%;">
<br /><br />ويرايش اطلاعات شما<br /><br />
پسورد  شما : <input type="password" name="name" maxlength="23" value="" /> <br /><br />
ايميل  شما :  <input type="text" name="mail" maxlength="29" value="<?php echo $ar[ps]; ?>" /> <br /><br />
پسورد جديد : <input type="password" name="pass1" /> <br /><br />
تكرارپسورد : <input type="password" name="pass2" /> <br /><br />
<input type="submit" value="ويرايش كن" /><input type="reset" /><br /><br />
</form>
</div>