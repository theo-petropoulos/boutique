<?php
if (isset($_POST['connect_admin'])):
    $logAdmin = htmlspecialchars($_POST['log_admin']);
    $passAdmin = htmlspecialchars($_POST['pass_admin']);
    $logAdmin = strip_tags($logAdmin);
    $passAdmin = strip_tags($passAdmin);
    $sql = "SELECT * FROM admin WHERE login='$logAdmin'";
    $pdo = new PDO('mysql:dbname=boutique;host=localhost', 'root', '');
    $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    $checkPass = password_verify($passAdmin, $res['password']);
    if ($checkPass && $res['login'] === $logAdmin) {
        $Admin = new Admin();
        $authAdmin = password_hash('vonharper6559571991', CRYPT_BLOWFISH);
        $Admin->setRole($authAdmin);
        $_SESSION['Admin-KEY'] = $Admin->getRole();
        $path='home-admin';
    }
endif;
?>
<form action="#" method="POST">
    <fieldset class="form_manage">
        <legend class="title_form"> Connexion Administrateur</legend>
        <div>
            <label for="log_admin"> Login</label>
            <input type="text" name="log_admin" id="log_admin">
        </div>
        <div>
            <label for="pass_admin"> Password</label>
            <input type="password" name="pass_admin" id="pass_admin">
        </div>
        <div>
            <button type="submit" name="connect_admin" value="submit"> Connexion</button>
        </div>
    </fieldset>

</form>