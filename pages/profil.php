<?php
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/core/session.php';
    require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/core/user.php';

    //Si l'utilisateur possède un token d'authentification
    if(isset($_COOKIE['login']) && $_COOKIE['login'] && isset($_COOKIE['password']) && $_COOKIE['password']){
        $mail=$_COOKIE['login'];
        $password=$_COOKIE['password'];
        try{
            $db=new PDO('mysql:host=localhost;dbname=boutique', 'root' , '');
        }
        catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        $stmt=$db->prepare("SELECT * FROM `mails` WHERE `adresse`=?");
        $stmt->bindParam(1, $mail, PDO::PARAM_STR);
        $stmt->execute();
        $i=0;
        foreach($stmt as $key=>$value){
            $i++;
        }
        if($i){
            $id_adresse=$value['id'];
            $stmt=$db->prepare("SELECT * FROM `clients` WHERE id_mail=?");
            $stmt->bindParam(1, $id_adresse, PDO::PARAM_INT);
            $stmt->execute();
        }
        else{
            setcookie('login', '', -1, '/');
            setcookie('password', '', -1, '/');
            $_SESSION['connected']=NULL;
            die('Votre session a expiré, veuillez vous reconnecter.');
        }
    }
    else{
        $_SESSION['connected']=FALSE;
    }
    if(isset($_POST) && $_POST){
        $return=verify_sub($_POST);
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
		<main><?php
            if(isset($_SESSION['connected']) && $_SESSION['connected']){

            }
            else if(!isset($_POST['mail']) || !$_POST['mail']){?>
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
            else if(isset($_POST) && $_POST){
                switch($return){
                    case 'errmatch':?>
                        <p>Les mots de passe ne correspondent pas. Veuillez <a href="profil.php">Réessayer</a>.</p>
                        <?php break;
                    case 'errpwd':?>
                        <p>Le mot de passe n'est pas assez fort. Il doit contenir :<br>
                        -Au moins une majuscule<br>
                        -Au moins une minscule<br>
                        -Au moins un chiffre<br>
                        -Au moins un caractère spécial<br>
                        Veuillez <a href="profil.php">Réessayer</a>.</p>
                        <?php break;
                    case 'errinput':?>
                        <p>Il y a eut une erreur de saisie. Veuillez <a href="profil.php">Réessayer</a>.</p>
                        <?php break;
                    case 'errpost':?>
                        <p>Une erreur inattendue est survenue. Veuillez <a href="profil.php">Réessayer</a>.</p>
                        <?php break;
                }
            }
		?></main>
		<?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>
</html>