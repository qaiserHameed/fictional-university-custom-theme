<?php get_header(); ?>

<?php pageBanner(array(
  'title' => 'Past Events',
  'subtitle' => 'Recap past events'
)) ?>

  <div class="container container--narrow page-section">

  <?php 


    $today = Date('Y-m-d');
    $pastEvents = new WP_Query(array(

      'posts_per_page' => -1,
      'paged' => get_query_var('paged', 1 ),
      'post_type' => 'event',
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'meta_query' => array(
          'key' => 'event_date',  // Replace with your actual custom field key
      'value' => $today,
      'compare' => '<',  // Compare today's date or later
      'type' => 'DATE'

      )
    ));


  while($pastEvents->have_posts()){
    $pastEvents->the_post(); ?>

<?php get_template_part('template-parts/event'); ?>

  <?php }

  echo paginate_links(array(
    'total' => $pastEvents->max_num_pages,
  ));
  ?>
  </div>



<?php get_footer(); ?>