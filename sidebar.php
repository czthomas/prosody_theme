<div id="sidebar">
    <h2>List of Poems</h2>
    <?php //get_template_part( 'meta_test' ); ?>
    <div id="poem-sorting">
    <!-- Below, the first loop uses a default part of the post object. The next three loops should probably be done using meta data. Since they are all basically the same, we could try creating a function that would just be passed a meta key to get the data to be sorted. Trick might be what is displayed. Could pass a template tag if that is sufficient.-->
        <h3 class="poem-sort-method">By Title</h3>
        <!-- By Title will need to get all poems and sort by ascending order -->
            <div class="poem-results">
                <ul class="titles">
                    <?php
                        $args = array(
                            'post_type' => 'prosody_poem',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                        );
                        $poems_by_title = new WP_Query( $args );
                    ?>
                    <?php if ( $poems_by_title->have_posts() ) : while ($poems_by_title->have_posts() ) : $poems_by_title->the_post();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        <h3 class="poem-sort-method">By Difficulty</h3>
        <!-- By Difficulty will require that all poems have a difficulty assigned in meta data. Will then group and sort by difficulty. Meta key: Difficulty, values= warming_up, moving_along, special_challenge -->
        <!-- For each value of meta key, get posts with that value -->
            <div class="poem-results">
            <?php

            $difficulty_levels = array( 'warming_up', 'moving_along', 'special_challenge' );


            foreach ($difficulty_levels as $difficulty ) {
                echo "<h4>" . ucwords(str_replace('_', ' ', $difficulty)) . "</h4>";
                echo "<ul class='titles'>";
                global $post;

                $args = array(
                        'post_type' => 'prosody_poem',
                        'meta_key' => 'Difficulty',
                        'meta_value' => $difficulty,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => -1
                );

                $difficulty_posts = get_posts( $args );
                foreach ($difficulty_posts as $post ) :
                    setup_postdata( $post );
            ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php
                endforeach;
                wp_reset_postdata();
                echo "</ul>";
            }
            ?>

            </div>
        <h3 class="poem-sort-method">By Type</h3>
        <!-- Type will also require assignment by meta data and then sorting by type. Meta key: Type-->
        <!-- For each value of meta key, get posts with that value -->

            <div class="poem-results">
                <ul class="titles">
                    <?php
                        $args = array(
                            'post_type' => 'prosody_poem',
                            'meta_key' => 'Type',
                            'orderby' => 'meta_value',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                        );
                        $poems_by_type = new WP_Query( $args );
                    ?>
                    <?php if ( $poems_by_type->have_posts() ) : while ($poems_by_type->have_posts() ) : $poems_by_type->the_post();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        <h3 class="poem-sort-method">By Author</h3>
        <!-- Author will require creating an author meta box for each post, getting that data, and then sorting by meta_value. Meta key: Author -->
        <!-- For each value of meta key, get posts with that value -->

            <div class="poem-results">
                <ul class="titles">
                    <?php
                        $args = array(
                            'post_type' => 'prosody_poem',
                            'meta_key' => 'Author',
                            'orderby' => 'meta_value',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                        );
                        $poems_by_author = new WP_Query( $args );
                    ?>
                    <?php if ( $poems_by_author->have_posts() ) : while ($poems_by_author->have_posts() ) : $poems_by_author->the_post();?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
    </div>
</div>
