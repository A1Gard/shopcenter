<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @add user 
 */
 
 include("../inc/Config.php");
 $t = 'افزودن كاربر';// title string
 include_once('../inc/header.php'); 
 include_once('../inc/func.php'); //include functions
 $agent= 13 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
?>
<div style="position: absolute;top:6%;left:33%;right:30%;text-align:center;background-color:#DDEEEF;border: groove;">
<form action="../pop/aur.php" method="POST" style="width:100%;">
<br /><br />افزودن كاربر<br /><br />
نام كاربري  : <input type="text" name="name" maxlength="23"  /> <br /><br />
ايميل ايشان :  <input type="text" name="mail" maxlength="29" /> <br /><br />
پسورد ايشان : <input type="password" name="pass1" /> <br /><br />
تكرار پسورد : <input type="password" name="pass2" /> <br /><br />
<input type="submit" value="افزودن" /><input type="reset" /><br /><br />
</form>
</div>