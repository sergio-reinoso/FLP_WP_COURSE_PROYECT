<form action="" method="post">
    <div class="row row-form-contact">
        <div class="col-xl-6 col-lg-6 col-md-6 nombre mb-3">
            <label for="Nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required="">
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 apellido mb-3">
            <label for="Apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" required="">
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-3">
            <label for="Email">Email</label>
            <input type="email" name="email" id="email" required="">
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-3">
            <label for="Telefono">Telefono</label>
            <input type="tel" name="telefono" id="telefono" required="">
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 mb-3">
            <label for="Mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" cols="30" rows="10" required=""></textarea>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 submit">
            <div class="boton-reserva my-3">
                <button type="submit" class="btn btn-primary" name="contacto" id="contacto">
                    ENVIAR AHORA
                </button>
                <input type="hidden" name="enviado" id="enviado" value="1">
            </div>
        </div>
    </div>
</form>