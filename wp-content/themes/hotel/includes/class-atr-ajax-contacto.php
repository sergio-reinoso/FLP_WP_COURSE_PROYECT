<?php 

class ATR_AjaxContacto {

    public function atr_create_db_contacto(){

        global $wpdb;

        $table = $wpdb->prefix . 'form_contacto';

        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id int(11) NOT NULL AUTO_INCREMENT,
            nombre varchar(255) NOT NULL,
            apellido varchar(225) NOT NULL,
            email varchar(255) NOT NULL,
            telefono varchar(255) NOT NULL,
            mensaje longtext NOT NULL,
            PRIMARY KEY (id)
        );";

        $wpdb->query($sql);

    }

    public function atr_form_contacto(){

        global $wpdb;

        extract($_POST, EXTR_OVERWRITE);

        //sanitizando campos
        $nombre     = sanitize_text_field($nombre);
        $apellido   = sanitize_text_field($apellido);
        $email      = sanitize_text_field($email);
        $telefono   = sanitize_text_field($telefono);
        $mensaje    = sanitize_text_field($mensaje);

        if($tipo == 'contacto' && $enviado == 1){

            $columns = [
                'nombre'    => $nombre,
                'apellido'  => $apellido,
                'email'     => $email,
                'telefono'  => $telefono,
                'mensaje'   => $mensaje
            ];

            $table = $wpdb->prefix . 'form_contacto';
            $result = $wpdb->insert($table, $columns);

            $json = json_encode([
                'result'    => $result,
                'nombre'    => $nombre,
                'apellido'  => $apellido,
                'email'     => $email,
                'telefono'  => $telefono,
                'mensaje'   => $mensaje
            ]);

            echo $json;

            wp_die();

        }

    }
}

?>