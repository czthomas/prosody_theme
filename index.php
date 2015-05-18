<?php get_header(); ?>

<?php
    $poem_args = array(
        'post_type' => 'prosody_poem',
        'category_name' => 'featured'
        );
    $poems = new WP_Query( $poem_args );
?>

<div class="main">
<div class="content">

<?php if ( $poems->have_posts() ) : while ( $poems->have_posts() ) : $poems->the_post(); ?>

            <div>
                <?php the_content(); ?>
            </div>

<?php endwhile; else: ?>

            <h2>Getting Started</h2>
            <p>Select a poem to begin.</p>

<?php endif; ?>

<?php get_sidebar(); ?>

</div><!-- ends .content -->
</div><!-- ends .main -->

<?php get_footer(); ?>
