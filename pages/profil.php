<?php
    session_start();
    require '../core/functions.php';
    $ip=$_SERVER['REMOTE_ADDR'];
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
        verify_sub($_POST);
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
        <?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';?>
		<main><?php
            if(isset($_SESSION['connected']) && $_SESSION['connected']){

            }
            else if(!isset($_POST['mail']) || !$_POST['mail']){?>
                <form method="post" action="profil.php" id="form_sub">
                    <label for="mail">Adresse mail : </label>
                    <input type="email" name="mail" required>
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" required>
                    <label for="cpassword">Confirmez le mot de passe :</label>
                    <input type="password" name="cpassword" required>
                    <label for="numrue">Numéro de l'adresse :</label>
                    <input type="text" name="numrue">
                    <label for="adresse">Adresse :</label>
                    <input type="text" name="adresse" required>
                    <label for="compadresse">Complément d'adresse :</label>
                    <input type="text" name="compadresse">
                    <label for="codepostal">Code postal :</label>
                    <input type="int" name="codepostal" required>
                    <label for="ville">Ville :</label>
                    <input type="text" name="ville" required>
                    <label for="telephone">Téléphone :</label>
                    <input type="tel" name="telephone">
                    <input type="submit" value="Envoyer">
                </form><?php
            }
		?></main>
		<?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>
</html>