<?php

/**
 * Template Name: Page Habitaciones
 */
?>

<?php get_header(); ?>

<?php

$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

//$args, argumentos para el CPT
$args = array(
    'post_type' => 'rooms',
    'posts_per_page' => 2,
    'date' => 'rand',
    'post_status' => 'publish',
    'paged' => $paged
);

$rooms = new WP_Query($args);

?>


<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4   ">
            Aqui el widget calendario
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 col-rooms">

            <?php while ($rooms->have_posts()) : $rooms->the_post(); ?>

                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-one-room">
                    <a href="<?php the_permalink(); ?>">
                        <div class="imagen">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="">
                            <p class="starts-rooms">
                                <span class="text-name"><?php echo get_option('blogname'); ?></span>
                                <br>
                                <span class="start"><i class="far fa-star"></i></span>
                                <span class="start"><i class="far fa-star"></i></span>
                                <span class="start"><i class="far fa-star"></i></span>
                                <span class="start"><i class="far fa-star"></i></span>
                                <span class="start"><i class="far fa-star"></i></span>
                            </p>
                        </div>
                    </a>
                    <div class="contenido">
                        <a href="<?php the_permalink(); ?>" class="room-title">
                            <span><?php the_title('<h3>', '</h3>') ?></span>
                        </a>
                        <div class="row-row-icons-rooms">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <p><span><i class="far fa-comment"></i></span>&nbsp;3 opiniones</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <p><span><i class="far fa-user"></i></span>&nbsp;3 opiniones</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <p><span><i class="far fa-bed"></i></span>&nbsp;100M<sup>2</sup></p>
                            </div>
                        </div>
                        <?php the_excerpt(); ?>
                        <div class="class-button-page">
                            <a href="#" type="button" class="btn btn-outline-primary">
                                RESERVAR POR 70$/noche
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
                                <div class="col-6 col-sm-6 text-end botton-mas-info mb-3">
                                    <!--Simbols arrows para html en la esta pagina https://www.htmlsymbols.xyz/unicode/U+27A4-->
                                    <a href="#">MÁS INFO... &#10148;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; wp_reset_postdata(); ?>

            <div class="row paginate-links">
                <?php
                    $paginado = new ATR_CPT;
                    $paginado->atr_pagination_post($rooms);
                ?>
            </div>

        </div> <!-- /COL HABITACIONES -->
    </div><!-- /ROW -->
</div>


<?php get_footer(); ?>