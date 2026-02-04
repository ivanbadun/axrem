<?php
$featured_posts = get_field('selected_posts');
?>
<div class="grid-container" style='display: flex; justify-content: space-between'>
        <div class="medium-4 small-12 cell" style='width: 50%'>
            <?php if( $featured_posts ): ?>
                <div class='container__news'>
                    <?php foreach( $featured_posts as $post ): setup_postdata($post);
                        $categories = get_the_category();
                        $cat_name = !empty($categories) ? esc_html($categories[0]->cat_name) : '';

                        $bg_color = ($cat_name == 'Members Document') ? 'pink' : 'white';
                        $txt = ($cat_name == 'Members Document') ? 'white' : 'black';
                        ?>
                        <?php get_template_part('parts/loop', 'post');?>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>

            <div style="margin: 0px; display: flex; text-transform: uppercase; align-items: center; justify-content: center; border: 1px solid gray; text-decoration: none;">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">show more</a>
                    </div>
        </div>
        <div style='width: 20%'>
            <h1>tyt bydet sidebar</h1>
        </div>
</div>

