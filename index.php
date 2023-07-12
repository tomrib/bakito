<?php 
require_once 'controllers/book/acueilBookController.php';
require_once 'views/includes/nav.php';
?>
<h1 class="title">Nos nouveautés</h1>
<div class="owl-carousel owl-theme">
    <?php foreach ($booksList as $bo) { ?>
        <div class="item">
            <p class="titreBook"><?= $bo->bookName ?></p
            >
            <img src="<?= $bo->cover ?>" alt="<?= $bo->bookName ?>">
            <a href="./info-<?= $bo->id ?>"><button class="newBook">Plus d'info ...</button></a>
        </div>

    <?php } ?>
</div>
<div class="title">
    <h2>Editeur</h2>
</div>

    <div class="imgEdithor">
        <div class="item">
            <p>Akata</p>
            <img src="assets/img/akata.png" alt="akata">
        </div>
        <div class="item">
            <p>pika</p>
            <img src="assets/img/pika.png" alt="pika">
        </div>
        <div class="item">
            <p>kioon</p>
            <img src="assets/img/kioon.jpg" alt="kioon">
        </div>

    </div>
    
    <div class="short ">
        <div class="title">
            <h2 class="accusedTitle">presontation</h2>
        </div>
        <p class="textShort">
            Tout le monde connaît de près ou de loin les mangas, cette étonnante bande dessinée en provenance du pays du soleil levant.
            Naruto, One Piece, Bleach, ou encore Dragon ball, trouvent place dans nos bibliothèques depuis quelques années.
            Ils sont aujourd'hui systématiquement présent dans toutes les librairies de France, de part leur tome en nombre conséquent,
            avec leurs accessoires et figurines que les fans s'arrachent et collectionnent.
        </p>
    </div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" async></script>
<script integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" src="https://code.jquery.com/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
<script src="./assets/js/carousel.js" async></script>
<?php require_once 'views/includes/footer.php';?>
