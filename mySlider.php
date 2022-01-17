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


    ob_start(); ?>

        <div class="sliderContainer">
                <img src="<?php echo plugin_dir_url( __FILE__ );?>/assets/preview3.jpg">
                <img src="<?php echo plugin_dir_url( __FILE__ );?>/assets/preview2.jpg">
                <div class="swiper-slide">Slide 3</div>
            </div>  
        
    <?php $projectData = ob_get_clean();
return $projectData;
    
}

add_shortcode( 'myslider', 'make_shortcode' );