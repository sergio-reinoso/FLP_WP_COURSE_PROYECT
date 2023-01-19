<?php get_header(); ?>

<?php get_template_part('public/partials/frontpage', 'carrousel'); ?>

<div class="container container-text-bienvenida">
    <div class="row">
        <div class="col-12 text-center">
            <?php echo wpautop(get_post_meta(get_the_ID(), 'texto_bienvenida', true)); ?>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row row-divider">
        <div class="divider"></div>
    </div>
</div>
<?php get_footer(); ?>