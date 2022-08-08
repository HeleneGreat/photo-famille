<?php ob_start(); ?>


<section id="gallery">
    <h1>Galerie photo</h1>
    <div class="flex justify-around">
        <?php for($i = 0; $i < 20; $i++){ ;?>
            <article class="card">
                <a href="">
                    <img src="./app/public/images/site/carriou.jpg" alt="">
                </a>
            </article>
        <?php } ;?>
    </div>
</section>


<?php $content = ob_get_clean() ;?>
<?php $currentPageTitle = "Galerie photos" ;?>

<?php require 'layouts/template.php' ;?>