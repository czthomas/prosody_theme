<?php get_header(); ?>

<?php
    $category = get_query_var('category_name');
    if(empty($category)) {
        $category = 'featured';
    }

    $poem_args = array(
        'post_type' => 'prosody_poem',
        'category_name' => $category
        );
    $poems = new WP_Query( $poem_args );
?>

<div id="main">
<div class="container">
<div class="row">
<div class="content poem-home col-lg-6 col-md-6 col-sm-8">
    <?php if ( $poems->have_posts() ) : $poems->the_post(); ?>
        <?php $resources = get_post_meta( $post->ID, 'Resources', true ); ?>
        <?php $tei_type = get_post_meta( $post->ID, 'tei_type', true); ?>

        <div class="scrollfix">
            <?php if ( $resources ): ?>
                <div id="poem_resources">
                    <?php echo do_shortcode( $resources ); ?>
                </div>
            <?php endif ?>
            <div id="poem_text">
                <?php the_content(); ?>
            </div>
        </div>

        <?php if( $tei_type == 'poem' ): ?>
            <div class="row" id="utils">
                <div class="inner-util">
                    Show Stress <input id="togglestress" class="on" name="togglestress" value="on" type="checkbox" checked="checked"/>
                    &#160;&#160;&#160;Foot division <input id="togglefeet" class="on"  name="togglefeet" value="on" type="checkbox" checked="checked"/>
                    &#160;&#160;&#160;Caesura <input id="togglecaesura" class="on"  name="togglecaesura" value="on" type="checkbox"/>
                    <!-- Within this chunk, move the javascript call out to handlers -->
                    <span id="syncopation">&#160;&#160;&#160;Syncopation <input id="togglediscrepancies" name="togglediscrepancies" value="off" type="checkbox"/></span>
                    </div>
            </div>
        <?php endif ?>

        <?php else: ?>
            <div class="scrollfix">
                <div id="poem_text">
                </div>
            </div>
        <?php endif; ?>
    </div><!-- ends .content -->

    <div id="sidebar-container" class="col-lg-3 col-md-3 col-sm-4">
        <?php get_sidebar(); ?>
    </div>

</div><!-- ends row -->
</div><!-- ends .container -->

</div><!-- ends .main -->

<?php get_footer(); ?>
