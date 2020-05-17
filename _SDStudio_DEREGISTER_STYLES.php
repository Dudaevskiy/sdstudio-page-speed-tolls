<?php

add_action( 'wp_print_styles', 'deregister_my_styles', 100 );
function deregister_my_styles() {
    wp_deregister_style( 'xts-google-fonts' );
//    wp_deregister_style( 'contactus.fa.css' );
//    wp_deregister_style( 'font-awesome' );
//    wp_deregister_style( 'font-awesome-css' );
//    wp_deregister_style( 'yit_font_awesome_list' );
}


/**
 * Отключаем
 *
 */
function dequeue_dequeue_plugin_style(){
    // wp_dequeue_style( 'woodmart-style' ); //Name of Style ID.
    // wp_deregister_style('woodmart-style');
}
// add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 100 );
//add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 9999 );
//add_action( 'wp_head', 'dequeue_dequeue_plugin_style', 9999 );



// https://xenforo.info/resources/font-awesome-5-%D0%9B%D0%BE%D0%BA%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F-%D1%83%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0-%D0%B8-%D0%BF%D0%BE%D0%B4%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D0%B8%D0%B5.6085/

//function utm_user_scripts() {
////    $plugin_url = plugin_dir_url( __FILE__ );
//
//    wp_enqueue_style( 'fonts-custom', plugin_dir_url( __FILE__ ) . 'public/css/fonts.css');
//
//    wp_enqueue_style( 'Font_Awesome_5_11_2', plugin_dir_url( __FILE__ ) . '_Font Awesome/5.11.2/css/all.css');
//
//}

// add_action( 'admin_print_styles', 'utm_user_scripts' );