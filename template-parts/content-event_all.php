<li class="post-list">
    <div class="row">
        <div class="col-xs-3 date">
            <?php $eventDate = new DateTime(get_field('event_date')); ?>
                <p class="day"><?php echo $eventDate->format('n'); ?>
                    <span class="month"><?php echo $eventDate->format('M'); ?></span>
                </p>
        </div>
        <div class="col-xs-9">
            <h4 class="post-styles-all">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <p class='read-more-style'>
                <?php if (has_excerpt()) {
                    echo get_the_excerpt();
                } else {
                    echo wp_trim_words(get_the_content(), 10);
                } ?>
                <a href="<?php the_permalink(); ?>">Read more</a>
            </p>
        </div>
    </div>
</li>