<?php
//VERIF données entrées + secure
$conn = null;
if (isset($_POST['create_admin'])):
    if (isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['conf_password'])) {
        $mail = htmlspecialchars($_POST['mail']);
        $password = htmlspecialchars($_POST['password']);
        $conf_pass = htmlspecialchars($_POST['conf_password']);
        $mail = strip_tags($mail);
        $password = strip_tags($password);
        $conf_pass = strip_tags($conf_pass);
        $regPass = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        $regMail = '/^[\w\-]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,}$/';
        preg_match($regPass, $password) && preg_match($regMail, $mail) ? $conn = true : $conn = false;
        if ($conn === true) {
            $password = password_hash($password, CRYPT_BLOWFISH);
            $pdo = new PDO('mysql:dbname=boutique;host=localhost', 'root', '');
            $sql = "INSERT INTO admin (login, password) VALUES (?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $mail);
            $stmt->bindValue(2, $password);
            $stmt->execute();
        }
    }
endif;
?>
<main>
    <form method="post">
        <fieldset class="form_manage admin_form">
            <legend class="title_form">Création de comtpe administrateur</legend>
            <div>
                <label for="mail">Identifiant administrateur</label>
                <input type="email" name="mail" id="mail" required placeholder="Email">
            </div>
            <div>
                <label for="password">Mot de passe administrateur</label>
                <input type="text" name="password" id="password" required placeholder="Mot de passe">
            </div>
            <div>
                <label for="conf_password">confirmer mot de passe administrateur</label>
                <input type="text" name="conf_password" id="conf_password" required placeholder="Confirmer mot de passe ">
            </div>
            <?php if ($conn === false) {
                echo "<div class='error_box'>Votre identifiant dois être une adresse email conforme, votre mot de passe doit comprendre au minimum 8 caracteres et:<br> Une lettre majuscule, une lettre minuscule, un chiffre, un caractere spécial</div>";
            } elseif ($conn === true) {
                echo "<div class='success_box'>Nous avons bien enregistré votre compte vous pouvez vous connecter en rejoignant la page de connexion</div>";
            } ?>
            <div>
                <button class="btn" type="submit" name="create_admin" value="submit">Envoyer</button>
            </div>
        </fieldset>
    </form>
</main>