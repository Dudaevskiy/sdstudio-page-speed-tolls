<?php

//# Removing external scripts in Elementor #//

// For Google Fonts:
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

// For Font Awesome Icons:
// Also works on none Elementor-pages
add_action( 'wp_enqueue_scripts', function() { wp_dequeue_style( 'font-awesome' ); }, 50 );

// To remove the Font Awesome http request as well:
add_action( 'elementor/frontend/after_enqueue_styles', function () { wp_dequeue_style( 'font-awesome' ); } );
// For Eicons:
add_action( 'elementor/frontend/after_enqueue_styles', function() { wp_dequeue_style( 'elementor-icons' ); } );