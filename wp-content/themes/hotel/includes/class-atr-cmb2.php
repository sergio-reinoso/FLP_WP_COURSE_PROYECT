<?php 
/**
 * Required para el archivo init de la libreiria CMB2
*/
require_once ATR_DIR_PATH . '/helpers/cmb2/init.php' ;

class ATR_CMB2{

    //Método para definir las metacajas y metacampos
    public function atr_cmb2_metaboxes() {

        //Iniciando la metacaja
        $cmb = new_cmb2_box( array(
            'id'            => 'test_metabox',
            'title'         => __( 'Test Metabox', 'cmb2' ),
            'object_types'  => array( 'page', ), // Post type
            'show_on'       => array( 'key' => 'id', 'value' => array( 35 )),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        ) );

        //Metacampo para poner una lista de imagenes
        $cmb->add_field(array(
            'name' => 'Imagenes Carrusel',
            'desc' => 'Aqui pondremos las imagenes que utilizaremos para crear el slider',
            'id'   => 'img_list_carrousel',
            'type' => 'file_list',
            'preview_size'      => array( 100, 100 ), // Default: array( 50, 50 )
            'query_args'        => array( 'type' => 'image' ), // Only images attachment
            'text' => array(
                'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
                'remove_image_text'     => 'Replacement', // default: "Remove Image"
                'file_text'             => 'Replacement', // default: "File:"
                'file_download_text'    => 'Replacement', // default: "Download"
                'remove_text'           => 'Replacement', // default: "Remove"
            ),
        ));

        //Metacampo texto de bienvenida
        $cmb->add_field(array(
            'name'    => 'Texto de bienvenida',
            'desc'    => 'Aqui escribiremos un texto de bienvenida para los visitantes',
            'id'      => 'texto_bienvenida',
            'type'    => 'wysiwyg',
            'options' => array(),
        ));

        //Metacampo imagen sobre nosotros
        $cmb->add_field(array(
            'name'    => 'Imagen sobre nosotros',
            'desc'    => 'Aqui subiremos la imagen del bloque sobre nosotros',
            'id'      => 'imagen_sobre_nosotros',
            'type'    => 'file',
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'Añadir imagen'
            ),
            'query_args' => array(
                'type' => array(
                	'image/gif',
                	'image/jpeg',
                	'image/png',
                ),
            ),
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ));

        $cmb->add_field(array(
            'name'    => 'Texto sobre nosotros',
            'desc'    => 'Aqui escribiremos el texto del bloque sobre nosotros',
            'id'      => 'texto_sobre_nosotros',
            'type'    => 'wysiwyg',
            'options' => array(),
        ));

        //Metacampo para poner una lista de imagenes bloque de Galeria
        $cmb->add_field(array(
            'name' => 'Imagenes Galeria',
            'desc' => 'Aqui pondremos 8 imagenes cada una de 1200 x 800 pixeles',
            'id'   => 'img_list_galeria',
            'type' => 'file_list',
            'preview_size'      => array(100, 100), // Default: array( 50, 50 )
            'query_args'        => array('type' => 'image'), // Only images attachment
            'text' => array(
                'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
                'remove_image_text'     => 'Replacement', // default: "Remove Image"
                'file_text'             => 'Replacement', // default: "File:"
                'file_download_text'    => 'Replacement', // default: "Download"
                'remove_text'           => 'Replacement', // default: "Remove"
            ),
        ));

        //Metacampo texto para el bloque de Galeria
        $cmb->add_field( array(
            'name' => 'Texto de Galeria',
            'desc' => 'Aqui escribiremos un texto llamativo para reservar',
            'id'  => 'texto_galeria',
            'type' => 'wysiwyg',
            'options' => array(),
        ));

        //Metacampo text url bloquear Galeria
        $cmb->add_field( array(
            'name' => __('url de la pagina de Reservas', 'cmb2'),
            'id'  => 'url_galeria',
            'type' => 'text_url',
            'protocols' => array('http', 'https'), // Array of allowed protocols
        ));

