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
        <input type="text" name="postal" pattern="[0-9]{5}" required>
        <label for="city">Ville :</label>
        <input type="text" name="city" maxlenght=30 required>
    </div>
    </div>
    <input type="submit" value="Envoyer">
    <a href="profil.php"><i class="fas fa-chevron-right"></i>Retour</a>
</form>