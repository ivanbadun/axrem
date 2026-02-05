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
                $event_date = get_field('event_date');
                ?>
                <div class="event-entry">
                    <div class="event-title"><?php the_title(); ?></div>
                    <div class="event-date"><?php echo esc_html($event_date); ?></div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No upcoming events.</p>
        <?php endif; ?>

        <a href="/events" class="all-events-link">All Events</a>
    </div>
</div>

