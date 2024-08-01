<?php get_header() ?>
<?php 
while (have_posts()){
    the_post(); ?>
     
 <?php  pageBanner(); ?>
  <div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i>  Home</a> <span class="metabox__main"><?php the_title(); ?></span>
      </p>
    </div>
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