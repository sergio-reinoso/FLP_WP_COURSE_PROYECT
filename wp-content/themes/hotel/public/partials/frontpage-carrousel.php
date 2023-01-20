<?php

$images = get_post_meta(get_the_ID(), 'img_list_carrousel', true);
//var_dump($images);

?>

<div id="sliderHome" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php
        
            $count = 0;
            foreach( $images as $imagen ){

                $classActive = ($count == 0 ? 'active' : '');
                $output = "
                    <div class='carousel-item $classActive' style='background-image: url($imagen)'>
                    </div>
                ";
                echo $output;
                $count++;

            }
            
        ?>
        <div class="carousel-item active">
            <img src="" class="d-block w-100" alt="">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#sliderHome" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#sliderHome" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>