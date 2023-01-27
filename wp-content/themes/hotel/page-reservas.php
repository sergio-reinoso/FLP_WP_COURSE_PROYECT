<?php

/**
 * Template Name: Page Reservas
 */
?>

<?php get_header(); ?>

<div class="container container-reserva">
    <div class="row row-reservas my-4">
        <div class="col-xl-4 col-lg-4 col-md-4 order-1 col-contenido-reservas">
            <?php get_template_part('public/partials/contenido', 'reservas'); ?>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 order-2 col-form-reservas">
            <?php //get_template_part('public/partials/form', 'reservas'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>