        //Metacampo imagen bloque parallax
        $cmb->add_field(array(
            'name'    => 'Imagen bloque parallax',
            'desc'    => 'Aqui subiremos la imagen del bloque parallax',
            'id'      => 'img_frontpage_parallax_id',
            'type'    => 'file',
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'text'    => array(
                'add_upload_file_text' => 'Añadir imagen'
            ),
            'query_args' => array(
                'type' => array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ),
            ),
            'preview_size' => 'medium', // Image size to use when previewing in the admin.
        ));

        //Metacampo texto bloque parallax
        $cmb->add_field(array(
            'name'    => 'Texto bloque parallax',
            'desc'    => 'Aqui escribiremos el texto del bloque parallax',
            'id'      => 'texto_bloque_parallax',
            'type'    => 'wysiwyg',
            'options' => array(),
        ));
        $cmb->add_field(array(
            'name'    => __('url de la pagina de Reservas', 'cmb2'),
            'id'      => 'url_reserva_parallax',
            'type'    => 'text_url',
            'protocols' => array( 'http', 'https' )
        ));

        //Metacampo titulo bloque ubicacion
        $cmb->add_field(array(
            'name'    => 'Titulo bloque ubicacion',
            'desc'    => 'Aqui escribiremos el titulo del bloque ubicacion',
            'id'      => 'title_block_location',
            'type'    => 'text'
        ));

        //Metacampo texto bloque direccion
        $cmb->add_field(array(
            'name'    => 'Texto direccion del sitio',
            'desc'    => 'Agrege aquí la direccion. numero de calle, nombre y ciudad',
            'id'      => 'direction_block_location',
            'type'    => 'text',
        ));

        //Metacampo texto bloque telefono
        $cmb->add_field(array(
            'name'    => 'Telefono de contacto',
            'desc'    => 'Aqui pondremos el telefono de contacto',
            'id'      => 'tel_block_location',
            'type'    => 'text',
        ));

        //Metacampo texto bloque email
        $cmb->add_field(array(
            'name'    => 'Email de contacto',
            'id'      => 'email_block_location',
            'type'    => 'text_email',
        ));

        //Metacampo text url bloque ubicacion
        $cmb->add_field(array(
            'name' => __('URL iframe', 'cmb2'),
            'desc' => 'Aqui pondremos la url del iframe de google maps',
            'id'  => 'url_iframe_block_location',
            'type' => 'text_url',
            'protocols' => array('http', 'https') // Array of allowed protocols
        ));

    }

    public function atr_cmb2_metaboxes_experiencias(){

        $prefix = "template_experiencias_";
        $cmb = new_cmb2_box( array(
            'id' => $prefix . 'metabox',
            'title' => __( 'Ajustes de Pagina', 'cmb2' ),
            'object_types' => array( 'page', ), // Post type
            'show_on' => array( 'key' => 'page-template', 'value' => 'page-experiencias.php'),
            'context' => 'normal',
            'priority' => 'high',
            'show_names' => true, // Show field names on the left
        ));

        $cmb->add_field( array(
            'name'      => 'Nombre de la seccion',
            'desc'      => 'Aqui agregaremos el nombre de la seccion que tendra la página',
            'default'   => '',
            'id'        => $prefix . 'seccion_text',
            'type'      => 'text'
        ));
    }

    public function atr_cmb2_metaboxes_habitaciones(){

        $cmb = new_cmb2_box( array(
            'id'            => 'all_rooms_box',
            'title'         => __('Ajustes para habitaciones', 'cmb2'),
            'object_types'  => array('rooms'),
            'priority'      => 'high',
            'show_names'    => true
        ));

        $cmb->add_field( array(
            'name'      => 'Calificacion',
            'desc'      => 'Aqui seleccionaremos un numero del 1 al 5 para puntuar las habitaciones',
            'id'        => 'rooms_calificacion',
            'type'      => 'select',
            'show_option_name' => true,
            'default'   => 'custom',
            'options_cb' => 'start_select_options'
        ));

        function start_select_options(){
            //return a standard array of options
            return array(
                'custom' => __('Selecciona tu calificacion', 'hotel'),
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5
            );
        }

        //Campos contenido de habitaciones
        $prefix = 'page_habitaciones_';

        $cmb->add_field(array(
            'name' => 'Numero de Opiniones',
            'desc' => 'Ponga el numero de opiniones que desea mostrar',
            'id'   => $prefix . 'numero_opiniones',
            'type' => 'text',
            'attributes' => array(
                'type' => 'number',
                'pattern' => '\d*',
            ),
            'sanitization_cb' => 'absint',
            'escape_cb'       => 'absint',
        ));
        $cmb->add_field(array(
            'name' => 'Numero de huespedes',
            'desc' => 'Ponga el numero de huespedes que se pueden alojar en la habitacion',
            'id'   => $prefix . 'numero_huespedes',
            'type' => 'text',
            'attributes' => array(
                'type' => 'number',
                'pattern' => '\d*',
            ),
            'sanitization_cb' => 'absint',
            'escape_cb'       => 'absint',
        ));
        $cmb->add_field(array(
            'name' => 'Superficie de la habitacion',
            'desc' => 'Ponga aquí el tamaño de la habitación, ejemplo: 80, este numero se mostrara en metros cuadrados',
            'id'   => $prefix . 'numbero_superficie',
            'type' => 'text',
            'attributes' => array(
                'type' => 'number',
                'pattern' => '\d*',
            ),
            'sanitization_cb' => 'absint',
            'escape_cb'       => 'absint',
        ));

        $cmb->add_field(array(
            'name'  => 'Precio de la habitacion',
            'desc'  => 'Agrege aquí el precio de la habitacion',
            'id'    => $prefix . 'precio_habitacion',
            'type'  => 'text_money',
            'before_field' => '$', // Replaces default '$'
        ));

        //Metacampo para poner una lista de imagenes
        $cmb->add_field(array(
            'name'          => 'Imagenes de la habitacion',
            'desc'          => 'Aquí agregaremos las imagenes de la habitacion',
            'id'            => $prefix . 'img_list_room',
            'type'          => 'file_list',
            'preview_size'  => array(100, 100), //Array por Default
            'query_args'    => array( 'type' => 'image' ), //Only image attachments
            'text'          => array(
                'add_upload_files_text'     => 'Replacement',
                'remove_image_text'         => 'Replacement',
                'file_text'                 => 'Replacement',
                'file_download_text'        => 'Replacement',
                'remove_text'               => 'Replacement',
            )
        ));
    }

    public function atr_cmb2_servicios(){

        $prefix = "template_servicios_";

        $cmb = new_cmb2_box( array(
            'id'            => $prefix . 'all_services',
            'title'         => __( 'Ajustes para servicios', 'cmb2' ),
            'object_types'  => array( 'services', ), // Post type
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        ));

        $cmb->add_field(array(
            'name'    => __('url de la pagina', 'cmb2'),
            'id'      => $prefix . 'url_page',
            'type'    => 'text_url',
            'protocols' => array('http', 'https')
        ));

        $cmb->add_field(array(
            'name'    => __('url de la ubicacion del sitio', 'cmb2'),
            'id'      => $prefix . 'url_ubicacion',
            'type'    => 'text_url',
            'protocols' => array('http', 'https')
        )); 
        
        
    }

    public function atr_cmb2_contacto(){

        $prefix = "template_contacto_";

        $cmb = new_cmb2_box(array(
            'id'            => $prefix . 'page_contacto',
            'title'         => __('Ajustes para el mapa', 'cmb2'),
            'object_types'  => array('page'), // Post type
            'show_on'       => array('key' => 'page-template', 'value' => 'page-contacto.php'),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        ));

        $cmb->add_field(array(
            'name'    => 'Titulo del encabezado para el mapa',
            'desc'    => 'Agrega el titulo del encabezado para el mapa',
            'default' => 'Encuentranos',
            'id'      => $prefix . 'seccion_text_title',
            'type'    => 'text',
        ));

        $cmb->add_field(array(
            'name'    => __('URL iframe', 'cmb2'),
            'desc'    => 'URL del iframe de google maps',
            'id'      => $prefix . 'map_location',
            'type'    => 'text_url',
            'protocols' => array('http', 'https')
        )); 

    }

    public function atr_cmb2_reservas(){

        $prefix = "template_reservas_";
        $cmb = new_cmb2_box(array(
            'id'            => $prefix . 'page_reservas',
            'title'         => __('Ajustes para la pagina de reservas', 'cmb2'),
            'object_types'  => array('page'), // Post type
            'show_on'       => array('key' => 'page-template', 'value' => 'page-reservas.php'),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        ));

        //Metacampo titulo
        $cmb->add_field(array(
            'name'      => 'Titulo del encabezado para el contenido',
            'desc'      => 'Agrega el titulo seccion de contenido',
            'default'   => '',
            'id'        => $prefix . 'seccion_text_title',
            'type'      => 'text',
        ));

        //Metacampo imagen
        $cmb->add_field(array(
            'name'  => 'Imagen bloque contenido reservas',
            'desc'  => 'Imagen del bloque de contenido de reservas',
            'id'    => $prefix . 'img_contenido',
            'type'  => 'file',
            'options' => array(
                'url' => false, // Texto del input que se muestra en el URL
            ),
            'text' => array(
                'add_upload_file_text' => 'Añadir imagen'
            ),
            'query_args' => array(
                'type' => array(
                    'image/gif',
                    'image/jpeg',
                    'image/png',
                ),
            ),
            'preview_size' => 'medium', // Tamaño de la imagen que se muestra en el admin
        ));


        //Metacampo habitacion
        $cmb->add_field(array(
            'name'          => 'Precio habitacion',
            'desc'          => 'Agrega el precio de la habitacion',
            'id'            => $prefix . 'precio_habitacion',
            'type'          => 'text_money',
            'before_field'  => '$', // Replaces default '$'
        ));
    }
}
