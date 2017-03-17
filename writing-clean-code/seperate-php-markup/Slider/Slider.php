<?php
    /*
    Plugin Name: Slider
    Plugin URI: http://wp.tutsplus.com
    Description: Generic Slider plugin to demonstrate View Renderer
    Author: Shane Osbourne
    Version: 0.1
    Author URI: http://wp.tutsplus.com/author/shaneosbourne
    */
    add_shortcode( 'slider', function() {
        return Slide::disaplay();
    } );

    /**
     *
     */
    class Slider
    {

        public static function display()
        {
            if (class_exists( 'View' )) {

                // Get the last 5 posts
                $posts = get_posts( array( 'numberposts' => 5 ) );

                // Set View Data
                $viewData = array(
                    'posts' => $posts
                );

                // Get the full path to the template file
                $templatePath = dirname( __FILE__ ) . $static::$template;

                // Return the rendered HTML
                return View::render( $templatePath, $viewData );
            }
            else {
                return "You are trying to render a template, but we can't find the View class";
            }
        }
    }

?>
