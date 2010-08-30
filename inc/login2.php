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
            {die('');}
        }
        else
        {
        $ar =split('[|]',$_SESSION['typp']);
        if (!in_array($agent,$ar));
        {die('тЦг осйясМ АгрЦ яг ДогяМо');}
        }
    }
    else
    {
        //logout is fake...
        die('');
    }

?>