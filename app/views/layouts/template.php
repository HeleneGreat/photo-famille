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

    <header id="banner">
        <nav class="container">
            <ul class="flex-xl justify-between">
                <li><a href="index.php?action=galerie">Galerie photo</a></li>
                <li><a href="index.php?action=ma-genealogie">Arbre généalogique</a></li>
                <li><a href="index.php?action=mes-cousins">Mes cousins</a></li>
                <li><a href="index.php?action=mes-photos">Mes photos</a></li>
                <li class="submenu">
                    <?php if($_SESSION['picture'] != "no-picture.png"){ ?>
                    <img src="./app/public/images/users/user_<?= $_SESSION['people_id'] ;?>/<?= $_SESSION['picture'] ;?>" alt="" class="profil-picture">
                    <?php }else{ ?>
                    <img src="./app/public/images/users/no-picture.png" alt="" class="profil-picture">
                    <?php } ;?>
                    <!-- SUB MENU ACCOUNT -->
                    <ul class="display-none col justify-between">
                        <li class="flex justify-between">
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
                        <li><a href="index.php?action=mon-compte">Mon compte</a></li>
                        <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container">
        <?= $content; ?>
    </main>
    
    <footer id="foot">
        This is a footer
    </footer>
    </body>
</html>