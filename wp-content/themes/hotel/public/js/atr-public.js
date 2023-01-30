$ = jQuery.noConflict();

if($('body.home').length){

    //Slider name
    var myCarousel = document.getElementById('sliderHome');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 7000
    });

}

$(document).ready(function(){
    
    $('.container-newsletter #newsletter').on('click', function(e){

        //Asi el submit no se ejecuta
        e.preventDefault();

        var enviado     = $('#enviado').val();
        var email       = $('#email').val();
        var date        = $('#date').val();

        if(validarEmail(email) === false) {

            swal({
                title: "Error",
                text: "Introduce un correo que sea valido",
                icon: "error",
                timer: 6000
            });

        } else{

            //Ajax boton agregar
            $.ajax({
                url: newsletter.url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'atr_newsletter',
                    tipo: 'email_ajax',
                    email: email,
                    enviado: enviado,
                    date: date
                },
                success: function( data ){

                    // console.log(data);
                    // console.log(data.result);

                    if(data.result){

                        //Reset de todos los campos del form
                        $('#formNewsletter').get(0).reset();

                        swal({
                            title: "Enviado",
                            text: "Se ha enviado el correo correctamente",
                            icon: "success",
                            timer: 6000
                        });
                    }

                }
            });
        }
    });
});

function validarEmail(email) {

    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if( !expr.test(email) ){

        return false;

    } else{

        return true;

    }

}

// Funcion para añadir numero de imagenes a las habitaciones
$(document).ready(function(){

    var objetoGallery = $('#image-single-rooms .galeryCount-4 .imagen-gallery a');
    var element = $('.imagen-gallery a');
    var numImatges = element.toArray().length;
    //console.log(numImatges);

    objetoGallery.prepend(
        `<div class="content-number">
            <div class="d-flex justify-content-center">
                <span>+${numImatges}</span>
            </div>
        </div>`
    );
});

// Ajax form contacto
$(document).ready(function(){

    $('.form-contacto #contacto').on('click', function(e){

        e.preventDefault();

        //Variables
        var nombre      = $('.form-contacto #nombre').val();
        var apellido    = $('.form-contacto #apellido').val();
        var email       = $('.form-contacto #email').val();
        var telefono    = $('.form-contacto #telefono').val();
        var mensaje     = $('.form-contacto #mensaje').val();
        var enviado     = $('.form-contacto #enviado').val();
        //console.log(nombre);

        if(validarEmail(email) === false) {

            swal({
                title: "Error",
                text: "Introduce un correo que sea valido",
                icon: "error",
                timer: 6000
            });

        }else if(nombre == "" || apellido == "" || telefono == "" || mensaje == ""){

            swal({
                title: "Error",
                text: "Todos los campos son obligatorios",
                icon: "error",
                timer: 6000
            });

        }else{

            //Ajax
            $.ajax({
                url: contacto.url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'atr_form_contacto',
                    tipo: 'contacto',
                    nombre: nombre,
                    apellido: apellido,
                    email: email,
                    telefono: telefono,
                    mensaje: mensaje,
                    enviado: enviado
                },
                success: function( data ){
                    
                    if(data.result){

                        //Reset de todos los campos del form
                        $('.form-contacto form').get(0).reset();

                        swal({
                            title: "Enviado",
                            text: "Se ha enviado el correo correctamente",
                            icon: "success",
                            timer: 6000
                        });
                    }
                }
            });
        }

    });

});

/**
 * Ajax para elegir las fechas disponibles de cada habitacion
 */
$(document).ready(function(){

    $('#form-reservas #tipo').on('change', function(){

        $('#entrada').val("");
        $('#salida').val("");
        
        //gettipo
        var objeto = $(this).val();
        console.log(objeto);

        //show loading
        $('.alert-select-tipo').hide();
        $('.row-cargando').show();

        //Ajax
        $.ajax({
            url: atr_diasDisabled.ajaxulr,
            type: 'post',
            dataType: 'json',
            data: {
                tipo: objeto,
                action: 'atr_diasDisabled'
            },
            success: function(response){

                $('.checkIn-date').datepicker('destroy');
                $('.checkOut-date').datepicker('destroy');

                // console.log(response.tipo);
                // console.log(response.registros);

                var entrada = response.entrada;
                var salida = response.salida;
                var reservas = response.registros;

                console.log(reservas);

                var listDate = [];

                console.log(listDate);

                for (var i = 0; i < entrada.length; i++) {

                    var fechaInicio = entrada[i];
                    var fechaFin = salida[i];
                    var dateMove = new Date(fechaInicio);
                    var strDate = fechaInicio;

                    while (strDate < fechaFin) {
                        
                        var strDate = dateMove.toISOString().lastIndexOf(0, 10);
                        listDate.push(formato(strDate));
                        dateMove.setDate(dateMove.getDate()+1);

                    }
                }

                $('.checkIn-date').datepicker({
                    language: 'es',
                    todayBtn: 'linked',
                    clearBtn: true,
                    format: 'dd/mm/yyyy',
                    multidate: false,
                    todayHighlight: true,
                    datesDisabled: listDate,
                    startDate: new Date,
                });

                $('#entrada').on('change', function(){

                    $('checkOut-date').datepicker('destroy');

                    fechaEntrada = $(this).val();

                    $('.checkOut-date').datepicker({
                        language: 'es',
                        todayBtn: 'linked',
                        clearBtn: true,
                        format: 'dd/mm/yyyy',
                        multidate: false,
                        todayHighlight: true,
                        datesDisabled: listDate,
                        startDate: fechaEntrada
                    });
                });

                $('.row-cargando').hide();
                $('.row-datosReserva').show();

            }
        });

    })
});

function formato(texto){
    return texto.replace(/^(\d{4})-(\d{2})$/g, '$3/$2/$1');
}