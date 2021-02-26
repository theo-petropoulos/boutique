<div class="err_occured"><?php
    switch($connect){
        case 'auth_new_ip':?>
            <p>Vous tentez de vous connecter depuis un nouvel appareil.<br>
            Veuillez confirmer votre connexion par mail.</p>
            <?php break;
        case 'auth_pwd_err':?>
            <p>Adresse mail ou mot de passe incorrect.
            <br><a href="profil.php">Réessayer</a>.
            <form method="post" action="profil.php">
                <input type="hidden" name="resetpwd" value=1>
                <input type="submit" value="Mot de passe oublié ?">
            </form>
            </p>
            <?php break;
        case 'auth_gen_err':?>
            <p>Une erreur est survenue. Veuillez <a href="profil.php">réessayer</a>.</p>
            <?php break;
    }?>
</div>