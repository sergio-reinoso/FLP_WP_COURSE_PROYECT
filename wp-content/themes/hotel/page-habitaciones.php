<?php
/**
 * Template Name: Page Habitaciones
 */
?>

<?php get_header(); ?>

<!--Function starts-->
<?php get_template_part('public/partials/starts', 'habitaciones') ?>

<!--Prefijo metacampos contenido-->
<?php $key = 'page_habitaciones_'; ?>

<?php

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

//$args, argumentos para el CPT
$args = array(
    'post_type' => 'rooms',
    'posts_per_page' => 6,
    'date' => 'rand',
    'post_status' => 'publish',
    'paged' => $paged
);

$rooms = new WP_Query($args);

?>

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4">
            <?php get_sidebar('blog'); ?>
        </div>

        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 col-rooms">

            <div class="row">

                <?php while ($rooms->have_posts()) : $rooms->the_post(); ?>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-one-room mb-4">
                        <a href="<?php the_permalink(); ?>">
                            <div class="imagen">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">
                                <p class="starts-rooms">
                                    <span class="text-name"><?php echo get_option('blogname'); ?></span>
                                    <br>
                                    <?php start_room($post->ID); ?>
                                </p>
                            </div>
                        </a>
                        <div class="contenido">
                            <a href="<?php the_permalink(); ?>" class="room-title">
                                <span><?php the_title('<h3>', '</h3>'); ?></span>
                            </a>
                            <div class="row row-icons-rooms">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <p>
                                        <span>
                                            <i class="far fa-comment"></i>
                                        </span>&nbsp; 
                                        <?php echo get_post_meta($post->ID, $key . 'numero_opiniones', true); ?> Opiniones
                                    </p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <p>
                                        <span>
                                            <i class="far fa-user"></i>
                                        </span>&nbsp;
                                        <?php echo get_post_meta($post->ID, $key . 'numero_huespedes', true); ?> Huespedes
                                    </p>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <p>
                                        <span>
                                            <i class="fas fa-bed"></i>
                                        </span>&nbsp;
                                        <?php echo get_post_meta($post->ID, $key . 'numbero_superficie', true); ?>M<sup>2</sup>
                                    </p>
                                </div>
                            </div>

                            <?php the_excerpt(); ?>

                            <div class="class-button-page">
                                <a href="#" type="button" class="btn btn-outline-primary">
                                    RESERVAR POR NOCHE <?php echo get_post_meta($post->ID, $key . 'precio_habitacion', true); ?>/noche
                                </a>
                            </div>

                            <div class="row-divider">
                                <div class="divider"></div>
                            </div>

                            <div class="info-rooms">
                                <div class="row">
                                    <div class="col-6 col-sm-6-icons">
                                        <span><i class="fas fa-umbrella-beach"></i></span>
                                        <span><i class="fas fa-glass-martini-alt"></i></span>
                                        <span><i class="fas fa-utensils"></i></span>
                                        <span><i class="fas fa-shower"></i></span>
                                    </div>
                                    <div class="col-6 col-sm-6 text-end boton-mas-info mb-3">
                                        <!--Simbol arrows html-->
                                        <a href="<?php the_permalink($post->ID); ?>">MÁS INFO... &#10148;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>

            </div><!--/row habitaciones-->

            <div class="row paginate-links">
                <div class="col-12 mt-4 gx-0">
                    <?php
                        $paginado = new ATR_CPT;
                        $paginado->atr_pagination_post($rooms);
                    ?>
                </div>

            </div>

        </div><!--/col habitaciones-->

    </div><!--/row-->

</div>

<?php get_footer(); ?>