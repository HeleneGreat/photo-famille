<?php ob_start(); ?>

<div><a class="btn" href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour</a></div>

<section id="register-form">
    <h1>Créer un compte</h1>
    <form action="index.php?action=createUserForm" method="post" enctype="multipart/form-data">
        <div id="user" class="flex-md justify-around center">
            <div>
                <!-- Prénom -->
                <div class="input-group">
                    <input required="" id="prenom" type="text" name="prenom" autocomplete="off" class="input">
                    <label class="label" for="prenom">Prénom *</label>
                </div>
                <!-- Nom -->
                <div class="input-group">
                    <input required="" id="nom" type="text" name="nom" autocomplete="off" class="input">
                    <label class="label" for="nom">Nom *</label>
                </div>
                <!-- Date de naissance -->
                <div class="input-group">
                    <input required="" id="birth" type="date" name="birth" autocomplete="off" class="input">
                    <label class="label label-no-placeholder" for="birth">Date de naissance *</label>
                </div>
            </div>
            <div>
                <!-- Email -->
                <div class="input-group">
                    <input required="" id="email" type="email" name="email" class="input">
                    <label class="label" for="email">Adresse mail *</label>
                </div>
                <!-- Mot de passe -->
                <div class="input-group">
                    <input required="" id="psw" type="password" name="password" autocomplete="off" class="input">
                    <label class="label" for="psw">Mot de passe *</label>
                </div>
                <!-- Confirmation mot de passe -->
                <div class="input-group">
                    <input required="" id="psw" type="password" name="password" autocomplete="off" class="input">
                    <label class="label" for="psw">Confirmer le mot de passe *</label>
                </div>
            </div>
        </div>
        <!-- Photo de profil -->
        <div id="profil-picture" class="flex col justify-center">
            <label for="inputImg" class="custom-file-upload ajout">
                <span class="primary text-center">Photo de profil</span>
                <img src="./app/public/images/site/picture-add.png" alt="Ajouter une photo de profil" title="Ajouter une photo de profil">
                <input type="file" name="picture" id="inputImg" accept="image/*" class="display-none" required="">
            </label>
            <img class="display-none profil-picture" src="" id="preview" alt="">
        </div>
            <!-- <div>
                    <p id="displayImg">Couverture du livre</p>
                    <label for="inputImg" class="custom-file-upload ajout">
                        <img src="./App/Public/Admin/images/picture.png" alt="Ajouter une image" title="Ajouter une image">
                        <input type="file" name="picture" id="inputImg" accept="image/*">
                    </label>
                    <p class="flex justify-center"><img class="display-none" src="" id="preview" alt=""></p>
                </div> -->




        <fieldset>
            <legend>Lesquels de ces aïeux avons-nous en commun ? *</legend>
            <div class="flex justify-between">
                <div class="ancestor">
                    <label for="carriou">
                    <input id="carriou" type="checkbox" name="branches[]" value="carriou">
                    Pierre-Louis CARRIOU<br>(1901-1981)
                    <img src="./app/public/images/site/carriou.jpg" alt="" class="rounded-100"></label>
                </div>

                <div class="ancestor">
                    <label for="lemoing">
                    <input id="lemoing" type="checkbox" name="branches[]" value="lemoing">
                    Irma LE MOING<br>(1905-1988)
                    <img src="./app/public/images/site/lemoing.jpg" alt="" class="rounded-100"></label>
                </div>

                <div class="ancestor">
                    <label for="lequintrec">
                    <input id="lequintrec" type="checkbox" name="branches[]" value="lequintrec">
                    Pierre LE QUINTREC<br>(1901-1980)
                    <img src="./app/public/images/site/lequintrec.jpg" alt="" class="rounded-100"></label>
                </div>

                <div class="ancestor">
                    <label for="roperch">
                    <input id="roperch" type="checkbox" name="branches[]" value="roperch">
                    Francine ROPERCH<br>(1902-1981)
                    <img src="./app/public/images/site/roperch.jpg" alt="" class="rounded-100"></label>
                </div>
            </div>

            <div class="flex justify-between">
                <div class="ancestor">
                    <label for="leny">
                    <input id="leny" type="checkbox" name="branches[]" value="leny">
                    Julien LE NY<br>(1906-1974)
                    <img src="./app/public/images/site/leny.jpg" alt="" class="rounded-100"></label>
                </div>

                <div class="ancestor">
                    <label for="lehouarner">
                    <input id="lehouarner" type="checkbox" name="branches[]" value="lehouarner">
                    Marie-Barbe LE HOUARNER<br>(1906-1999)
                    <img src="./app/public/images/site/lehouarner.jpg" alt="" class="rounded-100"></label>
                </div>

                <div class="ancestor">
                    <label for="lechenadec">
                    <input id="lechenadec" type="checkbox" name="branches[]" value="lechenadec">
                    Joseph LE CHENADEC<br>(1906-1945)
                    <img src="./app/public/images/site/lechenadec.jpg" alt="" class="rounded-100"></label>
                </div>

                <div class="ancestor">
                    <label for="jego">
                    <input id="jego" type="checkbox" name="branches[]" value="jego">
                    Marie-Françoise JEGO<br>(1913-2004)
                    <img src="./app/public/images/site/jego.jpg" alt="" class="rounded-100"></label>
                </div>
            </div>
        </fieldset>
        <div class="relative">
            <button type="submit" class="center btn">Créer mon compte</button>
            <div class='infobulle'><p><i class="fa-solid fa-triangle-exclamation"></i> Vous devez sélectionner au moins un aïeul !</p></div>
        </div>
    </form>

</section>


<script src="./app/public/js/picture-preview.js"></script>
<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Créer un compte" ;?>

<script src="./app/public/js/checkbox-checked.js"></script>

<?php require 'layouts/template.php' ;?>