<?php
    if(strlen($_GET['search'])>2 && strlen($_GET['search'])<=30){
        $results=search_items($_GET['search'], $db);
        if(empty($results)){?>
            <div class="noresult"><p>Votre recherche n'a retourné aucun résultat.</p></div>
            <div class="suggestions_text"><p>Suggestions</p><span class="line"></span></div>
            <section class="suggestions">
                <?php $sugg_qty=5; include realpath($_SERVER["DOCUMENT_ROOT"]) . '/boutique/pages/panier/suggestions.php';?>
            </section>
        <?php } else{ ?>
            <section id="search_results_box"> <?php
            foreach($results as $index=>$array){
                $url='/boutique/assets/images/produits/'.$array['image'];?>
                <figure class="watch_result">
                    <a href="/boutique/pages/produit.php?produit=<?=$array['id'];?>&collection=<?=$array['id_marque'];?>">
                        <img src="<?=$url;?>">
                    </a>
                    <figcaption>
                        <div class="title">
                            <h3 class="strtxt"><?=strtoupper($array['marque']);?></h3>
                            <span class="line"></span>
                        </div>
                        <div class="name">
                            <h4><?=ucfirst(strtolower($array['nom']));?></h4>
                            <p><?=number_format(intval($array['prix']),2,'.',',');?> €</p>
                        </div>
                        <?php if($array['stock']<3){ ?>
                            <div class="alert_text">Plus que quelques exemplaires disponibles.</div>
                        <?php } ?>
                        <form method="post" action="">
                            <input type="hidden" name="addbasket" value="<?=$array['id'];?>">
                            <input type="submit" value="Ajouter au panier">
                        </form>
                    </figcaption>
                </figure>
            <?php } ?>
            </section>
        <?php }
    }

    else die("Une erreur inattendue est survenue.");
    