<?php

//If the user is logged in or ordering without an account
if( (isset($_COOKIE['authtoken']) && $_COOKIE['authtoken']) ||
    (isset($_COOKIE['invited']) && $_COOKIE['invited']) ){
    //If the user access via cart page
    if(isset($_POST['checkout']) && $_POST['checkout']){
        $checkout_valid='';
        //If the data sent and the data in cookie match -light security check-
        if($_POST['checkout']==$_COOKIE['basket']){
            //Check if every data sent is linked to a product
            $proceed=verify_checkout($_POST['checkout']);
            if(!$proceed){
                die('Vous ne pouvez pas accéder à cette page.');
            }
            //If so, reorganize array
            else{
                $items=array_filter(explode('&id=', $_COOKIE['basket']));
                $items=organize_array($items);
                $total_price=0;
                foreach($items as $itemID=>$quantity){
                    $array=new ManWatch();
                    $watch=new Watch();
                    $watch->hydrate($array->getProductByID($itemID));
                    $total_price=intval($total_price)+intval($watch->getPrix())*intval($quantity);
                }
            }
            //Payment process
            if(
                isset($_POST['creditcard']) && is_int(intval($_POST['creditcard'])) &&
                isset($_POST['expiration']) && $_POST['expiration'] && isset($_POST['checkout']) && $_POST['checkout'] && 
                isset($_POST['cryptogram']) && is_int(intval($_POST['cryptogram']))){
                    if(isset($_COOKIE['authtoken']) && $_COOKIE['authtoken']){
                        $order=new Order(intval($user->id));
                        $instock=$order->createOrder($items);
                        if($instock==1){
                            unset($order);
                            foreach($_POST as $key=>$value){
                                unset($_POST[$key]);
                            }
                            setcookie('basket', '', -1);
                            $_SESSION['purchase']='success';
                            header("Location: ../pages/panier.php");
                        }
                        else{unset($order);setcookie('basket', '', -1);}
                    }
                    else if(isset($_COOKIE['invited']) && $_COOKIE['invited']){

                    }
                }
        }
    } else die("Une erreur inattendue est survenue.");
}
else die("Une erreur inattendue est survenue.");