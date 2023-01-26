<?php

/**
 * Este sera la pagina para ver todas las entradas del blog
 */

get_header(); ?>

<div class="container container-blog">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <!--Aquí el html con las funciones de wordpress-->
            <div class="row row-blog mb-5">
                <div class="col-md-12 col-lg-6 col-xl-6 blog-image">
                    <a href="<?php the_permalink($post->ID); ?>">
                        <img src="<?php the_post_thumbnail_url($post->ID); ?>" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-mb-12 col-lg-6 col-xl-6 blog-content">
                    <div class="content">
                        <a href="<?php the_permalink($post->ID); ?>">
                            <?php the_title(); ?>
                        </a>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-dark">VER MÁS...</a>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>
</div>


<?php get_footer(); ?>