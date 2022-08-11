<?php ob_start(); ?>

<section id="picture-branche">
    <h1>Veuillez définir à quelle(s) branche(s) correspondent vos photos</h1>

    <form action="index.php?action=selectBrancheForm" method="post">
    <?php $key = 0;
        foreach($datas['pictures'] as $picture){ 
        $key += 1 ;?>
        <article class="flex center">
            <div class="card">
                <img src="./app/public/images/users/user_<?= $_SESSION['user_id'] ;?>/<?= $picture['filename'] ;?>" alt="">
            </div>
            <div class="branches flex">
                <?php foreach($datas['branches'] as $branche){ ;?>
                    <label><input type="checkbox" name="branche[<?= $picture['picture_id'] ;?>-<?= $branche['branche_id'] ;?>]" value="<?= $branche['branche_id'] ;?>"><?= $branche['name'] ;?></label>
                <?php } ;?>
            </div>
        </article>
    <?php } ;?>
        <p class="text-center"><button type="submit" class="btn">Enregistrer</button></p>
    </form>
    
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Définir les branches de mes photos" ;?>

<?php require 'layouts/template.php' ;?>