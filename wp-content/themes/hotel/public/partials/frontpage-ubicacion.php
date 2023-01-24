<?php

$titulo     = get_post_meta(get_the_ID(), 'title_block_location', true);
$titulo     = (($titulo != NULL) ? : 'UBICACIÓN');
$ubicacion  = get_post_meta( get_the_ID(), 'direction_block_location', true);
$telefono   = get_post_meta( get_the_ID(), 'tel_block_location', true );
$email      = get_post_meta( get_the_ID(), 'email_block_location', true);
$map        = get_post_meta( get_the_ID(), 'url_iframe_map_block_location', true);
$map        = (($map != NULL) ? $map : 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.0000000000005!2d1.1166666666666667!3d41.11666666666667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2f2b5b5b5b5%3A0x5b5b5b5b5b5b5b5b!2sTarragona!5e0!3m2!1ses!2ses!4v1583333333333!5m2!1ses!2ses');

?>

<div class="container-fluid container-ubicacion" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-12 col-sm-12 col-md-4 col-ubicacion">
                <h2 class="mb-4"><?php echo $titulo; ?></h2>
                <P>
                    <span style="font-size:20px"><i class="fas fa-map-marker-alt"></i></span>
                    <?php echo $ubicacion; ?>
                </P>
                <P>
                    <span style="font-size:20px"><i class="fas fa-phone"></i></span>
                    <?php echo $telefono; ?>
                </P>
                <P>
                    <span style="font-size:20px"><i class="fas fa-map-marker-alt"></i></span>
                    <?php echo $email; ?>
                </P>
            </div>
            <div class="col-12 col-sm-12 col-md-8">
                <div class="map">
                    <iframe src="<?php echo $map; ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>