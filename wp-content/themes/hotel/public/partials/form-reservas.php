<?php

/**
 * Calendario import
 */

$args = [
    'post_type' => 'rooms',
    'posts_per_page' => 6,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];

$tipo = new WP_Query($args);

?>

<div class="info-reserva">
    <h3>
        <span><i class="fas fa-hotel"></i></span>
        <?php echo __('Reserva', 'hotel'); ?>
    </h3>
    <hr>
    <p>
        Rellena el formulario con tu datos de contacto. Acepta nuestra politica de privacidad
        y envia el formulario, nos pondremos en contacto contigo para validar la reserva lo antes
        posible.
    </p>
</div>

<div id="mensajeCalendar"></div>

<div class="form-reservas">
    <form action="" method="post" id="form-reservas">
        <h3 class="mt-4">
            <?php echo __('Elije la habitacion que deseamos reservar', 'hotel') ?> <i class="fas fa-home"></i>
        </h3>
        <hr>
        <div class="row">
            <div class="col-xl-12 mb-3">
                <p>
                    Selecciona la habitacion que deseas reservar y después podras introducir las fechas de la reservas.
                </p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 tipo-reserva styleform">
                <select name="tipo" id="tipo" class="styleform" required>
                    <option value="">Elije tu reserva</option>
                    <?php while ($tipo->have_posts()) : $tipo->the_post(); ?>
                        <?php var_dump($id); ?>
                        <option value="<?php echo $id; ?>"><?php echo get_the_title($post->ID); ?></option>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </select>
            </div>
        </div>
        <h3 class="mt-4">
            2. <?php echo __('Datos de la reserva', 'hotel'); ?> <i class="fas fa-headset"></i>
        </h3>
        <hr>
        <!--Loading animate(spinner)-->
        <div class="text-center row-cargando mt-1 py-4">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div> <br>
            Cargando...
        </div>
        <div class="alert alert-success alert-select-tipo">
            Por favor elije la reserva de la habitacion antes de seleccionar
            la fecha de la reserva.
        </div>
        <div class="row row-datosReserva" style="display: none">
            <div class="col-xl-6 col-lg-6 col-md-6 entrada styleForm date checkIn-date">
                <label for="Entrada"><?php echo __('Check-In : ', 'hotel'); ?></label>
                <input type="text" readonly name="entrada" id="entrada">
                <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 salida styleForm date checkOut-date">
                <label for="Salida"><?php echo __('Check-Out : ', 'hotel'); ?></label>
                <input type="text" readonly name="salida" id="salida">
                <span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
            </div>
        </div>

        <div class="paso3" style="display: none">
            <h3 class="mt-4">
                3. <?php echo __('Añade tu informacion', 'hotel'); ?> <i class="fas fa-user-check"></i>
            </h3>
            <hr>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 nombre styleForm">
                    <label for="nombre"><?php echo __('Nombre: ', 'hotel'); ?></label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 apellido styleForm">
                    <label for="apellido"><?php echo __('Apellido: ', 'hotel'); ?></label>
                    <input type="text" name="apellido" id="apellido" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 email styleForm">
                    <label for="email"><?php echo __('Email: ', 'hotel'); ?></label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 phone styleForm">
                    <label for="telefono"><?php echo __('Teléfono: ', 'hotel'); ?></label>
                    <input type="tel" name="telefono" id="telefono" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 city styleForm">
                    <label for="ciudad"><?php echo __('Ciudad: ', 'hotel'); ?></label>
                    <input type="text" name="ciudad" id="ciudad" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 country styleForm">
                    <label for="pais"><?php echo __('País: ', 'hotel'); ?></label>
                    <input type="text" name="pais" id="pais" required>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 comment styleForm">
                    <label for="comentario"><?php echo __('Comentario : ', 'hotel'); ?></label>
                    <textarea name="comentario" id="comentario" cols="30" placeholder="(opcional)" rows="3" required></textarea>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="privacidad">
                        <label for="checkbox">
                            <input type="checkbox" name="privacidad" id="privacidad" required>
                            <p style="display:inline-block;">
                                He leido y acepto la
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-3">
                                    politica de privacidad
                                </a>
                            </p>
                        </label>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 submit styleForm">
                    <div class="boton-reserva my-3">
                        <button type="submit" class="btn btn-primary" name="reserva" id="reserva" style="min-width:33%">
                            <?php echo __('RESERVAR', 'hotel'); ?>
                        </button>
                    </div>
                    <p class="text-justify mt-3" style="font: size 0.9em;">
                        Responsable del fichero: King Hotel. Finalidad: Contratacion de un alquiler
                        Legitimacion: consentimiento del interesado. Destinatarios: No se cederan datos a
                        terceros, salvo obligacion legal. Derechos: Acceder, rectificar y suprimir los datos,
                        asi como otros derechos, como se explica en la informacion adicional. Informacion
                        adicional: Puede consultar la informacion adicional y detallada sobre Proteccion de
                        Datos en nuestra pagina web.
                    </p>
                    <input type="hidden" name="oculto" value="1">
                    <input type="hidden" name="codigo" value="<?php echo mt_rand(1000, 9999); ?>">
                </div>
            </div>
        </div>
    </form>
</div>

<?php get_template_part('public/partials/modal', 'reservas'); ?>