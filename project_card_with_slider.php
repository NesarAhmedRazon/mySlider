<?php

/*
Plugin Name: Project Card With slider
Plugin URI: https://github.com/NesarAhmedRazon/mySlider.git
Description: This is a WordPress Plugin to output custom post Type 'Project' as slidder on home page
Author: Nesar Ahmed
Version: 0.0.1
Author URI: https://github.com/NesarAhmedRazon/
*/
function make_postcards($attr, $content = null){
    wp_enqueue_style( 'slider-style', plugin_dir_url( __FILE__ ).'assets/slick/slick.css');
    wp_enqueue_style( 'slider-base', plugin_dir_url( __FILE__ ).'assets/base.css');
    wp_enqueue_script('slider-lib', plugin_dir_url( __FILE__ ).'assets/slick/slick.js', array(), null, true);
    wp_enqueue_script('slider-app', plugin_dir_url( __FILE__ ).'assets/app.js', array(), null, true);
 
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
 
    echo '<div class="post_card_container">';
 
    foreach ($recent_posts as $post) :
         
        setup_postdata($post);
            $content = apply_filters( 'the_content', get_the_content() );
        echo '<div class="postcard">';
        echo '<div class="sliderContainer">';
        echo '<div class="slider" id="slide_'.$post->ID.'" data-slick=\'{"asNavFor": "#slideNav_'.$post->ID.'"}\'>';
                if(has_post_thumbnail( )){
                    echo '<img src="'.get_the_post_thumbnail_url().'">';
                }
                if( class_exists('Dynamic_Featured_Image') ):
                    global $dynamic_featured_image;
                    $featured_images = $dynamic_featured_image->get_featured_images( $post->ID );

                    if ( $featured_images ):
                        foreach( $featured_images as $images ):
                            echo '<img src="'.$images['full'].'" alt="">';                            
                        endforeach; 
                    endif;
                endif;
                
        echo '</div>'; // Main Slide End
        echo '<div class="prev btn"></div><div class="next btn"></div>';
        echo '</div>'; // Slide container
        echo '<div class="postcard_body">'.$content;
        echo '<div class="sliderNavcontainer">';
        echo '<div class="slider-nav" id="slideNav_'.$post->ID.'" data-slick=\'{"asNavFor": "#slide_'.$post->ID.'"}\'>';
                if(has_post_thumbnail( )){
                    echo '<img src="'.get_the_post_thumbnail_url($post->ID,'thumbnail').'">';
                }
                if( class_exists('Dynamic_Featured_Image') ):
                    global $dynamic_featured_image;
                    $featured_images = $dynamic_featured_image->get_featured_images( $post->ID );

                    if ( $featured_images ):
                        foreach( $featured_images as $images ):
                            echo '<img src="'.$images['thumb'].'" alt="">';                            
                        endforeach; 
                    endif;
                endif;
        echo '</div>'; // Nav Slider End
        echo '<div class="prev btn"></div><div class="next btn"></div>';
        echo '</div>'; // Nav Slider container End
        echo '</div>'; // Body Content end
        echo '</div>'; // PostCard End
                         

    endforeach;    
     
    wp_reset_postdata();
 
    echo '</div><style>.btn:before{background-image:url("'.plugin_dir_url(__File__ ).'assets/arrow.svg");}</style>';
 
}
add_shortcode( 'postcards', 'make_postcards' ); 




function activate_postcard() {
    theTitleShortCode();
} 

register_activation_hook( __FILE__, 'activate_postcard' );

function theTitleShortCode(){
    $title = wp_kses_post(get_the_title());
    return $title;
}

add_shortcode( 'postcard_title', 'theTitleShortCode' );

