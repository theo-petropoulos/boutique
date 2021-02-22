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
		<title>Newsletter</title>
	</head>

    <body>
        <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';?>
        <main>
            <section id="banner_standard">
                <h2>Inscription à la Newsletter</h2>
            </section>

            <section id="form_newsletter">
                <form action="newsletter.php" method="post">
                    <label for="mail">Adresse mail* :</label>
                    <input type="email" name="mail" placeholder="exemple@mail.com" required>
                    <div id="checkbox_newsletter">
                        <input type="checkbox" name="consent" required>
                        <label for="consent" id="label_consent">Je reconnais avoir lu les <a href="/boutique/pages/mentions.php">termes et conditions</a> 
                        et accepte de recevoir des communications de la part de Von Harper©. 
                        Je peux à tout moment me rétracter de ce service.</label>
                    </div>
                    <input type="submit" value="Envoyer">
                </form>
            </section>
            <div id="cond_newsletter">
                <p class="tinytext">
                    * Information obligatoire<br>
                    Les informations recueillies à partir de ce formulaire d'inscription font l’objet d’un traitement informatique
                    destiné à Von Harper© afin de vous proposer des produits et services adaptés à vos intérêts, 
                    de vous permettre d'accéder aux services du site ainsi qu'à des services spécifiques et de faciliter
                    le fonctionnement administratif et technique du site (plus de précisions dans le cadre de notre politique d'utilisation
                    des données). Vos données sont conservées en France durant 3 ans à compter de votre dernier contact avec le site
                        vonharper.com. Les données non facultatives sont indiquées dans le formulaire par la présence d'un astérisque : *.
                        Conformément à loi « informatique et Libertés » du 6 janvier 1978 modifiée, vous bénéficiez d’un droit d’accès, 
                        de rectification et d'opposition aux informations qui vous concernent. Vous disposez d'un droit d'opposition, 
                        pour des motifs légitimes, aux traitements vous concernant et vous pouvez vous opposer à tout moment aux traitements
                        de la prospection commerciale. Vous disposez également du droit de définir des directives relatives au sort de ses 
                        données après votre décès. Si vous souhaitez exercer ces droits et obtenir communication des informations vous 
                        concernant, veuillez vous adresser à privacy@vonharper.com.
                </p>
            </div>
        </main>
        <?php include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>
</html>