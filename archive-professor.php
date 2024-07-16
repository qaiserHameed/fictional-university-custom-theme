<?php get_header() ?>
<?php 
while (have_posts()){
    the_post(); ?>
     
    <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title() ?></h1>
      <div class="page-banner__intro">
        <p>Dont forget me to replace later.</p>
      </div>
    </div>
  </div>
  <div class="container container--narrow page-section">
    
    <div class="generic-content"><?php the_content(); ?></div>

    <?php
    $relatedPrograms = get_field('related_program');
    if($relatedPrograms){
    foreach($relatedPrograms as $program){ ?>
      <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
   <?php }
   };
?>
</div>

<?php }
?>
<?php get_footer() ?>