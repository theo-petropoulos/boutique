<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/model/session.php';
    require $root . 'pages/resetpwd/conditions.php';
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<?php $title='Mot de passe oublié'; require $root . 'pages/globals/head.php';?>

    <body id="body_resetpwd">
        <?php include $root . 'pages/globals/header.php';?>
        <section id="banner_standard">
            <h2>Réinitialiser le mot de passe</h2>
        </section>
        
        <?php if((!isset($return) || !$return) && (!isset($resetpwd) || !$resetpwd) && (!isset($confirmpwd) || !$confirmpwd)){?>
            <section id="form_resetpwd">
                <form method="post" action="">
                    <label for="mail">Adresse mail :</label>
                    <input type="email" name="mail" required>
                    <input type="submit" value="Envoyer">
                </form>
            </section>
        <?php } 

        else if(isset($resetpwd) && $resetpwd=='proceed'){
            ?><section id="form_changepwd">
                <form method="post" action="">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" required>
                    <label for="cpassword">Confirmez le mot de passe :</label>
                    <input type="password" name="cpassword" required>
                    <input type="submit" value="Valider">
                </form>
            </section>
        <?php }        

        else if(isset($return) && $return){
            ?><section id="return_resetpwd">
            <?php switch($return){
                case 'errinput':
                    ?><p>L'adresse mail saisie est invalide. Veuillez <a href="resetpwd.php">réessayer</a>.</p>
                    <?php break;
                case 'sent':
                    ?><p>Votre demande a bien été prise en compte.<br>
                    Si un compte correspond à l'adresse <span class="strtxt"><?=$_POST['mail'];?></span>, nous vous enverrons un mail pour réinitialier votre mot de passe.<br>
                    La validité du lien sera de 5 minutes avant expiration.</p>
                    <?php break;
                default:
                    header('Location:/boutique/index.php');
                    break;
            }?>
            </section>
        <?php }

        else if(isset($confirmpwd) && $confirmpwd){
            ?><section id="return_resetpwd"><?php
            switch($confirmpwd){
                case 'success':?>
                    <p>Le mot de passe a été modifié avec succès. Vous pouvez dès à présent vous <a href="/boutique/pages/profil.php">
                    connecter</a>.</p>
                    <?php break;
                case 'errmatch':?>
                    <p>Les mots de passe ne correspondent pas. Veuillez <a href="">réessayer</a>.</p>
                    <?php break;
                case 'errstrenght':?>
                    <p>Le mot de passe n'est pas assez sécurisé. Pour rappel, il doit faire au moins 8 caractères de long et contenir :<br>
                    - Au moins une majuscule<br>
                    - Au moins une minuscule<br>
                    - Au moins un chiffre<br>
                    - Au moins un caractère spécial<br>
                    Veuillez <a href="">réessayer</a>.</p>
                    <?php break;
                default:
                    die("Une erreur inattendue est survenue. Si le problème persiste, veuillez contacter le support à support.vonharper@gmail.com");
                    break;
            }
            ?></section><?php
        }
        include $root . 'pages/globals/footer.php';?>
    </body>
</html>