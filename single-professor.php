<?php get_header(); ?>
<?php 
while (have_posts()) {
    the_post(); ?>
     
     <?php  pageBanner(); ?>
  
    <div class="container container--narrow page-section">
      
        <div class="generic-content">

        <div class="row group">
            <div class="one-third">
            <?php the_post_thumbnail('professorPortrait'); ?>
            </div>
            <div class="two-thirds">
            <?php  the_content() ?>
            </div>
        </div>
        </div>
        <?php
    $relatedPrograms = get_field('related_program');
    if($relatedPrograms){ ?>
<h1 style="margin-top: 30px;">Subject(s) Taught</h1>
  <?php      
    foreach($relatedPrograms as $program){ ?>
      <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
   <?php }
   };
?>










        <?php }?>