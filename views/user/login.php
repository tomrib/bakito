<main id="loginContainer" class="norowuser">
    <form method="POST">
    <div class="logincare">
    <p class="errorMessage"><?= @$formErrors['loginEmail'] ?></p>
        <div>
            <label for="loginEmail">Adresse mail</label>
            <input type="email" name="loginEmail" id="loginEmail" placeholder="pauldupont@gmal.com" class="<?= isset($formErrors['email']) ? 'inputError' : '' ?>">
        </div>
        <div>
            <label for="loginPassword">Mot de passe</label>
            <input type="password" name="loginPassword" id="loginPassword" placeholder="**************" class="<?= isset($formErrors['loginPassword']) ? 'inputError' : '' ?>">
        </div>
        <button id="login">Connexion</button>
    </div>
</form>
</main>