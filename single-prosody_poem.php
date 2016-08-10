<?php get_header(); ?>

<div id="main">
<div class="container">
<div class="row">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php $resources = get_post_meta( $post->ID, 'Resources', true ); ?>
    <?php if ( $resources ): ?>
        <ul class="poem_tabs">
            <li id="poem_text_tab"><a href="#">Text</a></li>
            <li id="poem_resources_tab"><a href="#">Resources</a></li>
        </ul>
    <?php endif; ?>

    <div class="content poem-home col-lg-8 col-md-8 col-sm-8">
        <div class="scrollfix">
            <div id="poem_text">
                <?php the_content(); ?>
            </div>
            <?php if ( $resources ): ?>
                <div id="poem_resources">
                    <h2>Resources</h2>
                    <?php echo do_shortcode( $resources ); ?>
                </div>
            <?php endif ?>
        </div>
        <div class="row" id="utils">
            <div class="col-sm-4-offset-8 col-md-4-offset-8 col-lg-4-offset-8 inner-util">
            Show
            <span>Stress <input id="togglestress" class="on" name="togglestress" value="on" type="checkbox" checked="checked"/></span>
            <span>&#160;&#160;&#160;Foot division <input id="togglefeet" class="on" name="togglefeet" value="on" type="checkbox" checked="checked"/></span>
            <span>&#160;&#160;&#160;Caesura <input id="togglecaesura" class="on" name="togglecaesura" value="on" type="checkbox"/></span>
            <!-- Within this chunk, move the javascript call out to handlers -->
            <span id="syncopation">&#160;&#160;&#160;Syncopation <input id="togglediscrepancies" name="togglediscrepancies" value="off" type="checkbox"/></span>
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
