<!-- sidebar -->
  <div class="side">
    <div class="sidetop" > <h4 class="maren" >گروهها</h4></div>
    <div class="sideplace">
<?php

 $query = "SELECT * FROM `gp`";
 $gps[0] = 'بدون گروه' ;
 echo '<a href="http://shop.jmbafgh.ir/gp.php?id=0">بدون گروه</a> <br />';
    
    $result = mysqli_query($isCon,$query)
    or die ($isCon);
    
    while($rows = mysqli_fetch_row($result))
    {
       echo '<a href="http://shop.jmbafgh.ir/gp.php?id='.$rows[0].'">'.$rows[1].'</a> <br />'; 
       $is = $rows[0];
       $gps[$is] = $rows[1] ;
    }

?>
    </div>
    
	
	  <div class="sidetop" ><h4 class="maren" >ميانبر ها</h4></div>
    <div class="sideplace">
        <a href="http://jmbafgh.ir/" >پرتال</a><br/>
        <a href="http://shop.jmbafgh.ir/" >صفحه اصلي</a><br/>
        <a href="http://shop.jmbafgh.ir/register.php" >ثبت نام</a><br/>
        <a href="http://shop.jmbafgh.ir/help.php" >اطلاعات شماره حساب</a><br/>
        <a href="http://shop.jmbafgh.ir/help.php" >راهنمايي</a><br/>
        <a href="http://shop.jmbafgh.ir/fish.php" >ثبت فيش</a><br/>
        <a href="http://shop.jmbafgh.ir/all.php" >همه مصولات</a><br/>
        <a href="http://shop.jmbafgh.ir/sabad.php" >سبد خريد</a><br/>
        <a href="http://shop.jmbafgh.ir/final.php" >پايان خريد</a><br/>
        <a href="http://shop.jmbafgh.ir/contact.php" >ارتباط با ما</a><br/>
    </div>
	
    
    <div class="sidetop" ><h4 class="maren" >جستجو</h4></div>
    <div class="sideplace">
      <form method="GET" action="search.php">
        <br/> <input type="text" maxlength="20" name="word" align="center" /> <br/>
        <input type="submit" value="جستجو" />
      </form>
    </div>
    
    <div class="sidetop" ><h4 class="maren" >رهگيري سفارش</h4></div>
    <div class="sideplace">
      <form method="GET" action="rah.php">
        <br/>كد:<input type="text" maxlength="20" name="code" align="center" /> <br/>
        <input type="submit" value="رهگيري كن" />
      </form>
    </div>
  

  
   </div>
  </div>
<!-- end -->