<?php
    session_start();
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/functions.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/sql.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/user.php';

    //If there is an authentication cookie
    if(isset($_COOKIE['authtoken']) && $_COOKIE['authtoken']){
        $db=db_link();
        $user=new User($_COOKIE, $db);
        $token=$user->authenticate();
        switch($token){
            case 'cookie_connected':
                $data=$user->getAllData();
                $authorized=1;
                break;
            case 'cookie_err':
                setcookie('authtoken', '', -1);
                break;
            default:
                setcookie('authtoken', '', -1);
                break;                
        }
    }