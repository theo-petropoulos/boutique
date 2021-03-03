<main id="empty_basket">
    <section id="block_haut">
        <div class="text">Votre panier est vide.</div>
    </section>
    <section class="suggestions">
        <?php $sugg_qty=5; require realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
    </section>
</main>