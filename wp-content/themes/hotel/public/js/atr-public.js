$ = jQuery.noConflict();

//Slider name
var myCarrousel = document.querySelector('#sliderHome');
var carrouser = new bootstrap.Carousel(myCarrousel, {
    interval: 7000
});

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
                        })
                    }

                }
            })
        }
    })
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
                    email: email,
                    telefono: telefono,
                    mensaje: mensaje,
                    enviado: enviado
                },
                success: function( data ){

                    console.log(data);
                    console.log(data.result);

                    if(data.result){

                        //Reset de todos los campos del form
                        $('.form-contacto form').get(0).reset();

                        swal({
                            title: "Enviado",
                            text: "Se ha enviado el correo correctamente",
                            icon: "success",
                            timer: 6000
                        })
                    }
                }
            });
        }

    });

});