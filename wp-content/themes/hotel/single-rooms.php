<?php
/**
 * Esta es la pagina de publicacion para una entrada del cpt rooms 
 */
get_header(); ?>

<!--Funcion start-->
<?php get_template_part('public/partials/starts', 'habitaciones'); ?>

<!--Prefijo metacampos contenido-->
<?php $key = 'page_habitaciones_'; ?>

<?php 

//Array imagenes
$imagenes = get_post_meta(get_the_ID(), $key . 'img_list_room', true);
$contador = 1;

?>


<div class="container container-rooms">

</div>

<?php get_footer(); ?>