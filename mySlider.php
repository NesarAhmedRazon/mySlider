<?php

/*
Plugin Name: mySlider
Plugin URI: https://github.com/NesarAhmedRazon/mySlider.git
Description: This is a WordPress Plugin to output custom post Type 'Project' as slidder on home page
Author: Nesar Ahmed
Version: 0.0.1
Author URI: https://github.com/NesarAhmedRazon/
*/

function make_shortcode(){
    wp_enqueue_style( 'slider-style', plugin_dir_url( __FILE__ ).'assets/slick/slick.css');
    wp_enqueue_style( 'slider-base', plugin_dir_url( __FILE__ ).'assets/base.css');
    wp_enqueue_script('slider-lib', plugin_dir_url( __FILE__ ).'assets/slick/slick.js', array(), null, true);
    wp_enqueue_script('slider-app', plugin_dir_url( __FILE__ ).'assets/app.js', array(), null, true);

if(is_page()){
    ob_start(); 
    $content = the_content();
    
    global $post;
 
    $myposts = get_posts( array(
        'post_type'  => 'project',
        'posts_per_page' => 5,
        'offset'         => 1,
        'category'       => 1
    ) );
 
    if ( $myposts ) {
        foreach ( $myposts as $post ) : 
            setup_postdata( $post ); ?>
            <div class="sliderContainer">
            <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            <?php endif; ?>
                <img src="<?php echo plugin_dir_url( __FILE__ );?>/assets/preview3.jpg">
                <img src="<?php echo plugin_dir_url( __FILE__ );?>/assets/preview2.jpg">
                <div class="swiper-slide">Slide 3</div>
        </div>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <?php
        endforeach;
        wp_reset_postdata();
    }
    ?>

        
    
    <?php $projectData = ob_get_clean();
    return $projectData;
}

    
}

add_shortcode( 'myslider', 'make_shortcode' );


function theTitleShortCode(){
    $title = get_the_title();
    return $title;
}

add_shortcode( 'mytitle', 'theTitleShortCode' );