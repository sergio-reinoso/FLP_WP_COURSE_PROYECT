<?php

class ATR_Master {

    protected $cargador;
    protected $theme_name;
    protected $version;

    public function __construct() {
        
        $this->theme_name = 'ATR_hotel';
        $this->version = '1.0.0';
        
        $this->cargar_dependencias();
        $this->cargar_instancias();
        $this->set_idiomas();
        $this->definir_admin_hooks();
        $this->definir_public_hooks();
        
    }

    private function cargar_dependencias() {

         /**
		 * La clase responsable de iterar las acciones y 
         * filtros del núcleo del theme.
		 */
        require_once ATR_DIR_PATH . 'includes/class-atr-cargador.php';
        
        /**
		 * La clase responsable de definir la funcionalidad de la
         * internacionalización del theme
		 */
        require_once ATR_DIR_PATH . 'includes/class-atr-i18n.php';
        
        /**
         * La clase responsable de registrar menús y submenús
         * en el área de administración
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-build-menupage.php';
        
        /**
		 * La clase responsable de definir todas las acciones en el
         * área de administración
		 */
        require_once ATR_DIR_PATH . 'admin/class-atr-admin.php';
        
        /**
		 * La clase responsable de definir todas las acciones en el
         * área del lado del cliente/público
		 */
        require_once ATR_DIR_PATH . 'public/class-atr-public.php';

        /**
         * La clase responsable de crear nuevos widgets
         * widgets personalizados para un sidebar
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-widgets.php';

        /**
         * La clase responsable de crear los cpt
         * Custom Post Types
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-cpt.php';

        /**
         * La clase responsable de crear los Metaboxes
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-metaboxes.php';

        /**
         * La clase responsable de crear consultas a la BBDD
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-database.php';

        /**
         * En esta clase se cargara la libreria CMB2
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-cmb2.php';

        /**
         * Cargaremos la clase para el ajax newsletter del frontend
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-ajax-newsletter.php';

        /**
         * Cargaremos la clase para el ajax para el formulario dle contacto
         */
        require_once ATR_DIR_PATH . 'includes/class-atr-ajax-contacto.php';
        

    }

    private function set_idiomas() {
        
        $atr_i18n = new ATR_i18n();
        $this->cargador->add_action( 'after_setup_theme', $atr_i18n, 'load_theme_textdomain' );
        
    }

    //Metodo para los widgets
    public function atr_registro_widgets(){

        register_widget('ATR_Widgets');

    }
    

    private function cargar_instancias() {
        
        /**
         * Cree una instancia del cargador que se utilizará para 
         * registrar los ganchos con WordPress.
         */
        $this->cargador     	    = new ATR_Cargador;
        $this->atr_admin    	    = new ATR_Admin( $this->get_theme_name(), $this->get_version() );
        $this->atr_public   	    = new ATR_Public( $this->get_theme_name(), $this->get_version() );
        $this->atr_cpt   	        = new ATR_CPT();
        $this->atr_metaboxes   	    = new ATR_Metaboxes;
        $this->atr_database   	    = new ATR_Database;
        $this->atr_cmb2   	        = new ATR_CMB2;
        $this->atr_ajax_newsletter  = new ATR_AjaxNewsletter;
        $this->atr_ajax_contacto    = new ATR_AjaxContacto;

        
    }

    private function definir_admin_hooks() {

        //Encolamiento archivos cssy js
        $this->cargador->add_action( 'admin_enqueue_scripts', $this->atr_admin, 'enqueue_styles' );
        $this->cargador->add_action( 'admin_enqueue_scripts', $this->atr_admin, 'enqueue_scripts' );

        //añadiendo menú al administrador
        $this->cargador->add_action( 'admin_menu', $this->atr_admin, 'add_menu' );

        //Gancho para widgets
        $this->cargador->add_action( 'widgets_init', $this, 'atr_registro_widgets' );

        //Gancho para CPT
        $this->cargador->add_action( 'init', $this->atr_cpt, 'atr_cpt_habitaciones' );
        $this->cargador->add_action( 'init', $this->atr_cpt, 'atr_taxonomia_habitaciones' );
        $this->cargador->add_action( 'init', $this->atr_cpt, 'atr_metadatos_cpt' );
        
        //Ganchos CPT Servicios
        $this->cargador->add_action('init', $this->atr_cpt, 'atr_cpt_servicios');
        $this->cargador->add_action('init', $this->atr_cpt, 'atr_taxonomia_servicios');


        //Gancho para Metaboxes
        // $this->cargador->add_action( 'add_meta_boxes', $this->atr_metaboxes, 'atr_add_caja_personalizada' );
        // $this->cargador->add_action( 'save_post', $this->atr_metaboxes, 'atr_save_metacaja_datos' );

        //Ganchos CMB2
        $this->cargador->add_action( 'cmb2_admin_init', $this->atr_cmb2, 'atr_cmb2_metaboxes' );
        $this->cargador->add_action( 'cmb2_admin_init', $this->atr_cmb2, 'atr_cmb2_metaboxes_experiencias' );
        $this->cargador->add_action( 'cmb2_admin_init', $this->atr_cmb2, 'atr_cmb2_metaboxes_habitaciones' );
        $this->cargador->add_action( 'cmb2_admin_init', $this->atr_cmb2, 'atr_cmb2_servicios' );
        $this->cargador->add_action( 'cmb2_admin_init', $this->atr_cmb2, 'atr_cmb2_contacto' );
        $this->cargador->add_action( 'cmb2_admin_init', $this->atr_cmb2, 'atr_cmb2_reservas' );


        //Gancho Ajax
        $this->cargador->add_action( 'after_setup_theme', $this->atr_ajax_newsletter, 'atr_create_db_newsletter' );

        //Ganchos de accion ajax para usuarios registrados y no registrados
        $this->cargador->add_action( 'wp_ajax_atr_newsletter', $this->atr_ajax_newsletter, 'atr_newsletter' );
        $this->cargador->add_action( 'wp_ajax_nopriv_atr_newsletter', $this->atr_ajax_newsletter, 'atr_newsletter');

    }

    private function definir_public_hooks() {

        $this->cargador->add_action( 'wp_enqueue_scripts', $this->atr_public, 'enqueue_styles' );
        $this->cargador->add_action( 'wp_enqueue_scripts', $this->atr_public, 'enqueue_scripts' );

        //add menu frontend
        $this->cargador->add_action( 'init', $this->atr_public, 'atr_theme_support' );

        //Registro de sidebars
        $this->cargador->add_action('init', $this->atr_public, 'atr_register_sidebars');

        //Gancho de filtro
        $this->cargador->add_filter('excerpt_length', $this->atr_public, 'atr_excerpt');
        $this->cargador->add_filter('excerpt_more', $this->atr_public, 'atr_excerpt_more');

        //DB tabla contacto
        $this->cargador->add_action('after_setup_theme', $this->atr_ajax_contacto, 'atr_create_db_contacto');
        //Ajax form contacto
        $this->cargador->add_action('wp_ajax_atr_form_contacto', $this->atr_ajax_contacto, 'atr_form_contacto');
        $this->cargador->add_action('wp_ajax_nopriv_atr_form_contacto', $this->atr_ajax_contacto, 'atr_form_contacto');

    }

    public function get_theme_name() {
        return $this->theme_name;
    }

    public function get_version() {
        return $this->version;
    }

    public function get_cargador() {
        return $this->cargador;
    }

    public function run() {
        $this->cargador->run();
    }

}