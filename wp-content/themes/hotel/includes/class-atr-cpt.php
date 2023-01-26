<?php 
/**
 * Este sera el archivo donde gestionaremos los 
 * Custom Post Type de wordpress
 */

class ATR_CPT{

    public function atr_cpt_habitaciones() {



        // Etiquetas para el Post Type
        $labels = array(
            'name'                => _x( 'habitaciones', 'Post Type General Name', 'hotel' ),
            'singular_name'       => _x( 'habitación', 'Post Type Singular Name', 'hotel' ),
            'menu_name'           => __( 'habitaciones', 'hotel' ),
            'parent_item_colon'   => __( 'Menu Padre', 'hotel' ),
            'all_items'           => __( 'Todas las habitaciones', 'hotel' ),
            'view_item'           => __( 'Ver Menu', 'hotel' ),
            'add_new_item'        => __( 'Agregar Nueva habitación', 'hotel' ),
            'add_new'             => __( 'Agregar Nueva habitación', 'hotel' ),
            'edit_item'           => __( 'Editar habitación', 'hotel' ),
            'update_item'         => __( 'Actualizar habitación', 'hotel' ),
            'search_items'        => __( 'Buscar habitación', 'hotel' ),
            'not_found'           => __( 'No encontrado', 'hotel' ),
            'not_found_in_trash'  => __( 'No encontrado en la papelera', 'hotel' ),
        );

        // Otras opciones para el post type

        $args = array(
            'label'               => __( 'habitaciones', 'hotel' ),
            'description'         => __( 'habitación news and reviews', 'hotel' ),
            'labels'              => $labels,
            // Todo lo que soporta este post type
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            /* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
            * Uno sin hierarchical es como los posts
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-building',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            //Habilitando la wp rest appi
            'show_in_rest'          => true,
            'rest_base'             => 'habitaciones-appi',
            'rest_controller_class' => 'WP_REST_Posts_Controller',

        );

        //Por último registramos el post type
        register_post_type( 'rooms', $args );

        flush_rewrite_rules();

    }

    public function atr_pagination_post($data){

        
        //paginación para el custom post type
        $big = 9999999;

        $args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var( 'paged' )),//toma el valor 1 de la consulta 'paged'
            'show_all'           => false,
            'end_size'           => 1,
            'mid_size'           => 2,
            'prev_next'          => true,
            'prev_text'          => __('« Previous', 'atr-opt'),
            'next_text'          => __('Next »', 'atr-opt'),
            'type'               => 'plain',
            'add_args'           => false,
            'add_fragment'       => '',
            'before_page_number' => '',
            'after_page_number'  => '',
            'total' => $data->max_num_pages
        );

            echo paginate_links($args);

    }

    public function atr_taxonomia_habitaciones(){

        $post_types = [ 'rooms' ];

        $labels = array(
            'name'              => _x( 'Tipo de Habitación', 'taxonomy general name', 'hotel' ),
            'singular_name'     => _x( 'Tipo de Habitación', 'taxonomy singular name', 'hotel' ),
            'search_items'      => __( 'Buscar Tipo de Habitación', 'hotel' ),
            'all_items'         => __( 'Todos los Tipo de Habitaciones', 'hotel' ),
            'parent_item'       => __( 'Tipo de Habitación Padre', 'hotel' ),
            'parent_item_colon' => __( 'Tipo de Habitación Padre:', 'hotel' ),
            'edit_item'         => __( 'Editar Tipo de Habitación', 'hotel' ),
            'update_item'       => __( 'Actualizar Tipo de Habitación', 'hotel' ),
            'add_new_item'      => __( 'Agregar Nuevo Tipo de Habitación', 'hotel' ),
            'new_item_name'     => __( 'Nuevo Tipo de Habitación', 'hotel' ),
            'menu_name'         => __( 'Tipo de Habitación', 'hotel' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite' => array( 'slug' => 'tipo-habitacion' ),
            //Campos api rest
            'show_in_rest'          => true,
            'rest_base'             => 'tipo-habitacion',
            'rest_controller_class' => 'WP_REST_Terms_Controller',

        );

        register_taxonomy( 'tipo-habitacion', $post_types, $args );


    }

    public function atr_metadatos_cpt(){

        //add_post_meta( 140, 'mimetadato', 'un valor cualquiera');
        delete_post_meta( 140, 'mimetadato' );

        add_post_meta( 140, 'colores', 'azul', true);
        add_post_meta( 140, 'colores', 'verde', true);

        //delete_post_meta( 140, 'colores' );

        update_post_meta(140, 'colores', 'marron', 'azul');

    }

    public function atr_cpt_servicios(){

        // Etiquetas para el Post Type
        $labels = array(
            'name'                => _x('Servicios', 'Post Type General Name', 'hotel'),
            'singular_name'       => _x('Servicio', 'Post Type Singular Name', 'hotel'),
            'menu_name'           => __('Servicios', 'hotel'),
            'parent_item_colon'   => __('Menu Padre', 'hotel'),
            'all_items'           => __('Todos los Servicios', 'hotel'),
            'view_item'           => __('Ver Menu', 'hotel'),
            'add_new_item'        => __('Agregar Nuevo servicio', 'hotel'),
            'add_new'             => __('Agregar Nuevo servicio', 'hotel'),
            'edit_item'           => __('Editar servicio', 'hotel'),
            'update_item'         => __('Actualizar servicio', 'hotel'),
            'search_items'        => __('Buscar servicio', 'hotel'),
            'not_found'           => __('No encontrado', 'hotel'),
            'not_found_in_trash'  => __('No encontrado en la papelera', 'hotel'),
        );

        // Otras opciones para el post type

        $args = array(
            'label'               => __('Servicios', 'hotel'),
            'description'         => __('servicio news and reviews', 'hotel'),
            'labels'              => $labels,
            // Todo lo que soporta este post type
            'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
            /* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
            * Uno sin hierarchical es como los posts
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 7,
            'menu_icon'           => 'dashicons-megaphone',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            //Habilitando la wp rest appi
            'show_in_rest'          => true,
            'rest_base'             => 'servicios-appi',
            'rest_controller_class' => 'WP_REST_Posts_Controller',

        );

        //Por último registramos el post type
        register_post_type('services', $args);

        flush_rewrite_rules();
    }

    public function atr_taxonomia_servicios()
    {

        $post_types = ['services'];

        $labels = array(
            'name'              => _x('Tipo de servicio', 'taxonomy general name', 'hotel'),
            'singular_name'     => _x('Tipo de servicio', 'taxonomy singular name', 'hotel'),
            'search_items'      => __('Buscar Tipo de servicio', 'hotel'),
            'all_items'         => __('Todos los Tipos de Servicios', 'hotel'),
            'parent_item'       => __('Tipo de servicio Padre', 'hotel'),
            'parent_item_colon' => __('Tipo de servicio Padre:', 'hotel'),
            'edit_item'         => __('Editar Tipo de servicio', 'hotel'),
            'update_item'       => __('Actualizar Tipo de servicio', 'hotel'),
            'add_new_item'      => __('Agregar Nuevo Tipo de servicio', 'hotel'),
            'new_item_name'     => __('Nuevo Tipo de servicio', 'hotel'),
            'menu_name'         => __('Tipo de servicio', 'hotel'),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite' => array('slug' => 'tipo-servicio'),
            //Campos api rest
            'show_in_rest'          => true,
            'rest_base'             => 'tipo-servicio',
            'rest_controller_class' => 'WP_REST_Terms_Controller',

        );

        register_taxonomy('tipo-servicio', $post_types, $args);
        
    }

}