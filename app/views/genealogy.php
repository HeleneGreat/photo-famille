<?php ob_start(); ?>

<section id="">
    <h1>Mon arbre généalogique</h1>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Mon arbre généalogique" ;?>

<?php require 'layouts/template.php' ;?>