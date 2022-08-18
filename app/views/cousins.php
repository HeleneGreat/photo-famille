<?php ob_start(); ?>

<section id="">
    <h1>Mes cousins</h1>
    <?php foreach($datas as $cousin){ ;?>
        <div class ="profil flex align-items-center">
            <?php if($cousin['picture'] != "no-picture.png"){ ?>
                <img src="./app/public/images/users/user_<?= $cousin['people_id'] ;?>/<?= $cousin['picture'] ;?>" alt="">
            <?php }else{ ?>
                <img src="./app/public/images/users/no-picture.png" alt="">
            <?php } ;?>
            <p><?= $cousin['prenom'] ;?> <?= $cousin['nom'] ;?></p>
        </div>
    <?php } ;?>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Mes cousins" ;?>

<?php require 'layouts/template.php' ;?>