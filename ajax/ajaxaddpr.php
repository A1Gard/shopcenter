<?php
session_start();
if (isset($_GET['ac']) && isset($_GET['id']))
{
    if ($_GET['ac']==0)
    {
        $ar = split('[|.-]',$_SESSION['sabad']);
        $id = $_GET['id'];
        $total = '';
        foreach ($ar as $temp)
        {
            if ($temp != $id && $temp!='')
            {
                $total .= $temp.'|';
            }
        }
        
        $_SESSION['sabad'] = $total;
        
        echo '<br /><br /><br />'.'محصول با موفقيت حذف شد'.'<br /><br />';
        echo '<input type="submit" value="اضافه كردن اين محصول به سبد خريد" onclick="ajaxFunction(1)" /><br />';
    }
    else
    {
        $ar = split('[|.-]',$_SESSION['sabad']);
        $id = $_GET['id'];
        $total = '';
        foreach ($ar as $temp)
        {
            if (!($temp == $id) && !($temp == '') )
            {
                $total.= $temp.'|';
            }
        }
        $total .= $id.'|'; 
        $_SESSION['sabad'] = $total;
        
        echo '<br /><br /><br />'.'شما اين محصول را به سبد خريد ارسال كرده ايد '.'<br /><br />';
        echo '<input type="submit" value="حذف اين محصول" onclick="ajaxFunction(0)" /><br />';
    }
}
else
{
    echo 'در خواست معتبر نبود';
}

?>