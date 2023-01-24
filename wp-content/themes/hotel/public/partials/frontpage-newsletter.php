<div class="container container-newsletter my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-text">
            <h2>REGISTRARSE PARA RECIBIR UN BOLETIN</h2>
            <p>
                ¡No te pierdas las ofertas especiales y novedosas del Hotel!
            </p>
        </div>
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 form-email my-4">
            <form action="" method="post" id="formNewsletter">
                <input type="hidden" name="enviado" id="enviado" value="1">
                <input type="hidden" name="date" id="date" value="<?php echo date('y-m-d'); ?>">
                <div class="input-group mb-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Dejanos tu email" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-secondary" type="submit" id="newsletter">
                        <span><i class="fas fa-paper-plane"></i></span>
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>