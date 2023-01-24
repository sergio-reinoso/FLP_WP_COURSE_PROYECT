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