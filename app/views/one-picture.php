<?php ob_start(); ?>

<section id="one-picture" class="">
    <div class="flex justify-between">
        <div class="picture">
            <img src="./app/public/images/users/user_<?= $datas['picture']['owner_id'] ;?>/<?= $datas['picture']['filename'] ;?>" alt="">
            <p>Année du cliché : 
                <?php if($datas['picture']['year'] != 0){
                $datas['picture']['year'];
                }else{ echo "inconnue";} ?></p>
                <?php if($datas['picture']['description'] != ""){?>
            <p>Description :</p>
            <p><?= $datas['picture']['description'] ;?></p>
            <?php } ;?>
            <p>Qui a ajouté cette photo ? <?= $datas['picture']['prenom'] . " " . $datas['picture']['nom']; ?></p>
        </div>
        <article class="people">
            <h2>Individus</h2>

            <div class="profil flex align-items-center">
                <img src="./app/public/images/site/carriou.jpg" alt="">
                <p>Pierre-Louis Carriou</p>
            </div>
            <div class="profil flex align-items-center">
                <img src="./app/public/images/site/lemoing.jpg" alt="">
                <p>Irma Le Moing</p>
            </div>
            <div class="profil flex align-items-center">
                <img src="./app/public/images/site/leny.jpg" alt="">
                <p>Julien Le Ny</p>
            </div>
            <div class="profil flex align-items-center">
                <img src="./app/public/images/site/lehouarner.jpg" alt="">
                <p>Marie-Barbe Le Houarner</p>
            </div>

        </article>
    </div>
</section>


<section id="comments">
    <h2>Commentaires de mes cousin.e.s</h2>
    <!-- If there is no comment -->
    <?php if(empty($datas['comment'])){ ?>
        <p class="text-center">Soyez le ou la premier.ère à commenter cette photo !</p>
    <?php };?>

    <!-- Add a comment form -->
    <article id="comment-form" class="flex justify-between">
        <img <?php 
                if($_SESSION['picture'] != "no-picture.png"){?>
                    src="./app/public/images/users/user_<?= $_SESSION['people_id'] ;?>/<?= $_SESSION['picture'] ;?>"
                <?php }else{?>
                    src="./app/public/images/users/no-picture.png"
                <?php } ?> 
            alt="Photo de profil de <?= $_SESSION['prenom'];?> <?= $_SESSION['nom'];?>">
        <form action="index.php?action=commentForm&id=<?= $datas['picture']['picture_id'];?>" method="POST">
            <div class="input-group">
                <textarea required="" id="content" name="content"autocomplete="off" class="input"></textarea>
                <label class="label" for="content">Votre commentaire</label>
            </div>
            <button type="submit" class="btn center">Publier</button>
        </form>
    </article>

    <!-- Each comment -->
    <?php foreach($datas['comment'] as $comment){ ;?>
        <article id="comment<?= $comment['comment_id']; ?>" class="flex justify-between">
            <!-- User picture -->
            <img <?php 
                if($comment['picture'] != "no-picture.png"){?>
                    src="./app/public/images/users/user_<?= $comment['people_id'] ;?>/<?= $comment['picture'] ;?>"
                <?php }else{?>
                    src="./app/public/images/users/no-picture.png"
                <?php } ?> 
            alt="Photo de profil de <?= $comment['prenom'];?> <?= $comment['nom'];?>">
            <!-- The comment -->
            <div class="comment">
                <p class="bold identity"><?= $comment['prenom']?> <?= $comment['nom'];?>
                <span class="date"><?= $comment['created_at']; ?></span></p>
                <p class="content"><?= $comment['content']; ?></p>
            </div>
        </article>
    <?php } ;?>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Se connecter" ;?>

<?php require 'layouts/template.php' ;?>