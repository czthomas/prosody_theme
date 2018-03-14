<?php get_header(); ?>

<div id="main">
<div class="container">
<div class="row">

<?php if ( have_posts() ) : the_post(); ?>

    <?php $resources = get_post_meta( $post->ID, 'Resources', true ); ?>
    <?php if ( $resources ): ?>
        <ul class="poem_tabs">
            <li id="poem_text_tab"><a href="#">Text</a></li>
            <li id="poem_resources_tab"><a href="#">Resources</a></li>
        </ul>
    <?php endif; ?>

    <div class="content poem-home col-lg-6 col-md-6 col-sm-8">
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
            <div class="inner-util">
                Show Stress <input id="togglestress" class="on" name="togglestress" value="on" type="checkbox" checked="checked"/>
                &#160;&#160;&#160;Foot division <input id="togglefeet" class="on"  name="togglefeet" value="on" type="checkbox" checked="checked"/>
                &#160;&#160;&#160;Caesura <input id="togglecaesura" class="on"  name="togglecaesura" value="on" type="checkbox"/>
                <!-- Within this chunk, move the javascript call out to handlers -->
                <span id="syncopation">&#160;&#160;&#160;Syncopation <input id="togglediscrepancies" name="togglediscrepancies" value="off" type="checkbox"/></span>
            </div>
        </div>

        <?php else: ?>

            <h2>Getting Started</h2>
            <p>Select a poem to begin.</p>

        <?php endif; ?>
    </div><!-- ends .content -->

    <div id="sidebar-container" class="col-lg-3 col-md-3 col-sm-4">
        <?php get_sidebar(); ?>
    </div>

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>
