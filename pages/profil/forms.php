<?php 
if( ((!isset($_POST['connect']) || !$_POST['connect']) && (!isset($_POST['register']) || !$_POST['register']))
    && (!isset($return) || !$return) ){?>
    <h3>Accès privilège</h3>
    <div class="separator_white"></div>
    <p>Grâce à votre compte <strong class="strtxt">Von Harper</strong>, accédez à votre profil et votre 
    historique de commandes, bénéficiez de <em class="ita">remises exclusives</em> et bien plus encore.<br></p>
    <form method="post" action="profil.php">
        <input type="hidden" name="connect" value=1>
        <input type="submit" value="Connexion">
    </form>
    <form method="post" action="profil.php">
        <input type="hidden" name="register" value=1>
        <input type="submit" value="Inscription">
    </form>
<?php }

else if(isset($_POST['register']) && $_POST['register']==1){?>
    <form method="post" action="profil.php" id="sub_form">
        <h3>Inscription</h3>
        <div class="separator_white"></div>
        <div id="block_container">
        <div id="block1">
            <label for="lastname">Nom :</label>
            <input type="text" name="lastname" maxlength=30 required>
            <label for="firstname">Prénom :</label>
            <input type="text" name="firstname" maxlength=30 required>
            <label for="phone">Téléphone :</label>
            <input type="tel" name="phone" pattern="[0-9]{10}" required>
        </div>
        <div id="block2">
            <label for="mail">Adresse mail : </label>
            <input type="email" name="mail" maxlength=60 required>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" minlenght=8 maxlenght=40 required>
            <label for="cpassword">Confirmez le mot de passe :</label>
            <input type="password" name="cpassword" minlenght=8 maxlenght=40 required>
        </div>
        <div id="block3">
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
        </div>
        </div>
        <input type="submit" value="Envoyer">
        <a href="profil.php"><i class="fas fa-chevron-right"></i>Retour</a>
    </form><?php
}

else if(isset($_POST['connect']) && $_POST['connect']==1){ ?>
    <form id="login_form" method="post" action="profil.php">
        <h3>Connexion</h3>
        <div class="separator_white"></div>
        <label for="mail_connect">Adresse mail :</label>
        <input type="email" name="mail_connect" required>
        <label for="password_connect">Mot de passe :</label>
        <input type="password" name="password_connect" required>
        <input type="submit" value="Connexion">
        <a href="profil.php"><i class="fas fa-chevron-right"></i>Retour</a>
    </form>
<?php }  