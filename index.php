<?php get_header(); ?>

<?php
    $poem_args = array(
        'post_type' => 'prosody_poem',
        'category_name' => 'featured'
        );
    $poems = new WP_Query( $poem_args );
?>


<div class="main">
<div class="row">
<div class="content col-md-8">

    <?php if ( $poems->have_posts() ) : while ( $poems->have_posts() ) : $poems->the_post(); ?>

                <div>
                    <?php the_content(); ?>
                </div>

    <?php endwhile; else: ?>

                <h2>Getting Started</h2>
                <p>Select a poem to begin.</p>

    <?php endif; ?>
</div><!-- ends .content -->

<div class="col-md-4">
    <?php get_sidebar(); ?>
</div>

</div><!-- ends row -->

</div><!-- ends .main -->

<?php get_footer(); ?>
