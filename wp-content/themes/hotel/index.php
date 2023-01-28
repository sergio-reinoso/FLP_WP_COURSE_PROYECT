<?php
//Este sera la vista para la pagina sencilla
get_header();?>

<div class="container">
    <div class="row my-4">
        <div class="col-sm-12 col-md-8 col-lg-8">
            <div class="titulo">
                <h3><?php echo get_the_title(); ?></h3>
            </div>
            <div class="contenido">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

