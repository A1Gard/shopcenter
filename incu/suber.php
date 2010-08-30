  <div class="posttop">تلاش براي تاييد</div>
    <div class="posttxt">
		<?php
            if (isset($_SESSION['sabad']))
            {
                $iconuter = 0 ;
                $tmp = 1 ;
                foreach ($_POST as $temp)
                {   
                   $iconuter++ ;
                   $per[$iconuter] = intval($temp); 
                   if ($per[$iconuter]<1)
                   {
                     $tmp = 0;
                     break;
                   } 
                } 
                if ($tmp==0)
                {
                    echo 'هيچ محصولي نمي تواند برار با صفر يا منفي باشد';
                }
                else
                {
                    $countSend  =  count($per);
                    
                    $ar = split('[|.-]',$_SESSION['sabad']);
                    $countSabad = count($ar)-1;
                    
                    if ( !($countSabad==$countSend) )
                    {
                        echo 'خطا در انجام عمليات : <br />';
                        echo '<br />'.'اين خطا ممكن است به يكي از علت ها زير باشد'.'<br />';
                        echo 'شما در فاصله تاييد فرم قبلي محصولي را اضافه يا حذف كرده ايد'.'<br />';
                        echo 'يا اختلال در مرور گر است'.'<br />';
                        echo 'يا شما در حال هك كردن سايت هستيد كه ما جلوگيري كرده ايم'.'<br /><br />';
                        echo 'براي حل اين مشكل ابتدا مرحله آخر را تكرار كنيد اگر نتيجه اي در 
                        بر نداشت مرورگر خود را ببنيد و دوباره باز كنيد و دوباره مرحله 
                        آخر انجام دهيد  و اگر درست نشد همه محصولات را حذف و ازابتدا اضافه كنيد ضمناً 
                        بهتر است از فاير فاكس استفاده كنيد ';
                    }
                    else
                    {
                        $iconuter = 0 ;
                        foreach ($ar as $temp)
                        {
                            if ($temp != '')
                            {
                            $query = "SELECT `prc` AS tii FROM `pers` WHERE `id` = '$temp'";
                
                                $result = mysqli_query($isCon,$query)
                                or Die(mysqli_errno($isCon));
                                $iconuter++;
                                $tem = mysqli_fetch_array($result);
                                $prc[$iconuter] = $tem[tii];
                            }
                        }
                        $total=0;
                        $iconuter = 0 ;
                        foreach ($per as $zarib)
                        {
                            $iconuter++;
                            $total += ($prc[$iconuter] * $zarib) ;
                        }
                        $ar = split('[|]',$_SESSION['ml']);
                        $uid = $ar[0];
                        $mail = $ar[1];
                        
                        $query = "SELECT `id` FROM `msh` WHERE `id` = '$uid' AND `mail` = '$mail'";
                        
                        $result = mysqli_query($isCon,$query)
                        or Die(mysqli_errno($isCon));
                        
                        if (mysqli_num_rows($result)!=1)
                        {
                            unset($_SESSION['ml']);
                            die ('هويت شما جعلي مي باشد');
                        }
                        
                        $pers = $_SESSION['sabad'];
                        $ted ='';
                        foreach ($per as $tmp)
                        {
                            $ted.= $tmp.'|';
                        }
                        
                        $query = "SELECT `id` FROM `sabad` WHERE `uid` = '$uid' AND `pased` = '0'";
                            
                                $result = mysqli_query($isCon,$query)
                                or Die(mysqli_errno($isCon));
                                
                            if (mysqli_num_rows($result)==1)
                            {
                                echo 'شما قبلا يك سبد بدون پيگيري ارسال كرده بوديد كه اين سبد جايگزين آن شد. ';
                                echo '<br /><br />';
                                $rwu = mysqli_fetch_row($result);
                                $ids = $rwu[0];   
                                
                                $query = "REPLACE INTO sabad 
                        (`id`,`uid`,`perss`,`ted`,`prices`,`new`,`pased`)
                 VALUES ('$ids','$uid','$pers','$ted','$total','1','0')";
                            
                            }
                            else
                            {
                        $query = "INSERT INTO `sabad` 
                        (`uid`,`perss`,`ted`,`prices`,`new`,`pased`)
                 VALUES ('$uid','$pers','$ted','$total','1','0')";
                            }
                                 
                                $result = mysqli_query($isCon,$query)
                                or Die(mysqli_errno($isCon));
                                
                                echo "سبد شما با موفقيت ثبت شد شما مبلغ";
                                echo " <b> $total </b> ";
                                echo 'تومان را به شماره حساب هاي درج شده در سايت بريزيد <br />';
                                echo 'و سپس فيش خود را ثبت نماييد تا محصولات ارسال شوند<br />';
                                echo 'اين فروشگاه معتبر است لذا با پشيمان شدن شما مبلغ شما باز پس فرستاده مي شود'. '<br />';
                                echo 'در صورت داشتن سوال يا مشكل مي توانيد با مدير فروشگاه تماس حاصل نماييد';
                                unset ($_SESSION['sabad']);
                    
                    } 
                    
                }
                
                
            }
            else
            {
                echo 'شما هنوز سبد خردي نداريد';
            }
        ?>
    </div>
