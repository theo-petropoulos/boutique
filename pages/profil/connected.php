<section id="profil_connected">
    <div id="block_haut">
        <span>
            <h3><?=$user->lastname;?></h3><h3><?=$user->firstname;?></h3>
        </span>
        <form method="post" action="profil.php">
            <input type="hidden" name="disconnect" value=1>
            <input type="submit" value="Se déconnecter">
        </form>
        <div class="separator_white"></div>
    </div>
    <div id="block_bas">
        <?php if(isset($confirm) && $confirm){
            foreach($user as $key=>$value){
                if(isset($update->$key)){
                    if($user->$key!==$update->$key){
                        $user->$key=$update->$key;
                    }
                }
            }
            if($confirm=='success'){?>
                <p>Vos informations ont bien été mises à jour.<br><a href="profil.php">Mon compte</a></p>
            <?php }
            else if($confirm=='exist'){?>
                <p>Cette adresse mail est déjà utilisée. Veuillez <a href="profil.php">réessayer</a>.</p>
            <?php }
            else if($confirm=='errinput'){?>
                <p>Votre formulaire contient une erreur. Veuillez <a href="profil.php">réessayer</a>.</p>
            <?php }
        }
        else if(isset($confirm_pwd) && $confirm_pwd){
            if($confirm_pwd=='errpwd'){?>
                <p>Votre mot de passe n'est pas assez fort. Il doit faire au moins 8 caractères de long et contenir :
                   <br>-Au moins une lettre majuscule
                   <br>-Au moins une lettre minuscule
                   <br>-Au moins un chiffre
                   <br>-Au moins un caractère spécial
                   <br>Veuillez <a href="profil.php">réessayer</a>.</p>
            <?php }
            else if($confirm_pwd=='success'){?>
                <p>Votre mot de passe a été modifié avec succès.<br><a href="profil.php">Mon compte</a></p>
            <?php }
        }
        else{?>
        <ul id="profil">
            <li class="profil_block">
                <input type="radio" id="selector1" name="selector" checked>
                <label for="selector1">
                    <p>Informations personnelles</p>
                </label>
                <section class="active_block active_block_infos">
                    <div id="form_container">
                        <form method="post" action="profil.php">
                            <input type="hidden" name="modify_infos" value="1">
                            <input type="hidden" name="xxxxxx_id" value="<?=$user->id;?>">
                            <div>
                                <input type="email" name="update_mail" value="<?=$user->mail;?>" required>
                                <label for="update_mail">Adresse mail :</label>
                            </div><div>
                                <input type="tel" name="update_phone" pattern="[0-9]{10}" value="<?=$user->phone;?>" required>
                                <label for="update_phone">Téléphone :</label>
                            </div><div>
                                <input type="text" name="update_numadress" value="<?=$user->numadress;?>" required>
                                <label for="update_numadress">Numéro de l'adresse :</label>
                            </div><div>
                                <input type="text" name="update_adress" value="<?=$user->adress;?>" required>
                                <label for="update_adress">Adresse :</label>
                            </div><div>
                                <input type="text" name="update_compadress" value="<?=$user->compadress;?>">
                                <label for="update_compadress">Complément d'adresse :</label>
                            </div><div>
                                <input type="int" name="update_postal" pattern="[0-9]{5}" value="<?=$user->postal;?>" required>
                                <label for="update_postal">Code postal :</label>
                            </div><div>
                                <input type="text" name="update_city" value="<?=$user->city;?>" required>
                                <label for="update_city">Ville :</label>
                            </div>
                            <input type="submit" value="Mettre à jour les coordonnées">
                        </form>
                        <form method="post" action="profil.php">
                            <input type="hidden" name="modify_pwd" value="1">
                            <input type="hidden" name="xxxxxx_id" value="<?=$user->id;?>">
                            <div>
                                <input type="password" name="update_password" placeholder="********" required>
                                <label for="update_password">Mot de passe :</label>
                            </div>
                            <input type="submit" value="Mettre à jour le mot de passe">
                        </form>
                    </div>
                </section>
            </li>
            <li class="profil_block">
                <input type="radio" id="selector2" name="selector">
                <label for="selector2">
                    <p>Historique des commandes</p>
                </label>
                <section class="active_block active_block_orders">
                    <div id="orders_wrap"><?php
                    $orders=new Order();
                    $orders=$orders->fetchOrders(intval($user->id));
                    if($orders!=='none'){?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Date</th>
                                    <th>Prix</th>
                                    <th>État</th>
                                    <th>Facture</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=0;isset($orders[$i]) && $orders[$i];$i++){
                                    $url="/boutique/model/generatepdf.php?id=".$orders[$i]['id']."&date=".$orders[$i]['date']."&total=".$orders[$i]['total'];
                                    ?>
                                <tr>
                                    <td><p><?=$orders[$i]['id'];?></p></td>
                                    <td><p><?=$orders[$i]['date'];?></p></td>
                                    <td><p><?=$orders[$i]['total'];?></p></td>
                                    <td><p><?=$orders[$i]['etat'];
                                    if(isset($orders[$i]['suivi']) && $orders[$i]['suivi']){?><br>Suivi : <?=$orders[$i]['suivi'];}?>
                                    </p></td>
                                    <td>
                                    <a href="<?=$url;?>">Télécharger la facture</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php }
                    else{
                        echo "Vous n'avez pas encore effectué de commandes.";
                    }
                ?></div>
                </section>
            </li>
            <li class="profil_block">
                <input type="radio" id="selector3" name="selector">
                <label for="selector3">
                    <p>Mes services</p>
                </label>
                <section class="active_block active_block_services">
                    <div id="services_gallery">
                        <section class="services_section service1">
                            <p><a href="">Mes garanties</a></p>
                            <img src="../assets/images/watchmaker.jpg">
                        </section>
                        <section class="services_section service2">
                            <p><a href="">Mes collections</a></p>
                            <img src="../assets/images/watch_box.webp">
                        </section>
                        <section class="services_section service3">
                            <p><a href="">Mon conseiller</a></p>
                            <img src="../assets/images/counselor.jpg">
                        </section>
                        <section class="services_section service4">
                            <p><a href="">Mes articles</a></p>
                            <img src="../assets/images/watch_articles.jpg">
                        </section>
                        <section class="services_section service5">
                            <p><a href="">Mon magasin</a></p>
                            <img src="../assets/images/watch_store.jpg">
                        </section>
                    </div>
                </section>
            </li>
        </ul>
        <?php } ?>
    </div>
</section>