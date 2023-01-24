<?php 
//id front-page
$page_id = get_the_ID();
// var_dump($page_id);

//url imagen
$imagen = get_post_meta( $page_id, 'img_frontpage_parallax_id', true);

//texto
$texto = wpautop(get_post_meta($page_id, 'texto_bloque_parallax', true));

//URL
$urlReserva = get_post_meta($page_id, 'url_reserva_parallax', true);
 
?>

<div class="container-fluid container-parallax gx-0" style="background-image: url(<?php echo $imagen; ?>);">
    <div class="container">
        <div class="row gx-0 px-4">
            <div class="col-12 col-sm-12 col-md-8 col-parallax">
                <div class="texto">
                    <?php echo $texto; ?>
                </div>
                <div class="boton-reserva my-3">
                    <a href="<?php echo $urlReserva; ?>" type="button" class="btn btn-primary">RESERVAR</a>
                </div>
            </div>
        </div>
    </div>
</div>