<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';

    //If the user ask for a password reset
    if(isset($_POST['resetpwd']) && $_POST['resetpwd']==1){
        $resetpwd=1;
    }

    //If the user authorize a new ip from mail
    if(isset($_GET['m']) && $_GET['m'] && isset($_GET['i']) && $_GET['i'] && isset($_GET['t']) && $_GET['t']){
        $cipher = "AES-128-CTR";
        //$iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
        $key='Pas vraiment sûr que ce soit secûr.';
        $key2='Après leurs, sait plus leurre.';
        $key3="L'ipée et le bouclier, l'adresse et la dextérité.";
        $mail=urldecode(openssl_decrypt($_GET['m'], $cipher, $key, OPENSSL_ZERO_PADDING, $_GET['v']));
        $time=urldecode(openssl_decrypt($_GET['t'], $cipher, $key2, OPENSSL_ZERO_PADDING, $_GET['v']));
        $ip=urldecode(openssl_decrypt($_GET['i'], $cipher, $key3, OPENSSL_ZERO_PADDING, $_GET['v']));
        $exptime=time()-$time;
        if($exptime<300){
            if(update_ip($mail, $ip, $db)){
                $updateip='done';
            }else{
                die("Une erreur inattendue est survenue. Si elle persiste, veuillez contacter le support à support.vonharper@gmail.com.");
            }
        }
        else die("Le lien que vous avez utilisé a expiré.");
    }

    //If the user wants to update his infos
    else if(isset($_POST['modify_infos']) && $_POST['modify_infos']==1){
        $_POST=update_keys($_POST);
        if(verify_update($_POST)){
            $db=db_link();
            $update=new User($_POST, $db);
            $confirm=$update->setNewInfos();
        }
        else $confirm='errinput';
    }

    //If the user wants to update his password
    else if(isset($_POST['modify_pwd']) && $_POST['modify_pwd']==1){
        $_POST=update_keys($_POST);
        if(verify_pwd($_POST['password'])){
            $db=db_link();
            $user_pwd=new User($_POST,$db);
            $user_pwd->setNewPassword();
            $confirm_pwd='success';
        }
        else $confirm_pwd='errpwd';
    }

    //If the user wants to delete his account
    else if(isset($_POST['delaccount']) && $_POST['delaccount']==1){
        $delaccount='verify';
    }

    //If the user wants to disconnect
    else if(isset($_POST['disconnect']) && $_POST['disconnect']==1){
        setcookie('authtoken', '', -1, '/');
        header("Refresh: 0.2; url='profil.php'");
    }

    //If the user is trying to register
    else if(isset($_POST) && $_POST && !isset($_POST['mail_connect']) && !isset($_POST['password_connect'])
        && !isset($_POST['register']) && !isset($_POST['connect'])){
        $return=verify_sub($_POST);
    }
    //If the user is trying to connect
    else if(isset($_POST['mail_connect']) && $_POST['mail_connect'] && isset($_POST['password_connect']) && $_POST['password_connect']){
        $connect=verify_connect($_POST);
        if($connect=='auth_success'){
            if(isset($_SESSION['checkout'])){
                $_SESSION['authcheckout']='valid';
                header("Location: /boutique/pages/checkout.php");
            }else header("Refresh: 0.2; url='profil.php'");
        }else if($connect=='auth_new_ip'){
            $mail_adress=$_POST['mail_connect'];
            $message='newip';
            require $root . 'model/mailer.php';
        }
    }
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Profil'; require $root . 'pages/globals/head.php';?>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php include $root . 'pages/globals/header.php';?>
		<main id="main_profil">
            <section id="banner_standard">
                <h2>Mon compte</h2>
            </section>
        <?php
            //Confirm user's will to delete his account
            if(isset($delaccount) && $delaccount=='verify'){
                require $root. 'pages/profil/delete.php';
            }

            //If the ip has been updated
            else if(isset($updateip) && $updateip=='done'){ ?>
                <section id="updateip">
                    <p>Votre nouvel appareil a bien été enregistré. Vous pouvez dès à présent vous <a href="profil.php">connecter</a>.</p>
                </section>
            <?php }

            //If the user confirm
            else if(isset($_POST['confirmdelete']) && $_POST['confirmdelete']==1){
                $firstname=$user->firstname;
                $lastname=$user->lastname;
                $mail_adress=$user->mail;
                $message='delete';
                if(delete_user($user->id, $db)=='isdelete'){
                    $isdelete=1;
                    require $root . 'model/mailer.php';
                    require $root . 'pages/profil/delete.php';
                }
            }

            //If the user cancel
            else if(isset($_POST['donotdelete']) && $_POST['donotdelete']==1){
                header("Location:profil.php");
            }

            //If the user has a valid authentication token
            else if(isset($authorized) && $authorized==1){
                require $root . 'pages/profil/connected.php';
            }

            //Else if an error occured while connecting
            else if(isset($connect) && $connect){
                require $root . 'pages/profil/connerr.php';
            }

            else{ ?>
            <div class="profil_forms"><?php
                //If the user ask for a password reset
                if(isset($resetpwd) && $resetpwd==1){
                    require $root . 'pages/profil/resetpwd.php';
                }
                //Access to the login/register page
                else if( ((!isset($_POST['connect']) || !$_POST['connect']) && (!isset($_POST['register']) || !$_POST['register']))
                    && (!isset($return) || !$return) )
                {
                    require $root . 'pages/profil/form_ini.php';
                }
                //If the user asks to register
                else if(isset($_POST['register']) && $_POST['register']==1){
                    require $root . 'pages/profil/form_register.php';
                }
                //If the user asks to connect
                else if(isset($_POST['connect']) && $_POST['connect']==1){
                    require $root . 'pages/profil/form_connect.php';
                }  
                //If there is a registration error
                else if(isset($return) && $return){
                    require $root . 'pages/profil/regerr.php';
                }
            }?>
            </div>
		</main>
		<?php include $root . 'pages/globals/footer.php';?>
    </body>
</html>