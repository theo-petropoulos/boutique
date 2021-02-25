<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/class/user.php';

    //If there is an authentication cookie
    if(isset($_COOKIE['authtoken']) && $_COOKIE['authtoken']){
        $token=verify_token($_COOKIE);
        switch($token){
            case 'cookie_connected':
                $authorized=1;
                break;
            case 'cookie_err':
                setcookie('authotken', '', -1);
                break;
            default:
                setcookie('authotken', '', -1);
                break;                
        }
    }
    //If the user is trying to register
    if(isset($_POST) && $_POST && !isset($_POST['mail_connect']) && !isset($_POST['password_connect'])
        && !isset($_POST['register']) && !isset($_POST['connect'])){
        $return=verify_sub($_POST);
    }
    //If the user is trying to connect
    else if(isset($_POST['mail_connect']) && $_POST['mail_connect'] && isset($_POST['password_connect']) && $_POST['password_connect']){
        $connect=verify_connect($_POST);
    }
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="../css/boutique.css?v=<?php echo time(); ?>">
        <link rel="icon" href="/boutique/assets/images/icon.png" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Bodoni+Moda&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/9ddb75d515.js" crossorigin="anonymous"></script>
		<title>Profil</title>
	</head>

    <body>
        <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';?>
		<main>   
        <?php
            //If the user has a valid authentication token
            if(isset($authorized) && $authorized==1){ ?>
               <p>Vous êtes connecté.</p>
            <?php }

            else if(isset($connect) && $connect){
                switch($connect){
                    case 'auth_new_ip':?>
                        <p>Vous tentez de vous connecter depuis un nouvel appareil.<br>
                        Veuillez confirmer votre connexion par mail.</p>
                        <?php break;
                    case 'auth_pwd_err':?>
                        <p>Adresse mail ou mot de passe incorrect.</p>
                        <?php break;
                    case 'auth_gen_err':?>
                        <p>Une erreur est survenue. Veuillez <a href="profil.php">réessayer</a>.</p>
                        <?php break;
                }
            }
            else{
                if( ((!isset($_POST['connect']) || !$_POST['connect']) && (!isset($_POST['register']) || !$_POST['register']))
                    && (!isset($return) || !$return)
                ){?>
                    <form method="post" action="profil.php">
                        <input type="hidden" name="connect" value=1>
                        <input type="submit" value="Se connecter">
                    </form>
                    <form method="post" action="profil.php">
                        <input type="hidden" name="register" value=1>
                        <input type="submit" value="S'inscrire">
                    </form>
                <?php }

                else if(isset($_POST['register']) && $_POST['register']==1){?>
                    <form method="post" action="profil.php" id="form_sub">
                        <label for="lastname">Nom :</label>
                        <input type="text" name="lastname" maxlength=30 required>
                        <label for="firstname">Prénom :</label>
                        <input type="text" name="firstname" maxlength=30 required>
                        <label for="mail">Adresse mail : </label>
                        <input type="email" name="mail" maxlength=60 required>
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" minlenght=8 maxlenght=40 required>
                        <label for="cpassword">Confirmez le mot de passe :</label>
                        <input type="password" name="cpassword" minlenght=8 maxlenght=40 required>
                        <label for="numadress">Numéro de l'adresse :</label>
                        <input type="text" name="numadress" maxlenght=10>
                        <label for="adress">Adresse :</label>
                        <input type="text" name="adress" required>
                        <label for="compadress">Complément d'adresse :</label>
                        <input type="text" name="compadress" maxlenght=25>
                        <label for="postal">Code postal :</label>
                        <input type="int" name="postal" pattern="[0-9]{5}" required>
                        <label for="city">Ville :</label>
                        <input type="text" name="city" maxlenght=30 required>
                        <label for="phone">Téléphone :</label>
                        <input type="tel" name="phone" pattern="[0-9]{10}" required>
                        <input type="submit" value="Envoyer">
                    </form><?php
                }
                
                else if(isset($_POST['connect']) && $_POST['connect']==1){ ?>
                    <form method="post" action="profil.php">
                        <label for="mail_connect">Adresse mail :</label>
                        <input type="email" name="mail_connect" required>
                        <label for="password_connect">Mot de passe :</label>
                        <input type="password" name="password_connect" required>
                        <input type="submit" value="Connexion">
                    </form>
                <?php }  

                else if(isset($return) && $return){
                    switch($return){
                        //If passwords mismatch
                        case 'errmatch':?>
                            <p>Les mots de passe ne correspondent pas. Veuillez <a href="profil.php">Réessayer</a>.</p>
                            <?php break;
                        //If password isn't strong enough
                        case 'errpwd':?>
                            <p>Le mot de passe n'est pas assez fort. Il doit contenir :<br>
                            -Au moins une majuscule<br>
                            -Au moins une minscule<br>
                            -Au moins un chiffre<br>
                            -Au moins un caractère spécial<br>
                            Veuillez <a href="profil.php">Réessayer</a>.</p>
                            <?php break;
                        //If there is unauthorized characters
                        case 'errinput':?>
                            <p>Il y a eut une erreur de saisie. Veuillez <a href="profil.php">Réessayer</a>.</p>
                            <?php break;
                        //If there is some data missing
                        case 'errpost':?>
                            <p>Une erreur inattendue est survenue. Veuillez <a href="profil.php">Réessayer</a>.</p>
                            <?php break;
                        //If this mail is linked to another account
                        case 'errexist':?>
                            <p>Cette adresse mail est déjà utilisée.<br><a href="">Mot de passe oublié ?</a><br>
                            <a href="profil.php">Réessayer.</a></p>
                            <?php break;
                        //If user attempt to use banned words like 'select', 'delete', etc more than once
                        case 'errban':?>
                            <p>Vous tentez des actions interdites. Vous serez banni après 3 tentatives.</p>
                            <p>Nombre de tentatives : 1</p>
                            <!-- This feature isn't implanted yet due to use of localhost. 
                            The idea is to increment 'blacklist' to 3 or more.
                            On every page is set a function to verify if user's ip blacklist counter is equal to 3 or more.
                            If so, he can't access the website with a message telling him to contact support@vanharper.com -->
                            <?php break;
                        //If user is successfully registered
                        case 'subsuccess':?>
                            <p>Votre compte a été créé avec succès.<br>Un e-mail de confirmation vous a été envoyé.</p>
                            <!--TODO /PHPMAILER/ -->
                            <?php break;
                        //If something went wrong
                        default: ?>
                            <p>Il y a eut un problème. Veuillez <a href="profil.php">réessayer</a>.</p>
                            <?php break;
                    }
                }
            }?>
		</main>
		<?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>
</html>