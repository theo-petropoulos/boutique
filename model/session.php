<?php
    session_start();
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/functions.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/sql.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/User.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/Order.php';

    //If there is an authentication cookie
    if(isset($_COOKIE['authtoken']) && $_COOKIE['authtoken']){
        $db=db_link();
        $user=new User($_COOKIE, $db);
        $token=$user->authenticate();
        switch($token){
            case 'cookie_connected':
                $user=$user->getAllData();
                $authorized=1;
                //Refresh the auth cookie upon every visit
                setcookie('authtoken',$_COOKIE['authtoken'],time()+360000, '/');
                break;
            //If something is wrong with the auth cookie, it is deleted
            case 'cookie_err':
                setcookie('authtoken', '', -1, '/');
                break;
            default:
                setcookie('authtoken', '', -1, '/');
                break;                
        }
    }

    //Refresh basket cookie upon every visit
    if(isset($_COOKIE['basket']) && $_COOKIE['basket']){
        setcookie('basket',$_COOKIE['basket'],time()+360000, '/');
    }

    //If the user add a product to the basket from anywhere
    if (isset($_POST['addbasket']) && is_int(intval($_POST['addbasket'])) && $_POST['addbasket']) {
        if (verify_product($_POST['addbasket']) == 'valid') {
            if (isset($_COOKIE['basket']) && $_COOKIE['basket']) {
                $basket = $_COOKIE['basket'];
                $basket .= '&id=' . $_POST['addbasket'];
            } else $basket = '&id=' . $_POST['addbasket'];
            setcookie('basket', $basket, time() + 36000, '/');
        } else die("Une erreur s'est produite.");
    }