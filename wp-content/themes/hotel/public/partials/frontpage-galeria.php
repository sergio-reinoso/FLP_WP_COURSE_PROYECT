<?php

//Array imagenes
$imagenes = get_post_meta(get_the_ID(), 'img_list_galeria', true);
$contador = 0;

//Texto
$texto = wpautop(get_post_meta(get_the_ID(), 'texto_galeria', true));

//URL
$urlReserva = get_post_meta(get_the_ID(), 'url_galeria', true);

?>

<div class="row block-gallery mt-3">
    <?php foreach($imagenes as $imagen): ?>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-imagenes imagen-<?php echo $contador; ?>">
            <div class="zoom">
                <a data-fancybox="gallery1" href="<?php echo $imagen; ?>" data-caption="Imagen Galeria">
                    <img src="<?php echo $imagen; ?>" alt="">
                </a>
            </div>
        </div>
    <?php $contador++; endforeach; ?>
</div>

<div class="row block-gallery-text d-flex justify-content-center">
    <div class="col-sm-12 col-md-8 my-3">
        <div class="texto">
            <?php echo $texto; ?>
        </div>
        <div class="boton-reserva my-3">
            <a href="<?php echo $urlReserva; ?>" class="btn btn-primary" type="button">RESERVAR</a>
        </div>
    </div>
</div>