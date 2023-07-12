    <div class="formContainer">
        <div class="formTitle">
            <h2>Inscrition</h2>
        </div>

        <div class="containerRegister">
            <?php if (isset($formErrors['add'])) { ?>
                <p class="textFormVal"><?= $formErrors['add'] ?></p>
                <p class="textFormVal"><?= $formErrors['addP'] ?></p>
                <?php if (isset($formErrors['fail'])){?>
                <p class="textFormVal"><?= $formErrors['fail'] ?></p>
                <?php } ?>
            <?php } else { ?>
                <form action="" method="POST" class="formDeco">
                    <fieldset>
                        <label for="civility">Civilité</label>
                        <select name="civility" id="civility" value="<?= @$_POST['civility'] ?>" class="<?= isset($formErrors['civility']) ? 'inputError' : '' ?>">
                            <option selected disabled>---</option>
                            <?php foreach ($civilitiesList as $c) { ?>
                                <option value="<?= $c->id ?>" <?= @$_POST['civility'] == 'Monsieur' ? 'selected' : ' ' ?>><?= $c->name ?></option>
                            <?php } ?>
                        </select>
                        <p class="errorMessage"><?= @$formErrors['civility'] ?></p>
                        <!--Nom-->
                        <label for="lastname">Nom de famille</label>
                        <input type="text" name="lastname" id="lastname" placeholder="Dupont" value="<?= @$_POST['lastname'] ?>" class="<?= isset($formErrors['lastname']) ? 'inputError' : '' ?>">
                        <p class="errorMessage"><?= @$formErrors['lastname'] ?></p>
                        <!--prenom-->
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" id="firstname" placeholder="paul" value="<?= @$_POST['firstname'] ?>" class="<?= isset($formErrors['firstname']) ? 'inputError' : '' ?>">
                        <p class="errorMessage"><?= @$formErrors['firstname'] ?></p>
                    </fieldset>
                    <fieldset>
                        <!--Adresse-->
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" placeholder="259 rue paul du pont" class="<?= isset($formErrors['address']) ? 'inputError' : '' ?>">
                        <p class="errorMessage">
                            <?= @$formErrors['address'] ?>
                        </p>
                        <!--city = vile plus code postal-->
                        <label for="city">Ville</label>
                        <select name="city" id="city" class="<?= isset($formErrors['city']) ? 'inputError' : '' ?>">
                            <option selected disabled>---</option>
                            <?php foreach ($cityList as $c) { ?>
                                <option value="<?= $c->id ?>"><?= $c->postalCode ?> - <?= $c->city ?></option>
                            <?php } ?>
                        </select>
                        <p class="errorMessage"><?= @$formErrors['postalCcode'] ?></p>
                    </fieldset>
                    <fieldset>
                        <!--mail-->
                        <label for="formEmail">Adresse email</label>
                        <input type="email" name="email" id="formEmail" placeholder="pauldupont@gmal.com" value="<?= @$_POST['email'] ?>" class="<?= isset($formErrors['email']) ? 'inputError' : '' ?>">
                        <p class="errorMessage"><?= @$formErrors['email'] ?></p>
                        <!--mot de passe-->
                        <label for="formPassword">mot de passe</label>
                        <input type="password" name="password" id="formPassword" placeholder="**************" class="<?= isset($formErrors['password']) ? 'inputError' : '' ?>">
                        <p class="errorMessage"><?= @$formErrors['password'] ?></p>
                        <div id="textPassWord" class="noBoxPass">
                            <ul>
                                <li id="lower">Au moin 1 minuscule<span></span><span></span></li>
                                <li id="upper">Au moin 1 majuscule<span></span><span></span></li>
                                <li id="number">Au moin 1 chiffre<span></span><span></span></li>
                                <li id="special">Au moin un caractére spécial<span></span><span></span></li>
                                <li id="stringLength">Au moin 8 caractéres<span></span><span></span></li>
                            </ul>
                        </div>
                        <!--confimation du mot de pass-->
                        <label for="confirmPassword">confimet le mot de passe</label>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="**************" class="<?= isset($formErrors['password']) ? 'inputError' : '' ?>">
                        <p class="errorMessage"><?= @$formErrors['confirmPassword'] ?></p>
                        <!--liste des condition des carataire des mot de passe
                    vous pour plus de securete-->
                    </fieldset>
                    <div class="containerBtn">
                        <button class="btnForm" name='register'>Enregistrer</button>
                    </div>
                </form>
            <?php } ?>
        </div>

    </div>
  
    <script src="./assets/js/script.js"></script>