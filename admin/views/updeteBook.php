<div class="decoform">

    <div class="titleBookAdd">
        <h2>Modifier Manga</h2>
    </div>
    <div id="addBook">
        <form method="POST" enctype="multipart/form-data">

            <!-- liste des types -->
            <label for="selectElement">Types</label>
            <select id="selectElement" name="type[]" multiple>
                <?php foreach ($typeList as $tt) { ?>
                    
                    <option value="<?= $tt->id ?>" <?= in_array($tt->id , $tipeId) ? 'selected' : '' ?>><?= $tt->typesName ?></option>
                <?php }  ?>
            </select>
       
            <script>
                new SlimSelect({
                    select: '#selectElement'
                })
            </script>
            <!-- liste dse auteurs-->

            <label for="author">Auteur</label>
            <select name="author" id="author">
                <option selected disabled>---</option>
                <?php foreach ($authorListe as $al) { ?>
                    <option value="<?= $al->idAuthor ?>"><?= $al->authorsName ?></option>
                <?php } ?>
               
            </select>
            <?php if (isset($formErrors['author'])) { ?>
                <p><?= $formErrors['author'] ?></p>
            <?php } ?>
            <!-- liste des categories -->

            <label for="categorie">Catégories</label>
            <select name="categorie" id="categorie">
                <option selected disabled>---</option>
                <?php foreach ($categorielist as $cl) { ?>
                    <option value="<?= $cl->id ?>"><?= $cl->catagorieName ?></option>
                <?php } ?>
            </select>
            <?php if (isset($formErrors['categorie'])) { ?>
                <p><?= $formErrors['categorie'] ?></p>
            <?php } ?>
            <!-- liste des editeurs -->

            <label for="editor">Éditeur</label>
            <select name="editor" id="editor">
                <option selected disabled>---</option>
                <?php foreach ($editorlist as $el) { ?>
                    <option value="<?= $el->idEditor ?>"><?= $el->editorsName ?></option>
                <?php } ?>
            </select>
            <?php if (isset($formErrors['editor'])) { ?>
                <p><?= $formErrors['editor'] ?></p>
            <?php } ?>

            <label for="language">Langue</label>
            <select name="language" id="language">
                <option selected disabled>---</option>
                <?php foreach ($languagelist as $ll) { ?>
                    <option value="<?= $ll->idLanguages ?>"><?= $ll->languagesName ?></option>
                <?php } ?>
            </select>
            <?php if (isset($formErrors['language'])) { ?>
                <p><?= $formErrors['language'] ?></p>
            <?php } ?>

            <label for="conditions">Etat</label>
            <select name="conditions" id="conditions">
                <option selected disabled>---</option>
                <?php foreach ($conditionsListe as $cl) { ?>
                    <option value="<?= $cl->id ?>"><?= $cl->conditionsName ?></option>
                <?php } ?>
            </select>
            <?php if (isset($formErrors['conditions'])) { ?>
                <p><?= $formErrors['conditions'] ?></p>
            <?php } ?>

            <label for="title">Titre</label>
            <input type="text" id="title" name="title">
            <?php if (isset($formErrors['title'])) { ?>
                <p><?= $formErrors['title'] ?></p>
            <?php } ?>

            <label for="numTome">N° de tome</label>
            <input type="number" id="numTome" min="0" name="numTome">
            <?php if (isset($formErrors['number'])) { ?>
                <p><?= $formErrors['number'] ?></p>
            <?php } ?>

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="50" rows="15"></textarea>
            <?php if (isset($formErrors['description'])) { ?>
                <p><?= $formErrors['description'] ?></p>
            <?php } ?>

            <label for="exit">Date de sortie</label>
            <input type="date" id="exit" name="exit">
            <?php if (isset($formErrors['exit'])) { ?>
                <p><?= $formErrors['exit'] ?></p>
            <?php } ?>

            <label for="price">Prix</label>
            <input type="text" id="price" name="price">
            <?php if (isset($formErrors['price'])) { ?>
                <p><?= $formErrors['price'] ?></p>
            <?php } ?>

            <!-- ici ont créer notre 'form' avec une 'method=POST' avec un 'enctype="multipart/form-data"'. -->
            <article class="boxArticle" id="boxPost">
                <label class="boxTitle" for="image">Image</label>
                <!-- ci-dessous ont vient créer notre balise IMG qui va nous afficher notre PREVIEW -->
                <?php foreach($bookid as $b ){ ?>
                <img src="<?= $b->cover ?>" alt="" class="imgView" id="preview" name="img">
                <?php } ?>
                <!-- ci-dessous dans notre input on vient inclure notre FONCTION JS 'onchange="previewPicture(this)"' -->
                <div class="decoImg">
                    <input class="boxText" id="image" onchange="previewPicture(this)" type="file" name="image">
                </div>
                <?php if (isset($formErrors['image'])) { ?>
                    <p><?= $formErrors['image'] ?></p>
                <?php } ?>
            </article>

            <div class="btnBoxText">
                <input class="boxText" type="submit" name="addNewBook">
            </div>
        </form>
    </div>
</div>
<script src="./assets/js/animation.js"></script>
<script src="./assets/js/img.js"></script>