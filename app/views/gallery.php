<?php ob_start(); ?>


<section id="gallery">
    <h1>Galerie photo</h1>
    <div class="flex justify-start">
        <?php foreach($datas as $picture){ ;?>
            <article class="card rounded-50">
                <a href="index.php?action=photo&id=<?= $picture['picture_id'] ;?>">
                    <img src="./app/public/images/users/user_<?= $picture['owner_id'] ;?>/<?= $picture['filename'] ;?>" alt="" class="rounded-50">
                    <?php if($picture['owner_id'] == $_SESSION['people_id']){ ;?>
                        <span class="owner"><img src="./app/public/images/site/ruban.png" alt=""></span>
                    <?php } ;?>
                </a>
            </article>
        <?php } ;?>



    </div>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Galerie photos" ;?>

<?php require 'layouts/template.php' ;?>