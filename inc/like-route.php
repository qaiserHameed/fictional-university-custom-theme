<?php

add_action('rest_api_init','universityLikeRoute');
function universityLikeRoute(){
    register_rest_route('university/v1','manageLike',array(
        'methods'=> 'POST',
        'callback'=> 'createLike',
    ));

    register_rest_route('university/v1','manageLike',array(
        'methods'=> 'DELETE',
        'callback'=> 'deleteLike',
    ));
}

function createLike($data){

        if(is_user_logged_in()){
            $professor = sanitize_text_field($data['professorId']);
         return wp_insert_post(array(
             'post_type'=>"like",
             'post_status'=> 'publish',
             'post_title'=> 'php 1st post',
             'meta_input'=>array(
                 'liked_professor_id'=>$professor,
             )
             ));
        }else{
            die("only logged in users can create a like");
        }
  
}
function deleteLike(){
    return "delete like";
    
}