<?php

$images = get_post_meta( get_the_ID(), 'img_list_carrousel', true );
var_dump($images);