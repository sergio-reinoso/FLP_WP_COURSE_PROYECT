<?php

class ATR_Widgets extends WP_Widget
{

    public function __construct()
    {

        $widget_options = [
            'classname' => 'atr_widget_habitaciones',
            'description' => 'En este widget mostraremos algunas habitaciones'
        ];

        $control_options = [
            'height' => 200,
            'width' => 250
        ];

        parent::__construct(
            'atr_widget_habitaciones',
            'Widget Habitaciones',
            $widget_options,
            $control_options
        );
    }

    public function atr_estructura_html_widget($number)
    {

        //$args, argumentos para la query
        $args = array(
            'post_type'         => 'rooms',
            'posts_per_page'    => $number,
            'order'             => 'DESC',
            'orderby'           => 'rand',
            'post_status'       => 'publish'
        );

        $rooms = new WP_Query($args);

        while ($rooms->have_posts()) : $rooms->the_post(); ?>

            <div class="row">
                <div class="col-12">
                    <div class="imagen">
                        <a href="<?php the_permalink(); ?>">
                            <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" style="width: 100%">
                        </a>
                    </div>
                </div>
                <div class="col-12 contenido">
                    <a class="rooms-title" href="<?php the_permalink(); ?>">
                        <span><?php the_title('<h3>', '</h3>'); ?></span>
                    </a>
                    <?php the_excerpt(); ?>
                </div>
            </div>

        <?php wp_reset_postdata(); endwhile;
    }

    public function form($instance){

        //Guardamos los valores para el titulo
        $titulo_id = $this->get_field_id('titulo');
        $titulo_name = $this->get_field_name('titulo');
        $titulo_val = esc_attr($instance['titulo']);

        //Guardamos el valor o cantidad de habitaciones a mostrar
        $rooms_id = $this->get_field_id('rooms');
        $rooms_name = $this->get_field_name('rooms');
        $rooms_val = esc_attr($instance['rooms']);

        ?>

        <label for="<?php echo $titulo_id; ?>">Titulo</label>
        <input id="<?php echo $titulo_id ?>" name="<?php echo $titulo_name; ?>" value="<?php echo $titulo_val; ?>" type="text">

        <label for="<?php echo $rooms_id; ?>">Selecciona habitaciones a mostrar</label>
        <select name="<?php echo $rooms_name; ?>">
            <?php for($valor=1; $valor<=5; $valor++): ?>

                <option value="<?php echo $valor; ?>" <?php if($valor == $rooms_val){echo "selected";} ?>>
                    <?php echo $valor; ?>
                </option>
            <?php endfor; ?>
        </select>

        <?php

        $this->atr_estructura_html_widget($rooms_val);
    }

    public function update($new_instance, $old_instance){

        return $new_instance;

    }

    public function widget($args, $instance){
    
        extract($args, EXTR_SKIP);

        $titulo = isset($instance['titulo']) ? $instance['titulo'] : 'Agrega un titulo';
        $rooms = isset($instance['rooms']) ? $instance['rooms'] : 1;

        echo "<h3>$titulo</h3>";

        $this->atr_estructura_html_widget($rooms);
        
    }
}
