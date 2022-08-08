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
                <li><a href="index.php?action=">Arbre généalogique</a></li>
                <li><a href="index.php?action=">Mes cousins</a></li>
                <li><a href="index.php?action=">Mon compte</a></li>
                <ul>
                    <li><a href="index.php?action=mes-photos">Mes photos</a></li>
                </ul>
                <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
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