<?php ob_start(); ?>

<div><a class="btn" href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour</a></div>

<section id="register-form">
    <h1>Créer un compte</h1>
    <form action="index.php?action=createUserForm" method="post">
        <div class="flex-md justify-around">
            <div class="input-group">
                <input required="" id="prenom" type="text" name="prenom" autocomplete="off" class="input">
                <label class="label" for="prenom">Prénom *</label>
            </div>
            <div class="input-group">
                <input required="" id="nom" type="text" name="nom" autocomplete="off" class="input">
                <label class="label" for="nom">Nom *</label>
            </div>
        </div>
        <div class="flex-md justify-around">
            <div class="input-group">
                <input required="" id="email" type="email" name="email" class="input">
                <label class="label" for="email">Adresse mail *</label>
            </div>
            <div class="input-group">
                <input required="" id="psw" type="password" name="password" autocomplete="off" class="input">
                <label class="label" for="psw">Mot de passe *</label>
            </div>
        </div>

        <fieldset>
            <legend>Lesquels de ces aïeux avons-nous en commun ? *</legend>
            <div class="flex justify-between">
                <div class="ancestor">
                    <label for="carriou">
                    <input id="carriou" type="checkbox" name="branches[]" value="carriou">
                    Pierre-Louis CARRIOU<br>(1901-1981)
                    <img src="./app/public/images/carriou.jpg" alt=""></label>
                </div>

                <div class="ancestor">
                    <label for="lemoing">
                    <input id="lemoing" type="checkbox" name="branches[]" value="lemoing">
                    Irma LE MOING<br>(1905-1988)
                    <img src="./app/public/images/lemoing.jpg" alt=""></label>
                </div>

                <div class="ancestor">
                    <label for="lequintrec">
                    <input id="lequintrec" type="checkbox" name="branches[]" value="lequintrec">
                    Pierre LE QUINTREC<br>(1901-1980)
                    <img src="./app/public/images/lequintrec.jpg" alt=""></label>
                </div>

                <div class="ancestor">
                    <label for="roperch">
                    <input id="roperch" type="checkbox" name="branches[]" value="roperch">
                    Francine ROPERCH<br>(1902-1981)
                    <img src="./app/public/images/roperch.jpg" alt=""></label>
                </div>
            </div>

            <div class="flex justify-between">
                <div class="ancestor">
                    <label for="leny">
                    <input id="leny" type="checkbox" name="branches[]" value="leny">
                    Julien LE NY<br>(1906-1974)
                    <img src="./app/public/images/leny.jpg" alt=""></label>
                </div>

                <div class="ancestor">
                    <label for="lehouarner">
                    <input id="lehouarner" type="checkbox" name="branches[]" value="lehouarner">
                    Marie-Barbe LE HOUARNER<br>(1906-1999)
                    <img src="./app/public/images/lehouarner.jpg" alt=""></label>
                </div>

                <div class="ancestor">
                    <label for="lechenadec">
                    <input id="lechenadec" type="checkbox" name="branches[]" value="lechenadec">
                    Joseph LE CHENADEC<br>(1906-1945)
                    <img src="./app/public/images/lechenadec.jpg" alt=""></label>
                </div>

                <div class="ancestor">
                    <label for="jego">
                    <input id="jego" type="checkbox" name="branches[]" value="jego">
                    Marie-Françoise JEGO<br>(1913-2004)
                    <img src="./app/public/images/jego.jpg" alt=""></label>
                </div>
            </div>
            <div class="ancestor">
                <label for="autre">
                <input id="autre" type="checkbox" name="branches[]" value="autre">
                Autre
                <img src="./app/public/images/user.png" alt=""></label>
            </div>
        </fieldset>
        <div class="relative">
            <button type="submit" class="center btn" disabled>Créer mon compte</button>
            <div class='infobulle'><p><i class="fa-solid fa-triangle-exclamation"></i> Vous devez sélectionner au moins un aïeul !</p></div>
        </div>
    </form>

</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Créer un compte" ;?>

<script src="./app/public/js/checkbox-checked.js"></script>

<?php require 'layouts/template.php' ;?>