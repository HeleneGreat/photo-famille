<?php ob_start(); ?>

<section id="">
    <h1>Veuillez définir à quelle(s) branche(s) correspondent vos photos</h1>

    <?php foreach($datas as $branche_id){ ;?>
        <div>
            
        </div>
    <?php } ;?>
    
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Définir les branches de mes photos" ;?>

<?php require 'layouts/template.php' ;?>