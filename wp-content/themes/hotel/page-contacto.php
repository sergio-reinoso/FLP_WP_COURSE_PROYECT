<?php 
/**
 * Template Name: Page Contacto
 */
?>

<?php get_header(); ?>

<div class="container container-contacto my-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
            <div class="texto-cabecera">
                <?php the_content(); ?>
            </div>
            <div class="form-contacto">
                <?php get_template_part('public/partials/form', 'contacto'); ?>
            </div>          
        </div>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
            <div id="sidebar-contacto" class="sidebar">
                <?php dynamic_sidebar( 'contacto' ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>