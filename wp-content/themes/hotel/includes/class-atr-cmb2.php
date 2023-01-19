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

    }

}