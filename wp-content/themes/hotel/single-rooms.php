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

//Variables de contenido
$key_content    = 'page_habitaciones';
$opiniones      = get_post_meta(get_the_ID(), $key_content . 'numero_opiniones', true);
$huespedes      = get_post_meta(get_the_ID(), $key_content . 'numero_huespedes', true);
$superficie     = get_post_meta(get_the_ID(), $key_content . 'superficie', true);
$precio         = get_post_meta(get_the_ID(), $key_content . 'precio', true);
?>

<div class="container container-rooms">
    <div class="row mt-5">
        <div class="titulo">
            <h3><?php get_the_title(); ?></h3>
        </div>
        <div class="calificacion">
            <span>Calificacion: </span><?php start_room($post->ID); ?>
        </div>
    </div>
    <div class="row -mt-4">
        <div class="col-sm-12 col-md-8 col-lg-8">
            <div class="imagen">
                <a data-fancybox="gallery1" href="<?php echo get_the_post_thumbnail_url($post->ID); ?>" data-caption="Caption image">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="" class="img-fluid" style="width: 100%" >
                </a>
            </div>
            <!--Linea divider-->
            <div class="row-divider">
                <div class="divider">

                </div>
            </div>
            <!--Imagenes de la habitacion-->
            <div class="row" id="image-single-rooms" style="margin:0px">
                <?php foreach($imagenes as $imagen): ?>
                <!--Mostramos imagenes y oculatamos el resto-->
                <?php $class_oculto = ($contador > 4 ? 'display: none': '' ); ?>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 galeryCount-<?php echo $contador; ?>" style="padding: 3px; <?php echo $class_oculto; ?>">
                    <div class="imagen-gallery">
                        <a data-fancybox="gallery1" href="<?php echo $imagen; ?>" data-caption="Caption image">
                            <img src="<?php echo $imagen; ?>" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
                <?php $contador++; endforeach; ?>
            </div>

            <!--linea divider-->
            <div class="row-divider">
                <div class="divider">
                    
                </div>
            </div>
            <!--Aqui iconos info room-->
            <div class="row row-icons-info">
                <div class="col-6 col-sm-6 col-md-3 text-center">
                    <p class="icon-info"><i class="far fa-comment"></i>
                    <p><?php echo $opiniones; ?> Opiniones</p>
                </p>
                </div>
                <div class="col-6 col-sm-6 col-md-3 text-center">
                    <p class="icon-info">
                        <i class="far fa-user-circle"></i>
                    </p>
                    <p><?php echo $huespedes; ?> Huéspedes</p>
                </div>
                <div class="col-6 col-sm-6 col-md-3 text-center">
                    <p class="icon-info"><i class="fas fa-bed"></i></p>
                    <p><?php echo $precio; ?>$/Noche</p>
                </div>
                <div class="col-6 col-sm-6 col-md-3 text-center">
                    <p class="icon-info"><i class="fas fa-moon"></i></p>
                    <p><?php echo $precio; ?>$/Noche</p>
                </div>
            </div>
            <!--linea divider-->
            <div class="row-divider">
                <div class="divider"></div>
            </div>
            <div class="contenido">
                <?php the_content(); ?>
            </div>
        </div>
        <!--sidebar-->
        <div class="col-sm-12 col-md-4 col-lg-4">
            <?php get_sidebar('blog'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>