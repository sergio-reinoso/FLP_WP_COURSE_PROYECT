<?php

/**
 * Template Name: Page Servicios
 */
?>

<?php get_header(); ?>

<?php

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

$args = [
    'post_type'         => 'services',
    'posts_per_page'    => 4,
    'date'              => 'rand',
    'post_status'       => 'publish',
    'paged'             => $paged
];

$services = new WP_Query($args);

?>

<?php $key = 'template_servicios_' ?>

<div class="container container-servicios my-5">
    <?php while ($services->have_posts()) : $services->the_post(); ?>

        <?php
        //variables
        $tax        = get_the_terms(get_the_ID(), 'tipo-servicio');
        $url_page   = get_post_meta($post->ID, $key . 'url_page', true);
        $ubicacion  = get_post_meta($post->ID, $key . 'ubicacion', true);
        // var_dump($tax);
        ?>
        <div class="row mb-4">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="imagen">
                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="contenido">
                    <span><?php the_title('<h3>', '</h3>'); ?></span>
                    <?php the_excerpt(); ?>
                    <p><b>Tipo de Servicio:</b> <?php echo $tax[0]->name; ?></p>
                </div>
                <div class="botones-servicios">
                    <a href="<?php echo $url_page; ?>" target="_blank" class="btn btn-dark">VER SITIO WEB</a>
                    <a href="<?php echo $ubicacion; ?>" target="_blank" class="btn btn-dark">VER UBICACIÓN</a>
                </div>
            </div>
        </div>

    <?php endwhile;
    wp_reset_postdata(); ?>

    <div class="row paginate-links">
        <div class="col-12 mt-4 gx-0">
            <?php
                $paginado = new ATR_CPT;
                $paginado->atr_pagination_post($services);
            ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>