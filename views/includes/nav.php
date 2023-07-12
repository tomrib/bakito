<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/main.css">
    <title>BAKITO</title>
</head>

<body>
    <div class="menuBurger">
<button id="btnBurger"><span class="material-symbols-outlined">
menu
</span></button>
    </div>
    <nav id="burger" class="offNavr">
        <!--dans la div delivered sa contien les livre les cat&égorie mis a gauche de la nav-->
        <div class="delivered">
            <p class="titleAcceuil"><a href="./accueil" class="acceuil">BAKITO</a></p>
            <a href="./manga"><button>Mangas</button></a>
            <a href="./nouveautes"><button>Nouveautés</button></a>
        </div>
        <form action="./Recherche" method="GET" id="resear">
            <input type="search" name="resear" placeholder="Recherche...">
            <button class="valid" name="valid"><span class="material-symbols-outlined">search</span></button>
        </form>
        <div class="connect">
            <?php if (isset($_SESSION['user'])) { ?>
                <?php if ($_SESSION['user']['id_useradmin'] == '2') { ?>
                    <a href="./ajout"><button>Ajouter un livre</button></a>
                <?php } ?>
                <a href="./Profil"><button>Profil</button></a>
                <a href="./Deconnexion"><button>Déconnexion</button></a>
            <?php } else { ?>
                <a href="./inscription"><button>Inscription</button></a>
                <a href="./connexion"><button id="boxuser">Connexion</button></a>
            <?php } ?>
        </div>
    </nav>
