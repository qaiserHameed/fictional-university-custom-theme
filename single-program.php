<?php get_header(); ?>
<?php 
while (have_posts()) {
    the_post(); ?>
     
     <?php  pageBanner(); ?>
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
                    <i class="fa fa-home" aria-hidden="true"></i> All programs
                </a>
                <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content"><?php the_field('main_body_content'); ?></div>

        <?php 
        // Related Professors
        $relatedProfessors = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'professor',
            'orderby' => 'title',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'related_program',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                ),
            )
        ));

        if ($relatedProfessors->have_posts()) {
            echo '<h2>' . get_the_title() . ' Professors</h2>';
            echo '<ul class="professor-cards" style="display: contents">';
            while ($relatedProfessors->have_posts()) {
                $relatedProfessors->the_post(); ?>
                <li class="professor-card__list-item">
                    <a class="professor-card" href="<?php the_permalink(); ?>">
                        <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape') ?>" alt="">
                        <span class="professor-card__name"><?php the_title() ?></span>

                    </a>
                </li> <?php echo '</ul>'; ?>
            <?php }
            
            wp_reset_postdata();
        }

        // Related Events
        $today = date('Ymd');
        $relatedEvents = new WP_Query(array(
            'posts_per_page' => 2,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'value' => $today,
                    'compare' => '>=',
                    'type' => 'DATE'
                ),
                array(
                    'key' => 'related_program',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"'
                ),
            )
        ));

        if ($relatedEvents->have_posts()) {
            echo '<h2>Upcoming Events</h2><ul>';
            while ($relatedEvents->have_posts()) {
                $relatedEvents->the_post(); ?>
                <?php get_template_part('template-parts/event'); ?>
            <?php }
            echo '</ul>';
            wp_reset_postdata();
        }
        ?>
    </div>

<?php } // end while ?>
<?php get_footer(); ?>
