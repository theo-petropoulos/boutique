<main class="basket">
    <section id="block_haut">
        <div class="text">Votre panier est vide.</div>
    </section>
    <div class="suggestions_text"><p>Suggestions</p><span class="line"></span></div>
    <section class="suggestions">
        <?php $sugg_qty=5; require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
    </section>
</main>