    <div class="posttop">سبد خريد</div>
    <div class="posttxt">
    
    
    <script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxDel(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
		    var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText
		}
	}
	ajaxRequest.open("GET", "ajax/ajaxdel.php", true);
	ajaxRequest.send(null); 
}
//-->
</script>
    	<?php 
                
        echo 'اطلاعات سبد خريد شما از قرار زير تست:'.'<pre></pre>';
        
        $query = "SELECT `fvar` AS ccc FROM `diff` WHERE `tit` = 'surl'";
                
        $result = mysqli_query($isCon,$query)
        or die(mysqli_error($isCon));
        
        $tem = mysqli_fetch_array($result);
        $url = $tem[ccc];
        
        $iconuter = 0 ;
        $ar = split('[|.-]',$_SESSION['sabad']);
        foreach ($ar as $temp)
        {
                $query = "SELECT `tit` AS tii FROM `pers` WHERE `id` = '$temp'";
                
                $result = mysqli_query($isCon,$query)
                or Die(mysqli_errno($isCon));
                
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
            echo $iconuter.': <a href="'.$url.'/show.php?id='.$pid[$iconuter].'" >'.$tmp.'</a><br />'; 
        }
        echo '<div id="ajaxDiv" > <br /><br />
        <input type="submit" value="حذف همه محصولات" onclick="ajaxDel()" />        
         </div>';        
        echo 'در صورت نياز به تغيير تعداد درمرحله آخر مي توانيد تعداد را تغيير دهيد';
        
        ?>
    </div> 