<?php

if(!is_user_logged_in()){
    wp_redirect(esc_url(site_url('/')));
    exit;
}
get_header() ?>
<?php 
while (have_posts()){
    the_post(); ?>
 <?php
pageBanner();
?>    

  <div class="container container--narrow page-section">
<div class="create-note">
    <h2 class="headline headline--medium">Create New Note</h2>
    <input class="new-note-title" type="text" placeholder="Title">
    <textarea class="new-note-body" name="" id=""></textarea>
    <span class="submit-note">Create Note</span>
    <span class="note-limit-message">Note limits reached:  delete an existing note to make room for a new one</span>
</div>


   <ul class="min-list link-list" id="my-notes">

   <?php $userNotes = new WP_Query(array(
    'post_type' => 'note',
    'post_per_page' => -1,
    'author' => get_current_user_id(),
   )); 
   while($userNotes->have_posts()){
    $userNotes->the_post(); ?>

    <li data-id="<?php the_ID(); ?>">
    <!-- <input readonly type="text" class="note-title-field" value="<?php echo str_replace('private: ',' ',esc_attr(get_the_title())); ?>">  --> <!-- i use this for removing private who were  coming before title but this code not working properly thats why i use code whose is below line-->
        <input readonly type="text" class="note-title-field" value="<?php echo esc_attr(trim(preg_replace('/^private:\s*/i', '', get_the_title()))); ?>">
        <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span>
        <span class="delete-note"><i class="fa fa-trash" aria-hidden="true"></i>Delete</span>
        <textarea readonly name="" id="" class="note-body-field"><?php echo esc_attr(wp_strip_all_tags(get_the_content())); ?></textarea>
        <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-write" aria-hidden="true"></i>Save</span>
    </li>
   <?php }
   
   ?>

   </ul>
  </div>
 
 <?php } ?>
    

<?php get_footer() ?>