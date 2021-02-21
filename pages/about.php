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
		<title>A propos</title>
	</head>

    <body>
        <?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/header.php';?>
        <section id="about_section">
            <div id="about_header">
                <h3><span class="h1font">V</span><span>o</span><span>n</span> <span class="h1font">H</span><span>a</span><span>r</span><span>p</span><span>e</span><span>r</span></h3>
                <h4>From MRS with L<i class="far fa-clock"></i>VE</h4>
            </div>
            <div class="about_div1">
                <div class="div1_haut">
                    <div class="whitespace"></div>
                    <div class="block_div">
                        <img src="/boutique/assets/images/marseille.jpg">
                        <p>Au coeur de la <span class="ita">cité phocéenne</span>,<br>
                        <strong class="strtxt">Von Harper</strong> collabore avec les plus grandes marques.</p>
                    </div>
                </div>
                <div class="div1_bas">
                    <h3>A l'heure de demain</h3>
                    <p>Nous sommes <span class="ita">une entreprise massilienne</span> à taille <span class="strtxt">humaine</span>, et portée 
                    sur l'avenir. Nous avons à coeur d'assurer la <em class="ita">satisfaction</em> de notre clientèle, tant sur le 
                    <strong class="ita">conseil</strong>, que sur le <strong class="ita">service après-vente</strong>. Nous vous proposons des 
                    <strong class="strtxt">montres de luxe</strong>, <strong class="ita">originales</strong>, <strong class="ita">certifiées</strong> 
                    et <strong class="strtxt">garanties à vie</strong>.</p>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="about_div2">
                <div class="div2_haut">
                    <div class="whitespace"></div>
                    <div class="block_div2">
                        <img src="/boutique/assets/images/gravure.jpg">
                        <p>Des <span class="ita">artisans d'expérience</span>,<br>
                        Pour des <span class="strtxt">modèles prestigieux</span>.</p>
                    </div>
                </div>
                <div class="div2_bas">
                    <h3><strong>Omega</strong>, <strong>Blancpin</strong>, <strong>Audemars Piguet</strong>...</h3>
                    <p>Fort de <span class="ita">15 années d'expérience</span> dans la vente en <span class="strtxt">Horlogerie</span>, 
                    nous avons su créer des partenariats avec les <span class="ita">plus grandes maisons</span> du secteur. Nous négocions 
                    pour vous le prix à l'achat pour permettre de vous proposer un catalogue toujours plus <span class="strtxt">varié</span> 
                    au <span class="strtxt">prix juste</span>.</p>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="about_div1">
                <div class="div1_haut">
                    <div class="whitespace"></div>
                    <div class="block_div">
                        <img src="/boutique/assets/images/parts.jpg">
                        <p>Des <span class="strtxt">matières premières</span> d'exception,<br>
                        Une finition de prestige.</p>
                    </div>
                </div>
                <div class="div1_bas">
                    <h3>La qualité est un droit</h3>
                    <p><strong class="strtxt">Von Harper</strong> ne sélectionne que des modèles dont la réputation n'est plus à 
                    faire. Chaque <span class="ita">matériau</span> est minutieusement choisi pour ne laisser aucune place à 
                    l'imperfection. Les <em class="ita">mouvements</em> de nos montres sont d'une fiabilité sans faille, testés 
                    par les <span class="strtxt">meilleurs horlogers</span>, approuvés par vous.</p>
                    <div class="separator"></div>
                </div>
            </div>
            <div class="about_div2">
                <div class="div2_haut">
                    <div class="whitespace"></div>
                    <div class="block_div2">
                        <img src="/boutique/assets/images/helpdesk.jpg">
                        <p>Un <strong class="strtxt">Service après-vente</strong> dédié, disponible 7j/7<br>
                        <span class="ita">L'assurance</span> d'être <span class="strtxt">assuré</span>.</p>
                    </div>
                </div>
                <div class="div2_bas">
                    <h3>Joignables en tout temps</h3>
                    <p>Notre équipe d'<em class="strtxt">assistance</em> se fait un plaisir de vous répondre, <span class="ita">tous les 
                        jours</span> de la semaine, de 09h00 à 19h00. Que ce soit pour une <em class="ita">question</em>, un 
                        <em class="ita">conseil</em> ou faire valoir votre <em class="ita">garantie</em>, nos conseillers sauront vous 
                        apporter une solution. Disponibles par <strong class="strtxt">téléphone</strong>, par 
                        <strong class="strtxt">chat</strong> ou par <strong class="strtxt">mail</strong>.
                    </p>
                    <div class="separator"></div>
                </div>
            </div>
        </section>

		<?php require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/footer.php';?>
    </body>
</html>