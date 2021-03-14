<?php
if(isset($_SESSION['checkout']) && $_SESSION['checkout'] && isset($_SESSION['authcheckout']) && $_SESSION['authcheckout']=='valid'){
    $_POST['checkout']=$_SESSION['checkout'];
    unset($_SESSION['checkout'],$_SESSION['authcheckout']);
}
//If the user access via cart page (only way possible)
if(isset($_POST['checkout']) && $_POST['checkout']){
    //If the user is logged in or ordering without an account
    if((!isset($_COOKIE['authtoken']) || !$_COOKIE['authtoken']) && (!isset($_SESSION['checkout']) || $_SESSION['checkout'])){
        $_SESSION['checkout']=$_POST['checkout'];
        header("Location: /boutique/pages/profil.php");
    }else if(isset($_COOKIE['authtoken']) && $_COOKIE['authtoken']){
        $checkout_valid='';
        //If the data sent and the data in cookie match -light security check-
        if($_POST['checkout']==$_COOKIE['basket']){
            //Check if every data sent is linked to a product
            $basket_v=get_basket($_POST['checkout']);
            $proceed=verify_checkout($basket_v);
            if(!$proceed){
                die('Vous ne pouvez pas accéder à cette page.');
            }
            //If so, reorganize array 
            else{
                $items=get_basket($_COOKIE['basket']);
                $total_price=0;
                foreach($items as $entry=>$order){
                    $array=new ManWatch();
                    $watch=new Watch();
                    $watch->hydrate($array->getProductByID($order['id']));
                    $total_price=intval($total_price)+intval($watch->getPrix())*intval($order['qty']);
                }
            }
            //Payment process
            if(
                isset($_POST['creditcard']) && is_int(intval($_POST['creditcard'])) &&
                isset($_POST['expiration']) && $_POST['expiration'] && isset($_POST['checkout']) && $_POST['checkout'] && 
                isset($_POST['cryptogram']) && is_int(intval($_POST['cryptogram']))){
                    if(isset($_COOKIE['authtoken']) && $_COOKIE['authtoken']){
                        $order=new Order();
                        $instock=$order->createOrder(intval($user->id),$items);
                        if($instock==1){
                            unset($order);
                            foreach($_POST as $key=>$value){
                                unset($_POST[$key]);
                            }
                            setcookie('basket', '', -1, '/');
                            $_SESSION['purchase']='success';
                            header("Location: ../pages/panier.php");
                        }
                        else if( 
                            isset($instock['return']) && $instock['return']==0 && 
                            isset($instock['object']) && is_int($instock['object']) ){
                            unset($order);
                            $basket=get_basket($_COOKIE['basket']);
                            foreach($basket as $entry=>$object){
                                if($object['id']==$instock['object']){
                                    unset($basket[$entry]);
                                }
                            }
                            setcookie('basket', get_cookie($basket), $cookie_options);
                            $basket=get_basket($_COOKIE['basket']);
                        }
                    }
                    else if(isset($_COOKIE['invited']) && $_COOKIE['invited']){

                    }
                }
        }
    }else die("Une erreur inattendue est survenue.");
}
else die("Une erreur inattendue est survenue.");