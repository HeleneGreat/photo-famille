<?php ob_start(); ?>

<div><a class="btn" href="index.php"><i class="fa-solid fa-arrow-left-long"></i> Retour</a></div>

<section id="login-form" class="center">
    <h1>Se connecter à mon compte</h1>
    <form action="index.php?action=loginForm" method="post">
        <fieldset>
            <div class="input-group">
                <input required="" id="email" type="email" name="email" class="input">
                <label class="label" for="email">Adresse mail</label>
            </div>
            <div class="input-group">
                <input required="" id="psw" type="password" name="password" class="input">
                <label class="label" for="psw">Mot de passe</label>
            </div>

        </fieldset>

        <button type="submit" class="center btn">Se connecter</button>
    </form>

</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Se connecter" ;?>

<?php require 'layouts/template.php' ;?>