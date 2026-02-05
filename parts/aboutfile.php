<?php
$image = get_field('about_image');
?>
<div class="about" style='background-image: url("<?php echo esc_url($image['url']); ?>")'>
    <div class="grid-container flex-between">
        <div class="medium-4 small-12 cell w-60">
            <?php if (get_field('about')): ?>
                <div>
                    <?php the_field('about') ?>
                </div>
            <?php endif; ?>
        </div>
        <div class='sidebar-home'>
            <?php if( have_rows('about_page_repeater') ): ?>
                <div>
                    <?php while( have_rows('about_page_repeater') ): the_row(); ?>
                        <?php
                        $link_data = get_sub_field('about_page_link');
                        $text = get_sub_field('about_page_text');
                        ?>
                        <?php if( $link_data ): ?>
                                <a href="<?php echo esc_url($link_data['url']); ?>"
                                   target="<?php echo esc_attr($link_data['target']); ?>"
                                   class='page-button'>
                                    <span class='page-button-text'">
                                        <span>
                                            <?php echo $text ? esc_html($text) : esc_html($link_data['title']); ?>
                                        </span>
                                        <i class="fa fa-arrow-right" aria-hidden="true">с</i>
                                    </span>
                                </a>
                        <?php endif; ?>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

