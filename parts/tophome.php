<div class="grid-container flex-between">
    <div class='w-70'>
        <?php if (shortcode_exists('slider')) {
            echo do_shortcode('[slider]');
        } ?>
    </div>
    <div class='sidebar-home'>
        <div>
            <div class="tophome__sidebar">
                <ul class="sidebar-menu__list">
                    <p class='tophome-menu__header'>
                        <?php if (get_field('text_tophome_sidebar')): ?>
                            <?php the_field('text_tophome_sidebar') ?>
                        <?php endif; ?>
                    </p>
                    <?php while( have_rows('tophome_reapeater') ): the_row(); ?>
                        <?php
                        $link_data = get_sub_field('tophome_page_link');
                        $text = get_sub_field('tophome_text');
                        ?>
                        <?php if( $link_data ): ?>
                        <li>
                            <a href="<?php echo esc_url($link_data['url']); ?>"
                               target="<?php echo esc_attr($link_data['target']); ?>">
                                    <span>
                                        <span>
                                            <?php echo $text ? esc_html($text) : esc_html($link_data['title']); ?>
                                        </span>
                                    </span>
                            </a>
                        </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            </div>

        </div>
        <?php if( have_rows('tophome_buttons') ): ?>
            <div>
                <?php while( have_rows('tophome_buttons') ): the_row(); ?>
                    <?php
                    $link_data = get_sub_field('tophome_button_link');
                    $text = get_sub_field('tophome_button_text');

                    $bg_color = get_sub_field('button_bg');
                    $text_color = get_sub_field('button_color');

                    $custom_style = "";
                    if ($bg_color) { $custom_style .= "background-color: " . $bg_color . "; "; }
                    if ($text_color) { $custom_style .= "color: " . $text_color . "; "; }
                    ?>

                    <?php if( $link_data ): ?>
                        <a href="<?php echo esc_url($link_data['url']); ?>"
                           target="<?php echo esc_attr($link_data['target']); ?>"
                           class='page-button'
                           style="<?php echo esc_attr($custom_style); ?>"
                        >
                    <span class='page-button-text'>
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
