<?php get_header(); ?>

<?php
    $poem_args = array(
        'post_type' => 'prosody_poem',
        'category_name' => 'featured'
        );
    $poems = new WP_Query( $poem_args );
?>


<div id="main">
<div class="container">
<div class="row">
<div class="content poem-home col-lg-8 col-md-8 col-sm-8">

    <?php if ( $poems->have_posts() ) : while ( $poems->have_posts() ) : $poems->the_post(); ?>

                <div>
                    <?php the_content(); ?>
                    <div class="row" id="utils">
                        <div class="col-sm-4-offset-8 col-md-4-offset-8 col-lg-4-offset-8">
                            Show
                            <span>
                                Stress
                                <input type="checkbox">
                            </span>
                            <span>
                                Foot division
                                <input type="checkbox">
                            </span>
                            <span>
                                Caesura
                                <input type="checkbox">
                            </span>
                        </div>
                    </div>
                </div>

    <?php endwhile; else: ?>

                <h2>Getting Started</h2>
                <p>Select a poem to begin.</p>

    <?php endif; ?>
</div><!-- ends .content -->

<div class="col-lg-4 col-md-4 col-sm-4">
    <?php get_sidebar(); ?>
</div>

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>
