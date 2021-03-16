<div id="reg_return"><?php
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
            <p>Cette adresse mail est déjà utilisée.<br>
            <a href="profil.php">Réessayer.</a></p>
            <form method="post" action="profil.php">
                <input type="hidden" name="resetpwd" value=1>
                <input type="submit" value="Mot de passe oublié ?">
            </form>
            </p>
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
            <?php 
            $mail_adress=$_POST['mail'];
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $message='subscribe';
            require $root . 'model/mailer.php';
            break;
        //If something went wrong
        default: ?>
            <p>Il y a eut un problème. Veuillez <a href="profil.php">réessayer</a>.</p>
            <?php break;
    }?>
</div>