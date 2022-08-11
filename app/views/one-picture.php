<?php ob_start(); ?>

<section id="one-picture" class="">
    <div class="flex justify-between">
        <div class="picture">
            <img src="./app/public/images/users/user_<?= $datas['owner_id'] ;?>/<?= $datas['filename'] ;?>" alt="">
            <p>Année du cliché : 
                <?php if($datas['year'] != 0){
                $datas['year'];
                }else{ echo "inconnue";} ?></p>
                <?php if($datas['description'] != ""){?>
            <p>Description :</p>
            <p><?= $datas['description'] ;?></p>
            <?php } ;?>
            <p>Qui a ajouté cette photo ? <?= $datas['prenom'] . " " . $datas['nom']; ?></p>
        </div>
        <article class="people">
            <h2>Individus</h2>

            <div class="flex align-items-center">
                <img src="./app/public/images/site/carriou.jpg" alt="">
                <p>Pierre-Louis Carriou</p>
            </div>
            <div class="flex align-items-center">
                <img src="./app/public/images/site/lemoing.jpg" alt="">
                <p>Irma Le Moing</p>
            </div>
            <div class="flex align-items-center">
                <img src="./app/public/images/site/leny.jpg" alt="">
                <p>Julien Le Ny</p>
            </div>
            <div class="flex align-items-center">
                <img src="./app/public/images/site/lehouarner.jpg" alt="">
                <p>Marie-Barbe Le Houarner</p>
            </div>

        </article>
    </div>
</section>


<section id="comments">
    <h2>Commentaires des cousins</h2>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Se connecter" ;?>

<?php require 'layouts/template.php' ;?>