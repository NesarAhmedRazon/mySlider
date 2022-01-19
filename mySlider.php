<?php

/*
Plugin Name: mySlider
Plugin URI: https://github.com/NesarAhmedRazon/mySlider.git
Description: This is a WordPress Plugin to output custom post Type 'Project' as slidder on home page
Author: Nesar Ahmed
Version: 0.0.1
Author URI: https://github.com/NesarAhmedRazon/
*/
function make_postcards($attr, $content = null){
 
    global $post;
 
    // Defining Shortcode's Attributes
    $shortcode_args = shortcode_atts(
                        array(
                                'post'     => '',
                                'num'     => '5',
                                'order'  => 'desc'
                        ), $attr);    
     
    // array with query arguments
    $args = array(
                    'post_type'      => $shortcode_args['post'],
                    'posts_per_page' => $shortcode_args['num'],
                    'order'          => $shortcode_args['order'],
                     
                 );
 
     
    $recent_posts = get_posts($args);
 
    $post_card = '<div class="post_card_container">';
 
    foreach ($recent_posts as $post) :
         
        setup_postdata($post);
        $post_card .= '<div class="postcard">';
        $post_card .= '<div class="postcard_body">'.the_content();
        $post_card .= '</div>';
        $post_card .= '</div>'; 

    endforeach;    
     
    wp_reset_postdata();
 
    $post_card .= '</div>';
     
    return $post_card;
 
}

add_shortcode( 'postcards', 'make_postcards' );





function theTitleShortCode(){
    $title = wp_kses_post(get_the_title());
    return $title;
}

add_shortcode( 'postcard_title', 'theTitleShortCode' );

