<?php foreach($getUser as $gu) {?>
<div class="titlePofil">
    <h1>Bonjour <?= $gu->lastname ?> <?= $gu->firstname ?></h1>
</div>
<?php } ?>
<div class="container">

    <div class="cardBtn">
        <button class="btnModif">Modifier profil</button>
        <button id="btnDelete">Supprimer votre compte</button>
    </div>
</div>
<section>
    <form method="POST">
            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname">
            <p class="errorMessage"><?= @$formErrors['firstname'] ?></p>

            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" >
            <p class="errorMessage"><?= @$formErrors['lastname'] ?></p>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" >
            <p class="errorMessage"><?= @$formErrors['email'] ?></p>

            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" >
            <p class="errorMessage"><?= @$formErrors['address'] ?></p>

            <label for="city">Ville</label>
            <select name="city" id="city">
                <option selected disabled>---</option>
                <?php foreach ($cityList as $c) { ?>
                    <option value="<?= $c->id ?>"><?= $c->postalCode ?> - <?= $c->city ?></option>
                <?php } ?>
            </select>
            <p class="errorMessage"><?= @$formErrors['city'] ?></p>

            
            <div class="password">
                <form method="POST">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password">
                    <p class="errorMessage"><?= @$formErrors['password'] ?></p>
                </form>
            </div>
        <input type="submit" name="inputUpdete">
    </form>
</section>
<div >
   
</div>
<form action="" method="POST">
    <h3>Attention toute suppression sera définitivement</h3>
    <p>vous serez redirigé vair l'accueil</p>
    <input type="submit" name="deleteUser" value="suppression le compte">
    <button>Annuler</button>
</form>