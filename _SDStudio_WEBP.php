<?php
/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * Кнопка "Черновик (*)" в панели админа на внешней части сайта
 */
global $ENABLE_WEBP_sdstudio_page_speed_tolls;
$ENABLE_WEBP_sdstudio_page_speed_tolls = $redux['ENABLE_WEBP_sdstudio-page-speed-tolls'];
//s($redux['ENABLE_WEBP_sdstudio-page-speed-tolls']);
if ($ENABLE_WEBP_sdstudio_page_speed_tolls == 1){

    function ENABLE_WEBP_REPLACE_for_images($buffer) {

        $buffer = str_replace('.png);"','.png.webp);"',$buffer);
        $buffer = str_replace('.jpg);"','.jpg.webp);"',$buffer);
        $buffer = str_replace('.jpeg);"','.jpeg.webp);"',$buffer);

        $buffer = str_replace('.png" class="','.png.webp);"',$buffer);
        $buffer = str_replace('.jpg" class="','.jpg.webp);"',$buffer);
        $buffer = str_replace('.jpg" class="','.jpeg.webp" class="',$buffer);

//    dd($buffer);
        return $buffer;
    }

    function buffer_start_ENABLE_WEBP_REPLACE_for_images() { ob_start("ENABLE_WEBP_REPLACE_for_images"); }
    function buffer_end_ENABLE_WEBP_REPLACE_for_images() { ob_end_flush(); }

    add_action('after_setup_theme', 'buffer_start_ENABLE_WEBP_REPLACE_for_images');
    add_action('shutdown', 'buffer_end_ENABLE_WEBP_REPLACE_for_images');

}