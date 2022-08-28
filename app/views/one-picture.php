<?php ob_start(); ?>

<!-- THE PICTURE -->
<section id="one-picture" class="">
    <div class="flex justify-between">
        <div class="picture">
            <img id="picture" src="./app/public/images/users/user_<?= $datas['picture']['owner_id'] ;?>/<?= $datas['picture']['filename'] ;?>" alt="">
            <canvas id="canvas"></canvas>
            <!-- PICTURE DATE -->
            <p>Année du cliché : 
                <?php if($datas['picture']['datePicture'] != "0000-00-00"){
                echo $datas['picture']['datePicture'];
                }else{ echo "inconnue";} ?></p>
            <!-- PICTURE LOCATION -->
            <p>Lieu : 
                <?php if($datas['picture']['locationPicture'] != null){
                $datas['picture']['locationPicture'];
                }else{ echo "inconnu";} ?></p>
            <!-- PICTURE DESCRIPTION -->
            <?php if($datas['picture']['description'] != ""){?>
            <p>Description :</p>
            <p><?= $datas['picture']['description'] ;?></p>
            <?php } ;?>
            <p>Qui a ajouté cette photo ? <?= $datas['picture']['prenom'] . " " . $datas['picture']['nom']; ?></p>
        </div>
        <!-- PEOPLE TAGGED ON THE PICTURE -->
        <article class="people">
            <h2>Individus</h2>
            <?php foreach($datas['people'] as $people){ ;?>
                <div class="profil flex align-items-center">
                    <!-- users -->
                    <?php if($people['isUser'] == "yes"){ ;?>
                        <?php if($people['picture'] == "no-picture.png"){ ;?>
                            <img src="./app/public/images/users/no-picture.png" alt="" class="round">
                        <!-- users without profile picture -->
                        <?php }else{ ;?>
                            <img src="./app/public/images/users/user_<?= $people['people_id'] ;?>/<?= $people['picture'] ;?>" alt="" class="round">
                    <!-- no-users -->
                    <?php }}else{ ;?>
                        <img src="./app/public/images/no-users/<?= $people['picture'] ;?>" alt="" class="round">
                    <?php } ;?>
                    <p><?= $people['prenom'] ;?> <?= $people['nom'] ;?></p>
                </div>
            <?php } ;?>
        </article>
    </div>

    <!-- FORM TO TAG SOMEONE -->
    <div id="tag-form" class="rounded-50">
        <form action="index.php?action=addTagOnPictureForm" method="post">
            <div class="flex-md justify-between">
                <div class="input-group">
                    <input required="" id="prenom" type="text" name="prenom" class="input" autocomplete="off">
                    <label class="label" for="prenom">Prénom *</label>
                </div><div class="input-group">
                    <input required="" id="nom" type="text" name="nom" class="input" autocomplete="off">
                    <label class="label" for="nom">Nom *</label>
                </div>
            </div>
            <div id="people-list" class="text-center">
                
            </div>
            <input type="submit" class="btn center" value="Ajouter">
        </form>
    </div>
</section>

<!-- COMMENTS -->
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
            alt="Photo de profil de <?= $_SESSION['prenom'];?> <?= $_SESSION['nom'];?>" class="round">
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
            alt="Photo de profil de <?= $comment['prenom'];?> <?= $comment['nom'];?>" class="round">
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
<?php $currentPageTitle = "Photo de " . $datas['picture']['prenom'] ;?>

<script src="./app/public/js/get-people.js"></script>

<?php require 'layouts/template.php' ;?>
