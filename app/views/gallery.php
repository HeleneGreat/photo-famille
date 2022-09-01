<?php ob_start(); ?>

<section id="gallery">
    <?php if(isset($datas[0]['prenom'])){ ;?>
            <div class="image-cropper center">
            <!-- users -->
            <?php if($datas[0]['isUser'] == "yes"){ ;?>
                <!-- users without profile picture -->
                <?php if($datas[0]['picture'] == "no-picture.png"){ ;?>
                    <img src="./app/public/images/users/no-picture.png" alt="">
                <?php }else{ ;?>
                    <img src="./app/public/images/users/user_<?= $datas[0]['people_id'] ;?>/<?= $datas[0]['picture'] ;?>" alt="">
            <!-- no-users -->
            <?php }}else{ ;?>
                <img src="./app/public/images/no-users/<?= $datas[0]['picture'] ;?>" alt="">
            <?php } ;?>
            </div>
            <h1> Toutes les photos de <?= $datas[0]['prenom'] ;?> <?= $datas[0]['nom'] ;?></h1>
    <?php }else{ ;?>
        <h1>Galerie photo</h1>
    <?php } ;?>
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