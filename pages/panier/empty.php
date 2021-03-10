<section id="empty">
    <div class="text"><p>Votre panier est vide.<br>
    <a href="/boutique/pages/nouveautes.php"><i class="fas fa-chevron-right"></i>
    Consulter les <span class="coloryellow">nouveautés</span>.</a></p></div>
</section>
<div class="suggestions_text"><p>Suggestions</p><span class="line"></span></div>
<section class="suggestions">
    <?php $sugg_qty=5; include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
</section>