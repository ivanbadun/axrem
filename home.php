<?php
/**
 * Home.
 *
 * Standard loop for the blog-page
 */
get_header(); ?>
<div class="grid-container breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display')) { bcn_display(); }?>
</div>

<main class="main-content">
    <div class="grid-container">
        <div class="grid-x grid-margin-x posts-list">
            <!-- BEGIN of Blog posts -->
            <div class="large-8 medium-8 small-12 cell">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
                <div class="page-description">
                    <p>
                        <?php
                        $news_page_id = get_option('page_for_posts');
                        $description = get_field('news_description', $news_page_id);

                        if ( $description ) {
                            echo $description;
                        }
                        ?>
                    </p>
                </div>
                <div class='container__news'>
                    <?php if (have_posts()) { ?>
                        <?php while (have_posts()) {
                            the_post(); ?>
                            <?php get_template_part('parts/loop', 'post'); // Post item?>
                        <?php } ?>
                    <?php } ?>
                </div>

                <!-- BEGIN of pagination -->
                <div class="pagination-container">
                    <?php
                    global $wp_query;
                    if ( $wp_query->max_num_pages > 1 ) :
                        foundation_pagination();
                    else :
                        ?>
                        <ul class="pagination">
                            <li class="current">1</li>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- END of pagination -->
            </div>
            <!-- END of Blog posts -->
            <!-- BEGIN of sidebar -->
            <div class="large-4 medium-4 small-12 cell sidebar">
                <?php get_sidebar('right'); ?>
                <?php
                get_template_part('templates/events-sidebar');
                ?>
            </div>
            <!-- END of sidebar -->
        </div>
    </div>
</main>

<?php get_footer(); ?>
