<?php
/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sds_editor_tools' );

/**
 * WEBP ENABLE
 */
global $ENABLE_WEBP_sdstudio_page_speed_tolls;
$ENABLE_WEBP_sdstudio_page_speed_tolls = $redux['ENABLE_WEBP_sdstudio-page-speed-tolls'];
/**
 * @param $buffer
 * @return Удаление из тела
 */
function callback($buffer) {
//    $buffer = str_replace('<link rel="preload" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">',' ',$buffer);
//    $buffer = preg_replace('<link rel="preload" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">',' ',$buffer);
////    $buffer = str_replace('<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">',' ',$buffer);
//    $buffer = str_replace('https://use.fontawesome.com/releases/v5.8.1/css/all.css','',$buffer);
////    /wp-content/plugins/sdstudio-page-speed-tolls/_Font Awesome/5.11.2/css/all.css
//    $buffer = str_replace('https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css','',$buffer);
//    $buffer = str_replace('<link rel=\'stylesheet\' id=\'contactus.fa.css-css\'  href=\'?ver=1.6.9\' type=\'text/css\' media=\'all\' />','',$buffer);
//    $buffer = str_replace('<link rel=\'stylesheet\' id=\'woodmart-style-css\'  href=\'https://top-podarok.by/wp-content/themes/woodmart/style.min.css\' type=\'text/css\' media=\'all\' />','',$buffer);
//    // $buffer = str_replace('https://top-podarok.by/wp-content/themes/woodmart/style.min.css','/wp-content/plugins/sdstudio-page-speed-tolls/_theme/woodmart/css/styles.css',$buffer);



//        $buffer = str_replace('.png);">', '.png.webp);">', $buffer);
//        $buffer = str_replace('.jpg);">', '.jpg.webp);">', $buffer);
//        $buffer = str_replace('.jpeg);">', '.jpeg.webp);">', $buffer);


        return $buffer;


}

function buffer_start() { ob_start("callback"); }
function buffer_end() { ob_end_flush(); }

//add_action('after_setup_theme', 'buffer_start');
//add_action('shutdown', 'buffer_end');