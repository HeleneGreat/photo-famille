<?php ob_start(); ?>

<section id="home">
    <h1>Bienvenue sur le site des photos de famille de Hélène Carriou et ses cousin.e.s</h1>
    <p class="text-center">Pour accéder aux albums photos, vous devez être connectés.</p>
    <div class="flex justify-center">
        <a href="index.php?action=login" class="btn">Se connecter</a>
        <a href="index.php?action=register" class="btn">Créer un compte</a>
    </div>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Bienvenue" ;?>

<?php require 'layouts/template.php' ;?>