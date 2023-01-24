<?php 

class ATR_AjaxNewsletter{

    public function atr_create_db_newsletter(){

        global $wpdb;

        $table = $wpdb->prefix . 'newsletter';
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id int(9) NOT NULL AUTO_INCREMENT,
            fecha date NOT NULL,
            email varchar(150) NOT NULL,
            PRIMARY KEY(id)
        )";

        $wpdb->query($sql);

    }

    public function atr_newsletter(){
        
        global $wpdb;

        extract( $_POST, EXTR_OVERWRITE );

        if( $tipo == 'email_ajax' && $enviado == 1 ){

            $columns = [
                'fecha' => $date,
                'email' => $email
            ];

            $table = $wpdb->prefix . 'newsletter';
            $result = $wpdb->insert( $table, $columns );

            $json = json_encode([
                'result'    => $result,
                'fecha'     => $date,
                'email'     => $email
            ]);

        }

        echo $json;

        wp_die();
    }
}

?>