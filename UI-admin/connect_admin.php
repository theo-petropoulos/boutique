<?php
//CHECK USER ENTRY + SECURE
$isAdmin = null;
if (isset($_POST['connect_admin'])):
    $logAdmin = htmlspecialchars($_POST['log_admin']);
    $passAdmin = htmlspecialchars($_POST['pass_admin']);
    $logAdmin = strip_tags($logAdmin);
    $passAdmin = strip_tags($passAdmin);
    $sql = "SELECT * FROM admin WHERE login='$logAdmin'";
    $pdo = new PDO('mysql:dbname=boutique;host=localhost', 'root', '');
    $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    $checkPass = password_verify($passAdmin, $res['password']);
//IF ADMIN ACCOUNT SET CREATE OBJECT ADMIN AND SET TOKEN IN SESSION
    if ($checkPass && $res['login'] === $logAdmin) {
        $Admin = new Admin();
        $authAdmin = password_hash('vonharper6559571991', CRYPT_BLOWFISH);
        $Admin->setRole($authAdmin);
        $_SESSION['Admin-KEY'] = $Admin->getRole();
//        REFRESH PAGE
        header('location:admin-index.php');
    } else {
        $isAdmin = false;
    }
endif;
?>
<form action="#" method="POST">
    <fieldset class="form_manage" style="height: 550px; margin: 50px auto">
        <legend class="title_form"> Connexion Administrateur</legend>
        <div>
            <label for="log_admin"> Email Administrateur</label>
            <input type="text" name="log_admin" id="log_admin" autocomplete="username" required>
        </div>
        <div>
            <label for="pass_admin"> Mot de passe Administrateur</label>
            <input type="password" name="pass_admin" id="pass_admin" autocomplete="current-password" required>
        </div>
        <?php
        $i = 3;
        if (isset($_POST['connect_admin']) && $isAdmin === false): ?>

            <div id="box_conn" class="error_box"><p id="p_conn">Identifiants administrateur incorrects
            </div>

        <?php endif; ?>
        <div>
            <button id="btn_adm" class="link_admin" type="submit" name="connect_admin" value="submit"> Connexion</button>
        </div>
    </fieldset>
</form>