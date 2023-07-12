<div class="containerItem">
    <?php foreach ($cherckBookList as $cbl) { ?>
        <div class="titleBookOne">
            <h1><?= $cbl->bookName ?></h1>
        </div>
        <div class="container">
            
            <div class="imgBook">
                <img src="<?= $cbl->cover ?>" alt="<?php $cbl->bookName ?>">
            </div>
            <div class="itemPosition">
                <div class="decoBookOne">
                    <div class="item">
                        <p>N° de Tome : <?= $cbl->tomeNumber ?></p>
                        <p>Date de sortie : <?= $cbl->releaseDate ?></p>
                    </div>
                    <div class="item">
                        <p>Prix : <?= $cbl->price ?> €</p>
                        <p>Etat : <?= $cbl->conditionsName ?></p>
                    </div>
                    <div class="item">
                        <p>Editeur : <?= $cbl->editorsName ?></p>
                        <p>Auteur : <?= $cbl->authorsName ?></p>
                    </div>
                    <div class="item">
                        <p>Categorie : <?= $cbl->catagorieName ?></p>
                        <p>Etat : <?= $cbl->conditionsName ?></p>
                    </div>
                </div>
                <div class="textOne">
                    <p class="boxDescription"><?= $cbl->description ?></p>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="itemBtn">

        <?php if (isset($_SESSION['user'])){ ?>
        <button>
            <span class="material-symbols-outlined">shopping_cart_checkout</span>
        </button>
        <button>
            <span class="material-symbols-outlined">favorite</span>
        </button>

        <?php if ($_SESSION['user']['id_useradmin'] == '2') { ?>
            <a href="./Modifie-<?= $cbl->id ?>"><button><span class="material-symbols-outlined">edit_note</span></button></a>
                <button id="btnDelete"><span class="material-symbols-outlined">warning</span></button>
        <?php } ?>
        <?php } ?>
    </div>
</div>
<div id="container" class="offContainerDelete">
    <div class="cardDelete">
        <h2>Attention toute suppression sera définitive</h2>
        <p>vous serez redirigé vairé la page manga</p>
        <a href="./suppression-<?= $cbl->id ?>"><button id="delete">supprime</button></a>
        <a href="./manga"><button>Annuller</button></a>
    </div>
</div>

<script src="./assets/js/delete.js"></script>