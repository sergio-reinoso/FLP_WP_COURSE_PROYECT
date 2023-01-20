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

    }

}