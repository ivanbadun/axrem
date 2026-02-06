<?php
$args = array(
    'post_type'      => 'event',
    'posts_per_page' => 2,
    'status'         => 'publish'
);

$events_query = new WP_Query($args);
?>

<div class="custom-event-widget">
    <div class="widget-header">Upcoming Events</div>

    <div class="widget-content">
        <?php if ( $events_query->have_posts() ) : ?>
            <?php while ( $events_query->have_posts() ) : $events_query->the_post();
                $start_date = get_field('event_start_date');
                $end_date   = get_field('event_end_date');
                ?>

                <a href="<?php the_permalink(); ?>" class="event-entry-link">
                    <div class="event-entry">
                        <div class="event-title"><?php the_title(); ?></div>
                        <div class="event-date">
                            <?php
                            if ( $start_date && $end_date && ($start_date !== $end_date) ) {
                                echo esc_html($start_date) . ' — ' . esc_html($end_date);
                            } elseif ( $start_date ) {
                                echo esc_html($start_date);
                            }
                            ?>
                        </div>
                    </div>
                </a>

            <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No upcoming events.</p>
        <?php endif; ?>

        <a href="<?php echo home_url('/events/'); ?>" class="all-events-link">All Events</a>
    </div>
</div>

