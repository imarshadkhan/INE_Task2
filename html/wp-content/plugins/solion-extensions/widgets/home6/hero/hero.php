<?php

/**
* Adds new shortcode "home6hero-section-shortcode" and registers it to
* the WPBakery Visual Composer plugin
*
*/


// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
    die ('Silly human what are you doing here');
}


if ( ! class_exists( 'home6hero_section' ) ) {

    class home6hero_section {


        /**
        * Main constructor
        *
        */
        public function __construct() {

            // Registers the shortcode in WordPress
            add_shortcode( 'home6hero-section-shortcode', array( 'home6hero_section', 'output' ) );

            // Map shortcode to Visual Composer
            if ( function_exists( 'vc_lean_map' ) ) {
                vc_lean_map( 'home6hero-section-shortcode', array( 'home6hero_section', 'map' ) );
            }

        }


        /**
        * Map shortcode to VC
    *
    * This is an array of all your settings which become the shortcode attributes ($atts)
        * for the output.
        *
        */
        public static function map() {
            return array(
                'name'        => esc_html__( 'Home6 hero Section', 'tanda' ),
                'description' => esc_html__( 'home6 - hero Section', 'tanda' ),
                'base'        => 'vc_infobox',
                'category' => __('Home-6', 'tanda'),
                'icon' => plugin_dir_path( __FILE__ ) . 'assets/img/note.png',
                'params'      => array(

                    // home4hero Attributes
                    array(
                        'type'       => 'attach_image',
                        'holder' => 'img',
                        'heading' => esc_html__( 'Image', 'tanda' ),
                        'param_name' => 'heroimg',
                        // 'value' => __( 'Default value', 'tanda' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Image',
                    ),

                    array(
                        'type'       => 'attach_image',
                        'holder' => 'img',
                        'heading' => esc_html__( 'BG Image Top', 'tanda' ),
                        'param_name' => 'bgimg1',
                        // 'value' => __( 'Default value', 'tanda' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Image',
                    ),

                    array(
                        'type'       => 'attach_image',
                        'holder' => 'img',
                        'heading' => esc_html__( 'BG Image Bottom', 'tanda' ),
                        'param_name' => 'bgimg2',
                        // 'value' => __( 'Default value', 'tanda' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Image',
                    ),
                    
                    array(
                        'type' => 'textfield',
                        'holder' => 'h1',
                        'heading' => esc_html__( 'Active Class', 'tanda' ),
                        'param_name' => 'class',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h1',
                        'heading' => esc_html__( 'Title', 'tanda' ),
                        'param_name' => 'title',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h1',
                        'heading' => esc_html__( 'Heading', 'tanda' ),
                        'param_name' => 'heading',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h1',
                        'heading' => esc_html__( 'Bold Text', 'tanda' ),
                        'param_name' => 'bold',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h1',
                        'heading' => esc_html__( 'Button Text', 'tanda' ),
                        'param_name' => 'bttext1',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Button',
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h1',
                        'heading' => esc_html__( 'Button Link', 'tanda' ),
                        'param_name' => 'btlink1',
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Button',
                    ),

                    
                ),
            );
        }


        /**
        * Shortcode output
        *
        */
        public static function output( $atts = null ) {

            extract(
                shortcode_atts(
                    array(
                        'class' => '',
                        'heroimg' => 'heroimg',
                        'bgimg1' => 'bgimg1',
                        'bgimg2' => 'bgimg2',
                        'title'   => '',
                        'heading' => '',
                        'bold' => '',
                        'btlink1'   => '',
                        'bttext1'   => '',
                    ),
                    $atts
                )
            );

        $img_url = wp_get_attachment_image_src( $heroimg, "full");
        $img_url1 = wp_get_attachment_image_src( $bgimg1, "full");
        $img_url2 = wp_get_attachment_image_src( $bgimg2, "full");
        

        // Fill $html var with data
        $html = '<div class="carousel-item '. $class .'">
    <div class="slider-thumb bg-cover" style="background-image: url('. $img_url[0] .');"></div>
    <div class="box-table">
        <!-- Shape -->
        <div class="shape">
            <img src="'. $img_url1[0].'" alt="Shape">
            <img src="'. $img_url2[0].'" alt="Shape">
        </div>
        <!-- End Shape -->
        <div class="box-cell shadow dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="content">
                            <h4 data-animation="animated fadeInUp">'. $title .'</h4>
                            <h2 data-animation="animated fadeInUp">'. $heading .' <strong>'. $bold .'</strong></h2>
                            <a data-animation="animated fadeInUp" class="btn btn-theme effect btn-md" href="'. $btlink1 .'">'. $bttext1 .'</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';

        return $html;

        }

    }

}
new home6hero_section;