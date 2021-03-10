<?php if(isset($isdelete) && $isdelete==1){?>
    <div class="isdelete">
        <p>Votre compte a bien été supprimé. Un e-mail de confirmation vient de vous être envoyé. Pendant 14 jours, votre compte 
        restera inactif dans notre base de données. A l'issu et sans action de votre part, il sera définitivement supprimé.</p>
    </div>
<?php } else if(isset($delaccount) && $delaccount=='verify'){?>
    <div class="delete">
        <h3>Êtes-vous <span class="coloryellow strtxt lined">sûr</span> de vouloir supprimer votre compte ?</h3>
        <form method="post" action="profil.php">
            <input type="hidden" name="confirmdelete" value=1>
            <input type="submit" value="Oui">
        </form>
        <form method="post" action="profil.php">
            <input type="hidden" name="donotdelete" value=1>
            <input type="submit" value="Non">
        </form>
        <p class="smalltxt">
            Un e-mail de confirmation vous sera envoyé. Votre compte restera inactif dans notre base de données 
            pendant une durée de 14 jours. Pendant ce délai, vous pourrez à tout moment réactiver votre compte. Au delà, 
            le compte sera définitivement supprimé.
        </p>
    </div>
<?php } else {
    die("Vous ne pouvez pas accéder à cette page.");
}