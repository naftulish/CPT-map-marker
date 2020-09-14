<?php

//enqueue scripts for front
function cptmm_enqueue_scripts() {

	wp_enqueue_style('leaflet-css',plugins_url() . '/CPT-map-marker/assets/leaflet/leaflet.css');
	wp_enqueue_script('leaflet-js', plugins_url().'/CPT-map-marker/assets/leaflet/leaflet-src.js', [], '1.0.0', true);

	wp_enqueue_style('cptmm-public-css',plugins_url().'/CPT-map-marker/assets/public/css/style.css');
    wp_enqueue_script('cptmm-public-js', plugins_url().'/CPT-map-marker/assets/public/js/script.js', [], '1.0.0', true);
	wp_enqueue_script('cptmm-map-js', plugins_url()."/CPT-map-marker/assets/public/js/map.js", ['leaflet-js'], '1.0.2', true);

}
add_action( 'wp_enqueue_scripts', 'cptmm_enqueue_scripts' );


//enqueue scripts for admin panel
function admin_cptmm_enqueue_scripts() {
	wp_enqueue_style('leaflet-css',plugins_url() . '/CPT-map-marker/assets/leaflet/leaflet.css');
	wp_enqueue_script('leaflet-js', plugins_url() . '/CPT-map-marker/assets/leaflet/leaflet-src.js', [], '1.0.0', true);

	wp_enqueue_style('cptmm-admin-css',plugins_url().'/CPT-map-marker/assets/admin/css/style.css');
    wp_enqueue_script('cptmm-admin-js', plugins_url().'/CPT-map-marker/assets/admin/js/script.js', ['leaflet-js'], '1.0.0', true);

    if (is_admin ()){ wp_enqueue_media ();}
}
add_action( 'admin_enqueue_scripts', 'admin_cptmm_enqueue_scripts' );
