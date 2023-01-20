<?php get_header(); ?>

<?php get_template_part('public/partials/frontpage', 'carrousel'); ?>

<div class="container container-text-bienvenida">
    <div class="row">
        <div class="col-12 text-center">
            <?php echo wpautop(get_post_meta(get_the_ID(), 'texto_bienvenida', true)); ?>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row row-divider">
        <div class="divider"></div>
    </div>
</div>

<div class="container container-sobre-nosotros py-3">
    <div class="row">
        <div class="col-sm-12 col-md-6 imagen">
            <?php

                $image = wp_get_attachment_image(
                    get_post_meta(get_the_ID(), 'imagen_sobre_nosotros_id', 1),
                    array('300', '300'),
                    "",
                    array('class' => 'img-fluid')
                );

                echo $image;

            ?>
        </div>
        <div class="col-sm-12 col-md-6 texto">
            <?php echo wpautop(get_post_meta(get_the_ID(), 'texto_sobre_nosotros', true)); ?>
        </div>
    </div>
</div>

<div class="container-fluid">
    <?php get_template_part('public/partials/frontpage','galeria'); ?>
</div>

<div class="container-fluid container-experiencias">
    <div class="container">
        <?php get_template_part('public/partials/frontpage','experiencias'); ?>
    </div>
</div>

<?php get_footer(); ?>