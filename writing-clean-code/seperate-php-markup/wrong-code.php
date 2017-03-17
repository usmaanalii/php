<?php
    add_shortcode( 'faq', function ()
    {
        $posts = get_posts( array(
            'numberposts' => 10,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_type' => 'faq'
        ));

        $faq = '<div id="wptuts-accordion">'; // Open the container

        foreach ($posts as $post) { // Generate the markup for each
            $faq .= sprintf( '<h3><a href="">%1$s</h3><div>%2$s</div>' );
            $post->post_title;
            wpautop( $post->post_content );
        }

        $faq .= '</div>'; // Close the container

        return $faq; // Return the HTML
    });
?>
