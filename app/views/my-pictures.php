<?php ob_start(); ?>


<section id="gallery">
    <h1>Mes photos de famille</h1>
    <article id="add-picture">
        <form action="index.php?action=addPictureForm" method="post" enctype="multipart/form-data">
            <p>Pour sélectionner plusieurs photos, maintenez la touche "Ctrl" enfoncée quand vous cliquez sur une photo.</p>
            <p id="displayImg">Couverture du livre TODO</p>
            <label for="inputImg" class="custom-file-upload ajout">
                <img src="./app/public/images/site/picture-add.png" alt="Ajouter des photos" title="Ajouter des photos">
                <input type="file" name="picture[]" id="inputImg" accept="image/*">
            </label>
            <p class="flex justify-center"><img class="display-none" src="" id="preview" alt=""></p>
            <button type="submit" class="center btn">Publier les photos</button>

        </form>
    </article>

    <div class="flex justify-around">
        <?php for($i = 0; $i < 5; $i++){ ;?>
            <article class="card">
                <a href="">
                    <img src="./app/public/images/site/carriou.jpg" alt="">
                </a>
            </article>
        <?php } ;?>
    </div>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Mes photos de famille" ;?>

<script src="./app/public/js/img-preview.js"></script>

<?php require 'layouts/template.php' ;?>