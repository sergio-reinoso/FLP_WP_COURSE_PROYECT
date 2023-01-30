<?php

class ATR_AjaxReservas{

    public function atr_create_db_reservas(){

        global $wpdb;

        $table = $wpdb->prefix . 'form_reservas';

        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id int(9) NOT NULL AUTO_INCREMENT,
            entrada date NOT NULL,
            salida date NOT NULL,
            tipo int(6) NOT NULL,
            codigo int(5) NOT NULL,
            nombre varchar(255) NOT NULL,
            apellido varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            telefono varchar(50) NOT NULL,
            ciudad varchar(255) NOT NULL,
            pais varchar(255) NOT NULL,
            comentario longtext NOT NULL,
            enviado int(1) NOT NULL,
            totalDias int(2) NOT NULL,
            totalPrecio int(4) NOT NULL,
            urlPago varchar(255) NOT NULL,
            pagado int(1) NOT NULL,
            fechaPago date NOT NULL,
            numPedido varchar(12) NOT NULL,
            PRIMARY KEY(id)
        );";

        $wpdb->query($sql);

    }

    //Obtener tipo ajax
    public function atr_diasDisabled(){

        global $wpdb;

        $tipo = $_POST['tipo'];

        $tabla = $wpdb->prefix . 'form_reservas';

        //CONSULTA
        $registros = $wpdb->get_results("SELECT * FROM $tabla WHERE tipo = $tipo", OBJECT);

        //Aqui seleccionamos la tabla compata y las columnas de fecha de entrada y salida
        $sql = "SELECT * FROM $tabla WHERE tipo IN ($tipo)";

        $fechasEntrada = $wpdb->get_col($sql, 1);
        $fechasSalida = $wpdb->get_col($sql, 2);

        $rangosFechas[] = [
            'entradas'  => $fechasEntrada,
            'salidas'   => $fechasSalida
        ];

        $json = json_encode([
            'tipo'      => $tipo,
            'registros' => $registros,
            'entrada'   => $fechasEntrada,
            'salida'    => $fechasSalida,
            'rangos'    => $rangosFechas
        ]);

        echo $json;

        die();

    }
}

?>