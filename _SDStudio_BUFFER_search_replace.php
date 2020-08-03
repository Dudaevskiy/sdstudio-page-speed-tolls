<?php
//dd('$buffer');
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

//function SDSTool_global_callback($buffer) {
//
//    /**
//     * Elementor - Удаление стиля FontAwesome all.min.css
//     */
//    $re = '/<link rel=\'stylesheet\' id=\'font-awesome-5-all-css\'  href=\'http(.+?)\/wp-content\/plugins\/elementor\/assets\/lib\/font-awesome\/css\/all\.min\.css\'  media=\'all\' \/>/m';
//    $buffer = preg_replace($re,' ',$buffer);
//    /**
//     * END
//     */
//
//
//    return $buffer;
//
//}
//
//function buffer_start() { ob_start("SDSTool_global_callback"); }
//function buffer_end() { ob_end_flush(); }
//
//add_action('after_setup_theme', 'buffer_start');
//add_action('shutdown', 'buffer_end');