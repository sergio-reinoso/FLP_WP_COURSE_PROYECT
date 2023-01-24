<?php

$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-experiencias.php'
));

//var_dump($pages);
$counter = 1;
?>

<?php foreach($pages as $page ): ?>

<?php

$titleSection = get_post_meta($page->ID, 'template_experiencias_seccion_text', true);
$imagen = get_the_post_thumbnail_url($page->ID, 'full');

?>

<div class="row seccion_0<?php echo $counter; ?>">
    <div class="col-sm-12 col-md-5 texto">
        <div class="title-section mt-4">
            <p class="pb-2"><?php echo $titleSection; ?></p>
        </div>
        <div class="title-page">
            <h2 class="my-2"><?php echo $page->post_title; ?></h2>
        </div>
        <div class="text-page">
            <?php 
                $post = get_post($page->ID);
                the_excerpt();
            ?>
        </div>
        <div class="class-button-page">
            <a href="<?php echo $page->guid; ?>" type="button" class="btn btn-outline-primary">VER MÁS...</a>
        </div>
    </div>
    <div class="col-sm-12 col-md-5 imagen">
        <div class="imagen-section">
            <img src="<?php echo $imagen; ?>" alt="<?php echo $page->post_title; ?>" class="img-fluid">
        </div>
    </div>
</div>


<?php $counter++; endforeach; wp_reset_postdata(); ?>