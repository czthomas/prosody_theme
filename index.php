<?php get_header(); ?>

<?php
    $poem_args = array(
        'post_type' => 'prosody_poem',
        'category_name' => 'featured'
        );
    $poems = new WP_Query( $poem_args );
?>

<?php if ( $poems->have_posts() ) : while ( $poems->have_posts() ) : $poems->the_post(); ?>

    <div class="main">
        <div class="content">
            <div>
                <?php the_content(); ?>
            </div>
        </div>



<?php endwhile; else: ?>

    <div class="main">
        <div id="content">
            <h2>Getting Started</h2>
            <p>Select a poem to begin.</p>
        </div>


<?php endif; ?>

<?php get_sidebar(); ?>

</div><!-- ends .main -->

<?php get_footer(); ?>
