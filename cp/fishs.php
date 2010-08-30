<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @show all fish
 */
 
 include("../inc/Config.php");
 $t = 'همه فيش هاي ثبت شده';// title string
 include_once('../inc/header.php'); 
 include_once('../inc/func.php'); //include functions
 $agent= 12 ;
 include_once('../inc/logindo.php'); // login test
 include_once('../inc/cpside.php'); // enter side bar to page
 
 ?>
 
 <script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(as,ff){
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
            scroll(0,scrollMaxY);
		}
	}
	var queryString = "?id=" + as +"&ff="+ ff;
	ajaxRequest.open("GET", "../ajax/ajaxsb.php" + queryString, true);
	ajaxRequest.send(null); 
    
}
//-->
</script>
 <?php
 
  $now = intval($_GET['page']);
    if ($now==0)
    {
      $min = 0 ;
      $max = 30;
    }else
    {
      $min =  $now * 30 ;
      $max = ($now + 1) * 30;
    }  
     $i = 0 ;

        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
    
 $query = "SELECT `id` , `rcod` , `korf` , `ada`
FROM `fishs`
LIMIT $min, 30";
    
        $result = mysqli_query($isCon,$query)
        or die ($isCon);
        
        $rows = mysqli_num_rows($result);print_r($rows);
        
        while ($rw = mysqli_fetch_row($result))
        {
            $i++;
            $id[$i] = $rw[0];
            $rcod[$i]= $rw[1];
            $korf[$i] = $rw[2];
            $ada[$i] = $rw[3];
        }
        
        mysqli_close($isCon);
?>
<div style="position: absolute;top: 6%;left: 20%;">
<table style="border: 2px solid black;text-align: center; width: 800px;font-size: smaller;">
<tr>
    <td style="border:1px solid black;" >شماره</td>
    <td style="border:1px solid black;" >سبد</td>
    <td style="border:1px solid black;" > نوع </td>
    <td style="border:1px solid black;" > شماره فيش <br /> يا كارت</td>
</tr>
<?php

    for ($j = 1; $j < $i+1;$j++)
    {
        echo '<tr><td style="border:1px solid black;" >'.$id[$j]."</td>";
        echo '<td style="border:1px solid black;" ><input type="submit" value="نمايش سبد" onclick="ajaxFunction('.$rcod[$j].','.$id[$j].')" /></td>
        ';
        if ($korf[$j]==0 || $korf[$j]== 2 || $korf[$j]== -2  )
        {
        echo '<td style="border:1px solid black;" >كارت</td>';
        }else
        {
        echo '<td style="border:1px solid black;" >فيش بانكي</td>';
        }
        echo '<td style="border:1px solid black;" >'.$ada[$j]."</td></tr>";
    }
?>
<tr>
    <td></td>
    <td style="border:1px solid black;" ><?php if($now > 0){echo '<a href="fishs.php?page='.($now-1).'">صفحه قبلی</a>'; } ?></td>
    <td style="border:1px solid black;" ><?php echo "صفحه:".$now; ?></td>
    <td style="border:1px solid black;" ><?php if($rows > 28){echo '<a href="fishs.php?page='.($now+1).'">صفحه بعدی</a>'; } ?></td>
</tr>
</table><br /><br /><br />
<div id="ajaxDiv"></div> 
</div>