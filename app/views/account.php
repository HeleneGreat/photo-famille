<?php ob_start(); ?>

<section id="">
    <h1>Mon compte</h1>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Mon compte" ;?>

<?php require 'layouts/template.php' ;?>