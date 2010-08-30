<?php
 if (isset($_GET['id']))
 {
    $id = intval($_GET['id']);
    $de = 0 ;
    
    if ($id > 0)
    {
        $query = "SELECT `viw` AS vii FROM `st` WHERE `id` = '$id' ";
        
         
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
            
           
           if (mysqli_num_rows($result)==1)
           {
            
            $ar = mysqli_fetch_array($result);
            $vin = $ar[vii];
           
           $vin++;
           $query = "UPDATE `st` SET `viw` = '$vin' WHERE `id` = '$id' ";   
            
                $result = mysqli_query($isCon,$query)
                or die ($isCon);
            
           }
        
        $query = "SELECT * FROM `pers` WHERE `id` = '$id'";
        
            $result = mysqli_query($isCon,$query)
            or die ($isCon);
            
        if (mysqli_num_rows($result) == 1)
        {
            //namayesh
            while ($rw = mysqli_fetch_row($result))
            {
                $titl = $rw[1];
                $posy = $rw[2];
                $data = '13'.$rw[7].'/'.$rw[6].'/'.$rw[5];
                $gp = $rw[3];
                $prc = $rw[8];
                $vj = $rw[9];
            }
            $tit .= ' - '.$titl ;
            if ($vj==0)
            {
                $titl = 'متاسفيم';
                $posy = 'محصول مورد نظر تمام شده است و در انبار موجود نيست '.'<br />'.'براي اطلاعات بيشتر با مدير تماس بگيريد...';
            }
            else
            {
                $de = 1 ;
            }
        }
        else
        {
            $titl = 'Not Find...';
            $posy = 'محصول مورد نظر  ثبت نشده است...';
        }
    }
    else
    {
        $titl = 'Not Find...';
        $posy = 'محصول مورد نظر  مجاز نيست';
    }
 }
 else
 {
    $titl = 'Not Find...';
    $posy = 'پيدا نشد لينك را بررسي كيند اشكال از لينك است';
 }

?>    
<script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(as){
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
    var idd = document.getElementById('num');
	var queryString = "?ac=" + as + "&id="+ idd.value;
	ajaxRequest.open("GET", "ajax/ajaxaddpr.php" + queryString, true);
	ajaxRequest.send(null); 
}
//-->
</script>
    <div class="posttop"><?php echo $titl."<br /><title>$tit</title>"; ?></div>
    <div class="posttxt">
		<?php echo $posy;if(!$de==0){
              echo '<b class="maren2"><pre></pre><br />'.'زمان ارسال: '.$data .' هـ.ش </b>';
              echo '<b class="maren2"><br />'.'قميت: '.$prc.' تومان </b>';
              echo '<b class="maren2"><br />'.'گروه: '.$gps[$gp].'</b>' ;
              echo '<b class="maren2"><br />'.'اين محصول موجود است</b>';
              echo '<input type="hidden" id="num" value="'.$id.'" />';
              echo '<div id="ajaxDiv" style="text-align: center;" ><br /><br /><br />';
              if ($_SESSION['sabad'])
              {
                $iff = split('[|.-]',$_SESSION['sabad']); 
                if (in_array($id,$iff))
                {
                    echo 'شما اين محصول را به سبد خريد ارسال كرده ايد '.'<br /><br />';
                    echo '<input type="submit" value="حذف اين محصول" onclick="ajaxFunction(0)" /><br /><br />';
                    
                }
                else
                {
                    echo 'اين محصول هنوز انتخاب نشده است '.'<br /><br />';
                    echo '<input type="submit" value="اضافه كردن اين محصول به سبد خريد" onclick="ajaxFunction(1)" /><br /><br />';
                }
              }
              else
              {
                echo 'شما هنوز هيچ محصولي به سبد خريد اضافه نكرده ايد '.'<br /><br />';
                echo '<input type="submit" value="اضافه كردن اين محصول به سبد خريد" onclick="ajaxFunction(1)" /><br /><br />';
              }
              
              }
        ?>
        </div>
    </div> <div style="text-align: center;"></div>