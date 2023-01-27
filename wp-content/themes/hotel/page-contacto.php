<?php 
/**
 * Template Name: Page Contacto
 */
?>

<?php 

$key ="template_contacto_";

//obtener map de inicio
$titulo = get_post_meta(get_the_ID(), $key . 'seccion_text_title', true);
$map = get_post_meta(get_the_ID(), 'map_location', true);

$map = (($map != NULL) ? $map : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.0000000000005!2d1.1166666666666667!3d41.11666666666667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2f2b5b5b5b5%3A0x5b5b5b5b5b5b5b5b!2sTarragona!5e0!3m2!1ses!2ses!4v1583333333333!5m2!1ses!2ses');
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
            <h3 class="my-3"><?php echo $titulo; ?></h3>
            <div class="map">
                <iframe src="<?php echo $map; ?>" style="border:0" allowfullscreen="" loading="lazy"></iframe>
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