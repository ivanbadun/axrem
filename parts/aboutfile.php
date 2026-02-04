<?php
$image = get_field('about_image');
?>
<div style='color: white; background-image: url("<?php echo esc_url($image['url']); ?>")'>
    <div class="grid-container" style='display: flex; justify-content: space-between'>
        <div class="medium-4 small-12 cell" style='width: 50%'>
            <?php if (get_field('about')): ?>
                <div>
                    <?php the_field('about') ?>
                </div>
            <?php endif; ?>
        </div>
        <div style='width: 20%'>
            <?php if( have_rows('about_page_repeater') ): ?>
                <div class="repeater-wrapper">
                    <?php while( have_rows('about_page_repeater') ): the_row(); ?>
                        <?php
                        $link_data = get_sub_field('about_page_link');
                        $text = get_sub_field('about_page_text');
                        ?>
                        <?php if( $link_data ): ?>
                            <div style="margin: 10px 0;">
                                <a href="<?php echo esc_url($link_data['url']); ?>"
                                   target="<?php echo esc_attr($link_data['target']); ?>"
                                   style="
                                        display: block;
                                        text-decoration: none;
                                        background-color: #ffffff;
                                        color: #000000;
                                        padding: 12px 20px;
                                        font-size: 18px;
                                   ">
                                    <span style="display: flex; justify-content: space-between; align-items: center;">
                                        <span>
                                            <?php echo $text ? esc_html($text) : esc_html($link_data['title']); ?>
                                        </span>
                                        <i class="fa fa-arrow-right" aria-hidden="true">с</i>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>


                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

