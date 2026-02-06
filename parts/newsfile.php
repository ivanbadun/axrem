<?php
$featured_posts = get_field('selected_posts');
?>
<div class='news'>
    <div class="grid-container flex-between">
        <div class="medium-4 small-12 cell w-60">
            <?php if( $featured_posts ): ?>
                <div class='container__news'>
                    <?php foreach( $featured_posts as $post ): setup_postdata($post);
                        ?>
                        <?php get_template_part('parts/loop', 'post');?>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>

            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
                <div class="more__button">
                    <p>Show more</p>
                </div>
            </a>
        </div>
        <div class='sidebar-home'>
            <div class="sidebar-menu">
                <ul class="sidebar-menu__list">
                    <p class='sidebar-menu__header'>
                        <?php if (get_field('text_news_sidebar')): ?>
                            <?php the_field('text_news_sidebar') ?>
                        <?php endif; ?>
                    </p>
                    <?php
                    wp_list_categories(array(
                        'orderby'    => 'name',
                        'show_count' => 0,
                        'title_li'   => '',
                        'hide_empty' => 0
                    ));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

