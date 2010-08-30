<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @show new fish
 */
 
 include("../inc/Config.php");
 $t = 'همه فيش هاي ثبت شده';// title string
 include_once('../inc/header.php'); 
 include_once('../inc/func.php'); //include functions
 $agent= 11 ;
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
 
              
        $isCon = mysqli_connect($HostDB,$DBUserVAname,$DBPass,$DBUserVAname)
        or die (mysqli_error($isCon));
        
$page = intval($_GET['page']) ;
    $now = $page ;
    if ($page <= 0)
    {
         $query = "SELECT `id` , `rcod` , `korf` , `ada`
        FROM `fishs` WHERE `korf` = '1' OR `korf` = '0'
        LIMIT 0, 30";
        
        $result = mysqli_query($isCon,$query)
        or die (mysqli_error($isCon));
    }
    else
    {
        $key = 0;
       for ($i = 0;$i < $page; $i++)
       {
          $query = "SELECT `id` , `rcod` , `korf` , `ada`
            FROM `fishs` 
          WHERE   ((`korf` = '1' OR `korf` = '0') AND `id` > '$key')
          LIMIT 0 , 30";
          
                 $result = mysqli_query($isCon,$query)
                 or die (mysqli_error($isCon)); 
          
          mysqli_data_seek($result,2);
          
          while ($rw = mysqli_fetch_row($result))
          {
              $key = $rw[0];
          }  
       }
       
       $query =  "SELECT `id` , `rcod` , `korf` , `ada`
            FROM `fishs` 
          WHERE ((`korf` = '1' OR `korf` = '0') AND `id` > '$key')
          LIMIT 0 , 30";
          
                 $result = mysqli_query($isCon,$query)
                 or die (mysqli_error($isCon));
    
        }
        
        $rows = mysqli_num_rows($result);print_r($rows);
        
        $i = 0;
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
    <td style="border:1px solid black;" > تاييد </td>
</tr>
<?php

    for ($j = 1; $j < $i+1;$j++)
    {
        echo '<tr><td style="border:1px solid black;" >'.$id[$j]."</td>";
        echo '<td style="border:1px solid black;" ><input type="submit" value="نمايش سبد" onclick="ajaxFunction('.$rcod[$j].','.$id[$j].')" /></td>
        ';
        if ($korf[$j]==0 )
        {
        echo '<td style="border:1px solid black;" >كارت</td>';
        }else
        {
        echo '<td style="border:1px solid black;" >فيش بانكي</td>';
        }
        echo '<td style="border:1px solid black;" >'.$ada[$j]."</td>";
        echo '<td style="border:1px solid black;" >
              <form style="height:25px;" method="POST" action="../pop/fisher.php" >
            <input type="hidden" name="idd" value="'.$id[$j].'" />
            <select name="tay">
            <option value="1">تاييد شد</option>
            <option value="0">رد شد</option>
            </select> <input type="submit" value="ثبت كن" style="height:25px;" /> 
            </form></td></tr>';
    }
?>
<tr>
    <td></td>
    <td style="border:1px solid black;" ><?php if($now > 0){echo '<a href="nfish.php?page='.($now-1).'">صفحه قبلی</a>'; } ?></td>
    <td style="border:1px solid black;" ><?php echo "صفحه:".$now; ?></td>
    <td style="border:1px solid black;" ><?php if($rows > 28){echo '<a href="nfish.php?page='.($now+1).'">صفحه بعدی</a>'; } ?></td>
</tr>
</table><br /><br /><br />
<div id="ajaxDiv"></div> 
</div>
