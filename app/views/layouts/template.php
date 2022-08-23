<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="./app/public/css/style.css">
        <title><?= $currentPageTitle;?> | Nos photos de famille</title>
    </head>

    <body>

    <!-- Blur element when mobile nav is open -->
    <div id="blur" class="display-none"></div>

    <header id="banner">
        <?php if(!empty($_SESSION)){ ?>
        <div id="burger">
            <a class="menu-toggle mobile" title="Ouvrir le menu"><i class="fa-solid fa-bars"></i></a>
        </div>
        <nav id="nav" class="container">
            <a class="menu-toggle mobile" title="Fermer le menu"><i class="fa-solid fa-xmark"></i></a>
            <ul id="main-nav" class="flex col justify-between">
                <li class="submenu">
                    <?php if($_SESSION['picture'] != "no-picture.png"){ ?>
                    <img src="./app/public/images/users/user_<?= $_SESSION['people_id'] ;?>/<?= $_SESSION['picture'] ;?>" alt="" class="profil-picture pointer lg">
                    <?php }else{ ?>
                    <img src="./app/public/images/users/no-picture.png" alt="" class="profil-picture pointer lg">
                    <?php } ;?>
                    <!-- SUB MENU ACCOUNT -->
                    <ul class="center col justify-center">
                        <li class="flex-xs justify-center align-items-center">
                            <?php if($_SESSION['picture'] != "no-picture.png"){ ?>
                            <img src="./app/public/images/users/user_<?= $_SESSION['people_id'] ;?>/<?= $_SESSION['picture'] ;?>" alt="" class="profil-picture">
                            <?php }else{ ?>
                            <img src="./app/public/images/users/no-picture.png" alt="" class="profil-picture">
                            <?php } ;?>
                            <div>
                                <p class="name bold"><?= $_SESSION['prenom'] ;?> <?= $_SESSION['nom'] ;?></p>
                                <p class="email"><?= $_SESSION['email'] ;?></p>
                            </div>
                        </li>
                        <li class="lg"><a href="index.php?action=mon-compte">Mon compte</a></li>
                        <li class="lg"><a href="index.php?action=deconnexion"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                    </ul>
                </li>
                <li><a href="index.php?action=galerie">Galerie photo</a></li>
                <li><a href="index.php?action=ma-genealogie">Arbre généalogique</a></li>
                <li><a href="index.php?action=mes-cousins">Mes cousins</a></li>
                <li><a href="index.php?action=mes-photos">Mes photos</a></li>
                <li class="mobile"><a href="index.php?action=mon-compte">Mon compte</a></li>
                <li class="mobile"><a href="index.php?action=deconnexion"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </nav>
        <?php } ;?>
    </header>

    <main class="container">
        <?= $content; ?>
    </main>
    
    <footer id="foot">
        This is a footer
    </footer>

    <script src="./app/public/js/menu-burger.js"></script>
    <script src="./app/public/js/picture-tag.js"></script>
    </body>
</html>