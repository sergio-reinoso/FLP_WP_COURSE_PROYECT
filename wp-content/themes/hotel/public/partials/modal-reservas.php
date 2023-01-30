<?php

$args = array(
    'pagename' => 'politicas-de-privacidad'
);

$titulo = new WP_Query($args);

?>

<div class="modal fade" id="exampleModal-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    <?php while( $titulo->have_posts() ) : $titulo->the_post(); ?>
                        <?php the_title(); ?>
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php the_content(); ?>
                <?php wp_reset_postdata(); endwhile; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>