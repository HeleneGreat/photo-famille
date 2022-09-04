<?php ob_start(); ?>

<!-- THE PICTURE -->
<section id="one-picture" class="">
    <div class="flex justify-between">
        <div id="<?= $datas['picture']['picture_id'];?>" class="picture">
            <img id="picture" src="./app/public/images/users/user_<?= $datas['picture']['owner_id'] ;?>/<?= $datas['picture']['filename'] ;?>" alt="">
            <canvas id="canvas"></canvas>
            <div class="flex justify-between align-items-center">
                <div class="picture-info">
                    <!-- PICTURE OWNER -->
                    <p>Une photo de <a href="index.php?action=galerie&owner=<?= $datas['picture']['owner_id'] ;?>"><span class="primary"><?= $datas['picture']['prenom'] . " " . $datas['picture']['nom']; ?></span></a></p>
                    
                    
                    <!-- UPDATE PICTURE INFO -->
                    <?php if(isset($_GET['modify']) && $_GET['modify'] == true){ ;?>
                        <form action="index.php?action=updatePictureInfoForm&id=<?= $datas['picture']['picture_id'];?>" method="post">
                            <!-- UPDATE DATE -->
                            <div id="date" class="flex">
                                <!-- day -->
                                <div class="input-group">
                                    <select name="day" id="day" class="input">
                                        <option value="" <?php if($datas['picture']['dayPicture'] == ""){ echo "selected";} ;?>>--</option>
                                        <?php for($i = 1; $i < 31; $i++){ ;?>
                                            <option value="<?= $i ;?>" <?php if($datas['picture']['dayPicture'] == $i){ echo "selected";} ;?>><?= $i ;?></option>
                                        <?php } ;?>
                                    </select>
                                    <label class="label" for="day">Jour</label>
                                </div>
                                <!-- month -->
                                <div class="input-group">
                                    <select name="month" id="month" class="input">
                                        <option value="" <?php if($datas['picture']['dayPicture'] == ""){ echo "selected";} ;?>>--</option>
                                        <option value="janvier" <?php if($datas['picture']['monthPicture'] == "january"){ echo "selected";} ;?>>Janvier</option>
                                        <option value="février" <?php if($datas['picture']['monthPicture'] == "février"){ echo "selected";} ;?>>Février</option>
                                        <option value="mars" <?php if($datas['picture']['monthPicture'] == "mars"){ echo "selected";} ;?>>Mars</option>
                                        <option value="avril" <?php if($datas['picture']['monthPicture'] == "avril"){ echo "selected";} ;?>>Avril</option>
                                        <option value="mai" <?php if($datas['picture']['monthPicture'] == "mai"){ echo "selected";} ;?>>Mai</option>
                                        <option value="juin" <?php if($datas['picture']['monthPicture'] == "juin"){ echo "selected";} ;?>>Juin</option>
                                        <option value="juillet" <?php if($datas['picture']['monthPicture'] == "juillet"){ echo "selected";} ;?>>Juillet</option>
                                        <option value="août" <?php if($datas['picture']['monthPicture'] == "août"){ echo "selected";} ;?>>Août</option>
                                        <option value="septembre" <?php if($datas['picture']['monthPicture'] == "septembre"){ echo "selected";} ;?>>Septembre</option>
                                        <option value="octobre" <?php if($datas['picture']['monthPicture'] == "octobre"){ echo "selected";} ;?>>Octobre</option>
                                        <option value="novembre" <?php if($datas['picture']['monthPicture'] == "novembre"){ echo "selected";} ;?>>Novembre</option>
                                        <option value="décembre" <?php if($datas['picture']['monthPicture'] == "décembre"){ echo "selected";} ;?>>Décembre</option>
                                    </select>
                                    <label class="label" for="month">Mois</label>
                                </div>
                                <!-- year -->
                                <div class="input-group">
                                    <input type="number" name="year" id="year" class="input" min="1700" max="2030" autocomplete="off" value="<?= $datas['picture']['yearPicture']; ;?>">
                                    <label class="label" for="year">Année</label>
                                </div>
                            </div>
                            <!-- UPDATE LOCATION -->
                            <div class="input-group location">
                                <input type="text" name="location" id="location" class="input" autocomplete="off" value="<?= $datas['picture']['locationPicture'] ;?>">
                                <label class="label" for="location">Lieu</label>
                            </div>
                            <!-- UPDATE DESCRIPTION -->
                            <div class="input-group description">
                                <textarea name="description" id="description" cols="30" rows="10" class="input" autocomplete="off"><?= $datas['picture']['description'] ;?></textarea>
                                <label class="label" for="description">Description</label>
                            </div>
                            <div class="flex justify-center">
                                <p class="btn cancel"><a href="index.php?action=photo&id=<?= $datas['picture']['picture_id'] ;?>">Annuler</a></p>
                                <p><button type="submit" class="btn center">Enregistrer</button></p>
                            </div>
                        </form>


                    <!-- PICTURE INFO -->
                    <?php }else{ ;?>
                        <!-- PICTURE DATE -->
                        <p>Prise 
                            <!-- day + month + year -->
                            <?php if($datas['picture']['dayPicture'] != "" && $datas['picture']['monthPicture'] != "" && $datas['picture']['yearPicture'] != ""){
                                echo "le " . "<span class='primary'>" . $datas['picture']['dayPicture'] . " " . $datas['picture']['monthPicture'] . " " . $datas['picture']['yearPicture'];
                            // day + month
                            }else if($datas['picture']['dayPicture'] != "" && $datas['picture']['monthPicture'] != "" && $datas['picture']['yearPicture'] == ""){
                                echo "un " . "<span class='primary'>" . $datas['picture']['dayPicture'] . " " . $datas['picture']['monthPicture'];
                            // month + year
                            }else if($datas['picture']['dayPicture'] == "" && $datas['picture']['monthPicture'] != "" && $datas['picture']['yearPicture'] != ""){
                                echo "en " . "<span class='primary'>" . $datas['picture']['monthPicture'] . $datas['picture']['yearPicture'];
                            // date completely unknown
                            }else if($datas['picture']['monthPicture'] == "" && $datas['picture']['yearPicture'] == ""){ echo "à une date inconnue";
                            // only month
                            }else{ echo "en " . "<span class='primary'>" . $datas['picture']['monthPicture'];}?></span>
                           
                        <!-- PICTURE LOCATION -->
                         à 
                            <?php if($datas['picture']['locationPicture'] != null){
                                echo "<span class='primary'>" . $datas['picture']['locationPicture'] . "</span>";
                            }else{ echo "un lieu inconnu";} ?></p>
                        <!-- PICTURE DESCRIPTION -->
                            <?php if($datas['picture']['description'] != ""){?>
                                <p class="description primary"><?= $datas['picture']['description'] ;?></p>
                            <?php } ;?>
                    <?php } ;?>
                    </div>
                <!-- LINK TO UPDATE PICTURE INFO -->
                <?php if($datas['picture']['owner_id'] == $_SESSION['people_id'] && !isset($_GET['modify'])){ ;?>
                    <a href="index.php?action=photo&id=<?= $datas['picture']['picture_id'];?>&modify=true" title="Modifier les informations de ma photo" class="pen-modify"><img src="./app/public/images/site/pencil.svg" alt=""></a>
                <?php } ;?>
            </div>
        </div>

        <!-- PEOPLE TAGGED ON THE PICTURE -->
        <article class="people">
            <h2>Individus</h2>
            <?php foreach($datas['people'] as $people){ ;?>
                <div id="<?= $people['people_id'] ;?>" class="tagged profil">
                    <a class="flex align-items-center" href="index.php?action=galerie&tag=<?= $people['people_id'] ;?>" title="Toutes les photos de <?= $people['prenom'] ;?> <?= $people['nom'] ;?>">
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
                    </a>
                </div>
            <?php } ;?>
        </article>
    </div>

    <!-- Owner tag symbol if this is the picture's owner account -->
    <?php if($datas['picture']['owner_id'] == $_SESSION['people_id']){ ;?>
    <!-- FORM TO TAG SOMEONE -->
    <div id="tag-form" class="rounded-50 display-none">
        <span id="close">x</span>
        <form action="index.php?action=addTagOnPictureForm&id=<?= $datas['picture']['picture_id'];?>" method="post">
            <div class="flex-md justify-between">
                <div class="input-group">
                    <input required="" id="prenom" type="text" name="prenom" class="input" autocomplete="off">
                    <label class="label" for="prenom">Prénom *</label>
                </div><div class="input-group">
                    <input required="" id="nom" type="text" name="nom" class="input" autocomplete="off">
                    <label class="label" for="nom">Nom *</label>
                </div>
                <input type="hidden" id="people_id" name="people_id" value="">
                <!-- <input type="hidden" id="xPercent" name="xPercent" value="">
                <input type="hidden" id="yPercent" name="yPercent" value=""> -->
                <input type="hidden" name="coordinates" id="coordinates">
            </div>
            <div id="people-list" class="text-center">
            </div>
            <input type="submit" class="btn center" value="Ajouter">
        </form>
    </div>
    <?php } ;?>
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
