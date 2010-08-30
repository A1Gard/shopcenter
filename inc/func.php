<?php
/**
 * @author Alpha Technology Gorup
 * @copyright tir 1389
 * @functions
 */

// pass word generator function
function PassWordGen ($password) 
{
    $password = trim($password);
    // length pass word ;
    $len = strlen($password);
    // if by len 
    if ($len < 4)
    {
        $password = '.::~!#'.$password.'*!~::.';
        $password = md5($password);
    }else
    {
        $password .= '$^%*!~`';
        $password = md5($password); 
    }
    
    // return
    return $password ;
}
/////////////////////////////////////////////////////////////

FUNCTION anti_injection( $text) {
    
            $text = trim($text);
            $banlist = ARRAY (
                    "insert", "select", "update", "delete", "distinct", "having", "truncate", "replace",
                    "handler", "like", " as ", "or ", "procedure", "limit", "order by", "group by", "asc", "desc"
            );
            // ---------------------------------------------
            $text = TRIM ( STR_REPLACE ( $banlist, '', STRTOLOWER ( $text ) ) );
            // ---------------------------------------------

            IF ($text == null ) {
                    DIE ( 'شما از کلمات نا مناسب استفاده کردید لطفا اطلاعات خود را اصلاح کنید' );
            } ELSE {
                    RETURN $text;
            }
    } 
//////////////////////////////////////////////////////////////
    function logout ()
    {
        unset($_SESSION['user']);
        unset($_SESSION['test']);
        unset($_SESSION['typp']);
        include_once('login.php');
        die ('سیستم شما را نمی شناسد لطفا وارد شوید');
    }
?>