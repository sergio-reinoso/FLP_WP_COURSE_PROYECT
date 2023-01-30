<?php wp_footer(); ?>

<?php 

$avisoLegal         = esc_url(home_url('/') . 'aviso-legal');
$politicaPrivacidad = esc_url(home_url('/') . 'politica-de-privacidad');

?>

<div class="continer-fluid">
    <div class="footer">
        <div class="col-12 logo-footer">
            <a href="#">
                <?php
                    if ( function_exists( 'the_custom_logo' ) ){
                        the_custom_logo();
                    }
                ?>
            </a>
        </div>
        
        <div class="col-12">
            <div class="title-footer">
                <h4>Redes Sociales</h4>
            </div>
            <div class="iconos-redes-sociales">
            <?php

                $args = [
                    'theme_location' => 'menu_redes_sociales',
                    'menu_class' => 'menu-sociales'
                ];
                wp_nav_menu( $args );

            ?>
            </div>
        </div>

        <div class="col-12 text-footer">
            <p>
                Pruebas @ <?php echo date_i18n( 'Y' ); ?>
            </p>
        </div>
        
        <div class="col-12" style="background-color: #323232;">
            <div class="aviso-y-politica py-3" style="text-align: center;">
                <a href="<?php echo $avisoLegal; ?>">Aviso Legal</a>&nbsp;
                <span><a href="<?php echo $politicaPrivacidad ?>">Politica de privacidad</a></span>
            </div>
        </div>
    </div>
</div>

</body>
</html>