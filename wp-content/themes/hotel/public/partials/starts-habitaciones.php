<?php

function start_room($id){

    $key = get_post_meta($id, 'rooms_calificacion', true);

    if($key!=''){

        $key = (int) $key;
        $starts_black = 5 - $key;

        for($i=1;$i<=$key;$i++){
            echo '<span class="start"><i class="fas fa-star"></i></span>';
        }
        for ($i = 1; $i <= $starts_black; $i++) {
            echo '<span class="start_black" style="color: #a1a1a1"><i class="fas fa-star"></i></span>';
        }
    }elseif($key==''){
        $starts_black = 5;
        for($i=1;$i<=$starts_black;$i++){
            echo '<span class="start_black" style="color: #a1a1a1"><i class="fas fa-star"></i></span>';
        }

    }
}

?>