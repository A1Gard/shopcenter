<?php

/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @login test
 */
    if ( (isset($_SESSION['user']) && isset($_SESSION['typp'])) && isset($_SESSION['test']))
    {
        //test is real login?
        if ( $_SESSION['typp'] == 'Admin' )
        {
            if ($_SESSION['test']== md5($_SERVER['REMOTE_ADDR']) )
            {
                // logined ....
                $username = $_SESSION['user']; 
            }
            else
            {logout();}
        }
        else
        {
        $ar =split('[|]',$_SESSION['typp']);
        
        $x = in_array($agent,$ar);
        
        if ($x!=1)
        {
            echo '<meta http-equiv="Refresh" content="3;../cp/index.php">' ;
            die('شما دسترسي لازم را نداريد');}
        }
            if ($_SESSION['test']== md5($_SERVER['REMOTE_ADDR']) )
            {
                // logined ....
                $username = $_SESSION['user']; 
            }
            else
            {logout();}
    }
    else
    {
        //logout is fake...
        logout();
    }

?>