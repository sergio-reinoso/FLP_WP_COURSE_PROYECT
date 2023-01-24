<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php bloginfo('name'); ?><?php if (wp_title('', false)) {
                                        echo " | ";
                                    } ?><?php wp_title('') ?>
    </title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!--Favicon .ico-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />


    <!--Etiquetas Movil APP IOS-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="hotel">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.jpg">

    <!--Etiquetas moviles app android-->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#333333">
    <meta name="application-name" content="hotel">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="container-fluid bg-color-container">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php

                    wp_nav_menu(array(
                        'theme_location'    => 'menu_principal',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'navbarNavDropdown',
                        'menu_class'        => 'navbar-nav'
                    ));

                    ?>

                </div>
            </nav>
        </div>
    </div>

    <?php

    if (is_front_page()) {
    } elseif (is_page()) {

        $id_imagen = get_post_thumbnail_id();
        $destacada = wp_get_attachment_image_src($id_imagen, 'header');
        //var_dump($destacada);
        $destacada = $destacada[0];

    ?>

    <div class="container-fluid top-header gx-0">
        <div class="row gx-0">
            <div class="header-top-imagen d-flex flex-column justify-content-center" style="background-image: url(<?php echo $destacada; ?>);">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <?php
        //is_home(), para validar la pagina donde se publican todos los articulos de blog
    } elseif (is_home()) {

        $image = get_option('page_for_posts');
        $id = get_post_thumbnail_id($image);
        $url = wp_get_attachment_image_src($id, 'header');
        $url = $url[0];


    ?>

    <div class="container-fluid top-header gx-0">
        <div class="row gx-0">
            <div class="header-top-imagen d-flex flex-column justify-content-center" style="background-image: url(<?php echo $url; ?>);">
                <?php
                    $args = array(
                        'post_type' => 'page',
                        'name' => 'blog'
                    );

                    $titulo = new WP_Query($args);
                    while ($titulo->have_posts()) : $titulo->the_post();
                ?>

                <h1><?php echo get_the_title($titulo->post->ID); ?></h1>

                <?php endwhile;
                    wp_reset_postdata(); ?>
            </div>
        </div>
    </div>

    <?php
    } elseif(is_single()){

        $image = get_option('page_for_posts');
        $id = get_post_thumbnail_id($image);
        $url = wp_get_attachment_image_src($id, 'header');
        $url = $url[0];

        $entrada = get_post();

    ?>
    <div class="container-fluid top-header gx-0">
        <div class="row gx-0">
            <div class="header-top-imagen d-flex flex-column justify-content-center" style="background-image: url(<?php echo $url; ?>);">
                <h1><?php echo $entrada->post_title; ?></h1>
            </div>
        </div>
    </div>

    <?php
    }
    ?>