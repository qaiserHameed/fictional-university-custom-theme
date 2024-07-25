<?php
require get_theme_file_path('/inc/search-route.php');
function university_custom_rest(){
    register_rest_field('post','authorName',array(
        'get_callback' => function(){return get_the_author();}
    ));
}
add_action('rest_api_init','university_custom_rest');

function university_files(){
    wp_enqueue_script('main-university-js',get_theme_file_uri('/build/index.js'), array('jquery'), '1.0' , true);
    wp_enqueue_script('bundle-js', get_theme_file_uri('/dist/bundle.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-font','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('font-awesome','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('university_main_style',get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_style',get_theme_file_uri('/build/index.css'));

    wp_localize_script('bundle-js', 'universityData', array(
        'root_url' => get_site_url(),
    ));
}
add_action("wp_enqueue_scripts",'university_files');


// Enqueue your script
wp_enqueue_script('main-js', get_theme_file_uri('/js/scripts.js'), array('jquery'), '1.0', true);



function university_features(){
add_theme_support('title-tag');
add_theme_support('post-thumbnails'); // for enable feature image option
add_image_size('professorLandscape',400,260, true);
add_image_size('professorPortrait',480,650, true);
add_image_size('pageBanner',1500,350, true);
}

add_action('after_setup_theme', 'university_features');

add_filter('acf/settings/remove_wp_meta_box', '__return_false'); // for Enable default Custom Field in Wordpress but this function only apply on blog posts if i want enable in custom post types so we should enable through custom query.


function pageBanner($args = NULL){
    if(!isset($args['title'])){
        $args['title'] = get_the_title();
    }
    if (!isset($args['subtitle'])){
        $args['subtitle'] = get_field('field_banner_subtitle');
    }
   
    if (!isset($args['photo'])){
       if(get_field('page_banner_background_image')){
        $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
       }else{
        $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
       }
    }
   
   ?>  
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <!-- <?php print_r($pageBannerImage) ?> -->
            <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
            <div class="page-banner__intro">
                <p><?php echo $args['subtitle']; ?></p>
            </div>
        </div>
    </div>


<?php }


function university_adjust_queries($query){
    if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', '-1');
    }



    // this query is so powerful if i use this query so they reflect on all side like admin dashboard blog page etc means if i use $query -> set('posts_per_page','1'); so in admin dashboard only show 1 post and in blog section show only one post but i want only in events show 1 post so we use if condition .
if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
    $today = date('Ymd');
    $query -> set('meta_key','event_date');  
     $query -> set('orderby','meta_value_num');  
     $query -> set('order','ASC');
     $query -> set('meta_query', array(
        'key' => 'event_date',  // Replace with your actual custom field key
    'value' => $today,
    'compare' => '>=',  // Compare today's date or later
    'type' => 'DATE'

    ));
      
}
}
add_action('pre_get_posts','university_adjust_queries');





