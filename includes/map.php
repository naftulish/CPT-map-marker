<?php

/*
    Print short code for map
*/

function cptmm_get_map($atts = []){
    
    $maps = [];

    $args = array(
        'post_type' => explode(',', esc_html(get_option('cptmm_post_types_support'))),
        'posts_per_page' => -1,
        'meta_query'    => array(
        array(
            'key'       => 'cptmm_show_on_map',
            'value'     => 'on',
            'compare'   => '==',
        )
    )

    );

    $the_query = new WP_Query($args);
    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            //checks if show on map is true
            if(get_post_meta($the_query->post->ID, 'cptmm_show_on_map', true)){

                //get icon
                $icon =  esc_html(get_post_meta( $the_query->post->ID, 'cptmm_icon_url', true));
                $default_icon = esc_html(get_option('cptmm_default_icon_url'));

                //get popUp text - replace '\n' in <br>
                $pop_up =  str_replace("\n","<br>",get_post_meta( $the_query->post->ID, 'cptmm_popup_text', true));

                //explode Coordinate to array
                $plc = explode(",", esc_html(get_post_meta($the_query->post->ID, 'cptmm_coordinate', true)));

                $link_to_post =  esc_html(get_post_meta( $the_query->post->ID, 'cptmm_link_to_post', true));

                if($link_to_post){
                    $link_to_post = get_permalink($the_query->post->ID);
                }else{
                    $link_to_post = '';
                }

                $text_link_to_post =  esc_html(get_post_meta( $the_query->post->ID, 'cptmm_text_link_to_post', true));

                //add to Array of the markers
                $maps[] = [
                    'Latitude' => $plc[0] ,
                    'Longitude' => $plc[1],
                    'icon' => $icon, 
                    'default_icon' => $default_icon, 
                    'popUp' => $pop_up,
                    'link' => $link_to_post,
                    'textLink' => $text_link_to_post
                ];
            }
        }
    }
    wp_reset_query();

    wp_reset_postdata();

    //adds the array of places to the js object for the js forEach
    wp_localize_script('cptmm-public-js', 'cptmm_script_map',  $maps);
    wp_localize_script('cptmm-public-js', 'cptmm_script_map_settings',  array('geo' => get_option('cptmm_users_location_allowed')));

    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);
 
    // override default attributes with user attributes
    $wporg_atts_1 = shortcode_atts(['width' => '500px',], $atts, 'width');
    $wporg_atts_2 = shortcode_atts(['height' => '350px',], $atts, 'height');
    $wporg_atts_3 = shortcode_atts(['lat' => '51.505',], $atts, 'lat');
    $wporg_atts_4 = shortcode_atts(['lng' => '-0.09',], $atts, 'lng');
     

    $cptmm_width = $wporg_atts_1['width'];
    $cptmm_height = $wporg_atts_2['height'];
    $cptmm_lat = $wporg_atts_3['lat'];
    $cptmm_lng = $wporg_atts_4['lng'];

    $html = "<div id='cptmm_map' data-width='$cptmm_width' data-height='$cptmm_height' data-lat='$cptmm_lat' data-lng='$cptmm_lng' ></div>";
    return $html;
}

add_shortcode('cptmm_map' , 'cptmm_get_map');



