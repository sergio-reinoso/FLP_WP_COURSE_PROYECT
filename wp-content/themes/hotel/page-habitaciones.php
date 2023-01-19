<?php 
/**
 * Template Name: Page Habitaciones
 */
?>

<?php get_header(); ?>

<?php

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

//$args, argumentos para el CPT
$args = array(
    'post_type' => 'rooms',
    'posts_per_page' => 2,
    'date' => 'rand',
    'post_status' => 'publish',
    'paged' => $paged
);

$rooms = new WP_Query( $args );

?>


<div class="container">
    <?php while ( $rooms->have_posts() ) : $rooms->the_post(); ?>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <a class="rooms-title" href="<?php the_permalink(); ?>">
                    <span><?php the_title('<h3>', '</h3>'); ?></span>
                    <span><?php the_content(); ?></span>
                </a>
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <a class="rooms-content" href="<?php the_permalink(); ?>">
                    
                </a>
            </div>
        </div><!--row-->

    <?php endwhile; wp_reset_postdata(); ?>

    <div class="row paginate-links">
        <?php 
            $paginado = new ATR_CPT;
            $paginado->atr_pagination_post($rooms);
            ?>
    </div>

</div>


<?php get_footer(); ?>
