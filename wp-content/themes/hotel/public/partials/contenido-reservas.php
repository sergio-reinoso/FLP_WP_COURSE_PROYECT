<?php
//prefijo campo CMB2
$key = "template_reservas_";

//campos CMB2
//TITULO
$titulo = get_post_meta(get_the_ID(), $key . 'seccion_text_title', true);

//Imagen
$imagen = get_post_meta(get_the_ID(), $key . 'img_contenido', true);

//Precio
$precio = get_post_meta(get_the_ID(), $key . 'precio_habitacion', true);

//dia de entrada date_i18m('j); devuelve fecha actual
$diaEntrada = date_i18n('j');

//Para obtener el mes actual actualizamos la function date_i18n('f, y');
$mesEntrada = date_i18n('F, Y');

//Dia de la semana
$diaSemana = date_i18n('l');

//Dia salida fecha actual + 1 dia
$diaSalida = date("j", strtotime("+1 day"));

//Mes salida
$mesSalida = date_i18n('F, Y');

?>

<div class="contenido">
    <div class="row">
        <div class="imagen">
            <img src="<?php echo $imagen ?>" alt="" class="img-fluid">
        </div>
    </div>
    <div class="fecha-reserva" id="fecha-reserva">
        <h5><?php echo $titulo; ?></h5>
        <div class="row" style="margin-top:30px;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="check-in" id="check-in">
                    <p class="texto-check"><?php echo __('CHECK-IN', 'hotel') ?></p>
                    <p class="fecha-dia entrada">
                        <?php echo $diaEntrada; ?>
                    </p>
                    <p class="mes">
                        <?php echo $mesEntrada; ?>
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="check-out">
                    <p class="texto-check"><?php echo __('CHECK-OUT', 'hotel'); ?></p>
                    <p class="fecha-dia salida">
                        <?php echo $diaSalida; ?>
                    </p>
                    <p class="mes">
                        <?php echo $mesSalida; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row-precio-total row-precio-total-noche text-center py-3 mt-5">
            <?php echo $precio; ?>
            <span>$/noche</span>
        </div>
        <div class="row-precio-total row-precio-total-total text-center py-3">
            - <span> Total</span>
        </div>
    </div><!--fecha reserva--> 
</div>