<div id="sidebar">
    <h2>List of Poems</h2>

    <div id="poem-sorting">

        <h3 class="poem-sort-method">By Title</h3>

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

            <div class="poem-results">
                <?php

                $poem_types = array( 'ballad', 'blank_verse', 'cinquain', 'couplet', 'quatrain', 'sixain', 'song', 'sonnet', 'spenserian_stanza' );


                foreach ($poem_types as $type ) {
                    echo "<h4>" . ucwords(str_replace('_', ' ', $type)) . "</h4>";
                    echo "<ul class='titles'>";
                    global $post;

                    $args = array(
                            'post_type' => 'prosody_poem',
                            'meta_key' => 'Type',
                            'meta_value' => $type,
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                    );

                    $poem_types_posts = get_posts( $args );
                    foreach ($poem_types_posts as $post ) :
                        setup_postdata( $post ); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
                    endforeach;
                    wp_reset_postdata();
                    echo "</ul>";
                }
                ?>
            </div>
        <h3 class="poem-sort-method">By Author</h3>

            <div class="poem-results">
                <?php

                $authors = array();

                $args = array(
                    'post_type' => 'prosody_poem',
                    'posts_per_page' => -1
                );

                $poems = get_posts( $args );
                foreach ($poems as $poem ) {
                    $author_name = get_post_meta( $poem->ID, 'Author', true );
                    array_push( $authors, $author_name );
                }

                wp_reset_postdata();

                sort($authors);

                foreach ($authors as $author ) {
                    echo "<h4>" . ucwords(str_replace('_', ' ', $author)) . "</h4>";
                    echo "<ul class='titles'>";
                    global $post;

                    $args = array(
                            'post_type' => 'prosody_poem',
                            'meta_key' => 'Author',
                            'meta_value' => $author,
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                    );

                    $author_posts = get_posts( $args );
                    foreach ($author_posts as $post ) :
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
    </div>
</div>
