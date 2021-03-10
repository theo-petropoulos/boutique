<?php
    session_start();
    $root=realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/';

    require $root . 'model/functions.php';
    require $root . 'model/sql.php';
    require $root . 'model/class/User.php';
    require $root . 'model/class/Order.php';
    
    //Check if cookies are allowed
    if(!isset($_COOKIE['allow'])){
        if(setcookie('allow', 'authorized', time()+36000, '/')){?>
            <div class="allow_cookie"><p>Nous utilisons des cookies destinés uniquement au fonctionnement du site. Les données stockées sont uniquement 
            celles que vous avez accepté de nous communiquer. Vos informations personnelles ne sont ni vendues, ni échangées avec un tiers.</p></div>
        <?php } else{ ?>
            <div class="allow_cookie"><p>Ce site utilise des cookies pour fonctionner normalement. Votre navigateur ne semble pas accepter leur
            stockage. En conséquence vous ne pourrez ni acheter de produits, ni vous connecter. En outre, les données stockées sont uniquement 
            celles que vous avez accepté de nous communiquer. Vos informations personnelles ne sont ni vendues, ni échangées avec un tiers.</p></div>        
        <?php }
    }
    else{
        setcookie('allow', 'authorized', time()+36000, '/');
    }

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
                $basket = get_basket($_COOKIE['basket']);
                $count=0;
                foreach($basket as $entry=>&$object){
                    if($object['id']==$_POST['addbasket']){
                        $object['qty']++;
                        $count++;
                    }
                }
                $basket=get_cookie($basket);
                if($count==0) $basket .= '&id=' . $_POST['addbasket'] . '&qte=' . $_POST['addquantity'];
            } else $basket = '&id=' . $_POST['addbasket'] . '&qte=' . $_POST['addquantity'];
            setcookie('basket', $basket, time() + 36000, '/');
            ?><div class="addbasket">Produit ajouté au panier.</div><?php
        } else die("Une erreur s'est produite.");
    }