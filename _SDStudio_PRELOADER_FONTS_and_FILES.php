<?php
/**
 * Включаем поддержку загрузки шрифтов
 */
function sdstudio_add_webp_mime_type_download_in_preload( $mimes ) {
    $mimes['woff'] = 'font/woff';
    $mimes['woff2'] = 'font/woff2';
    $mimes['ttf'] = 'font/ttf';
    return $mimes;
}
add_filter( 'upload_mimes', 'sdstudio_add_webp_mime_type_download_in_preload' );


/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * ENABLE_PRELOADs
 */
global $ENABLE_PRELOADs_sdstudio_page_speed_tolls;
$ENABLE_PRELOADs_sdstudio_page_speed_tolls = $redux['ENABLE_PRELOADs_sdstudio-page-speed-tolls'];

/**
 * ENABLE_PRELOADs
 */
global $ENABLE_PRELOADs_sdstudio_page_speed_tolls;
$ENABLE_PRELOADs_sdstudio_page_speed_tolls = $redux['ENABLE_PRELOADs_sdstudio-page-speed-tolls'];


if ($ENABLE_PRELOADs_sdstudio_page_speed_tolls == 1){

    /**
     * CSS PRELOAD INLINE
     */

    // Обрабатываем вывод стилей
    global $CSS_PRELOAD_SDStudio_page_speed_tools;
//    dd($CSS_PRELOAD_SDStudio_page_speed_tools);
    $CSS_PRELOAD_SDStudio_page_speed_tools = '<!-- SDStudio Speed Tools - CSS Preload START-->';
    $CSS_PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<style>';
        if (isset($redux['css_styles-slides']) && !empty($redux['opt-slides'])) {
            foreach ($redux['css_styles-slides'] as &$value) {
                $CSS_PRELOAD_SDStudio_page_speed_tools .= "\r\n /* " . $value['title'] . " */";
                $CSS_PRELOAD_SDStudio_page_speed_tools .= "\r\n" . $value['description'];
                //        s($value);
            }
            $CSS_PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '</style>';
            $CSS_PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<!-- SDStudio Speed Tools - CSS Preload END-->';
        }

        /**
         * FONTS PRELOAD INLINE
         */
        // Обрабатываем вывод шрифтов
        global $FONTS_PRELOAD_SDStudio_page_speed_tools;
        $FONTS_PRELOAD_SDStudio_page_speed_tools = '<!-- SDStudio Speed Tools - FONTS Preload START-->';
        $FONTS_PRELOAD_SDStudio_page_speed_tools .= "\r\n";

        // Узнать расширение файла на PHP
        function getExtension5($filename) {
            return array_pop(explode(".", $filename));
        }



        if (isset($redux['css_styles-slides']) && !empty($redux['opt-slides'])) {
            foreach ($redux['opt-slides'] as &$value) {
                //  <!-- Comfortaa-regular.woff -->
//                s('TEST');
                $FONTS_PRELOAD_SDStudio_page_speed_tools .= "\r\n <!-- " . $value['title'] . " -->";

                // Узнаем расширение шрифта
                $Extension = getExtension5($value['url']);
                if ($Extension == 'svg'){
                    $Extension = "type=\"image/svg+xml\"";
                } else {
                    $Extension = "type=\"font/$Extension\"";
                }

                // Реализуем <link rel="preload" href="" as="font" type="font/{расширенеи файла}" crossorigin="anonymous">
                $FONTS_PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<link rel="preload" as="font" href="'.$value['url'].'" '.$Extension.' crossorigin="anonymous">';
                //href="'.$value['image'].'" '.$Extension.' crossorigin="anonymous">';
//                $FONTS_PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<link rel="preload" href="'.$value['url'].'" as="font" type="font/'.$Extension.'" crossorigin="anonymous">';
                $FONTS_PRELOAD_SDStudio_page_speed_tools .= "\r\n";
            }
            $FONTS_PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<!-- SDStudio Speed Tools - FONTS Preload END -->';
            $FONTS_PRELOAD_SDStudio_page_speed_tools .= "\r\n";


        }
//        dd($FONTS_PRELOAD_SDStudio_page_speed_tools);

    /**
     * IMAGES for all pages PRELOAD INLINE
     */



    // Делаем проверку на наличие
    $sdstudio_page_speed_tools_images_for_all_pages_opt_slides = $redux['sdstudio_page_speed_tools_images_for_all_pages_opt-slides'];


//    if (!empty($sdstudio_page_speed_tools_images_for_all_pages_opt_slides['url'] ) || !empty($sdstudio_page_speed_tools_images_for_all_pages_opt_slides['image'])) {

    if (!empty($sdstudio_page_speed_tools_images_for_all_pages_opt_slides[0]['image'])) {
        global $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools;
        $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools = '<!-- SDStudio Speed Tools - IMAGES for all pages START-->';
        $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools .= "\r\n";


        foreach ($redux['sdstudio_page_speed_tools_images_for_all_pages_opt-slides'] as &$value) {
            //  <!-- Comfortaa-regular.woff -->
            $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools .= "\r\n <!-- " . $value['title'] . " -->";

            // Если изображение не установлено то используем кастомный URL
            if (empty($value['image'])){
                $value['image'] = $value['url'];
            }
            // Узнаем расширение изображения
            $Extension = getExtension5($value['image']);

            if ($Extension == 'svg'){
                $Extension = "as=\"image\" type=\"image/svg+xml\"";
            } else {
                $Extension = "as=\"image\" type=\"image/$Extension\"";
            }

            // Реализуем <link rel="preload" href="*" as="font" type="image/svg+xml" crossorigin="anonymous">
            $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<link rel="preload" href="'.$value['image'].'" '.$Extension.' crossorigin="anonymous">';
            $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools .= "\r\n";
        }
        $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<!-- SDStudio Speed Tools - IMAGES for all pages END-->';
        $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools .= "\r\n";

//        dd($IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools);
    }



    /**
     * 📌 IMAGES INLY FOR MAIN PRELOAD INLINE
     */
    // Делаем проверку на наличие
    $sdstudio_page_speed_tools_images_ONLY_FOR_MAIN_page_opt_slides = $redux['sdstudio_page_speed_tools_images_ONLY_FOR_MAIN_page_opt-slides'];


    if (!empty($sdstudio_page_speed_tools_images_ONLY_FOR_MAIN_page_opt_slides['url'])) {
        global $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools;
        $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools = '<!-- SDStudio Speed Tools - ONLY FOR MAIN PAGE START-->';
        $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools .= "\r\n";


        foreach ($redux['sdstudio_page_speed_tools_images_ONLY_FOR_MAIN_page_opt-slides'] as &$value) {
            //  <!-- Comfortaa-regular.woff -->
            $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools .= "\r\n <!-- " . $value['title'] . " -->";

            // Если изображение не установлено то используем кастомный URL
            if (empty($value['image'])){
                $value['image'] = $value['url'];
            }

            // Узнаем расширение изображения
            $Extension = getExtension5($value['image']);
            if ($Extension == 'svg'){
                $Extension = "as=\"image\" type=\"image/svg+xml\"";
            } else {
                $Extension = "as=\"image\" type=\"image/$Extension\"";
            }

            // Реализуем <link rel="preload" href="*" as="font" type="image/svg+xml" crossorigin="anonymous">
            $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<link rel="preload" href="'.$value['image'].'" '.$Extension.' crossorigin="anonymous">';
            $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools .= "\r\n";
        }
        $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools .= "\r\n" . '<!-- SDStudio Speed Tools - ONLY FOR MAIN PAGE END-->';
        $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools .= "\r\n";

    }

    /**
     * HTML PASTED for all pages
     */
    // Вставляем стили в тело страницы
    if (!empty($CSS_PRELOAD_SDStudio_page_speed_tools)){
        add_action('wp_head', 'PRELOAD_CSS_STYLES_SDStudio',20);
        function PRELOAD_CSS_STYLES_SDStudio()
        {
            global $CSS_PRELOAD_SDStudio_page_speed_tools;
            global $FONTS_PRELOAD_SDStudio_page_speed_tools;
            global $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools;

            if (!empty($CSS_PRELOAD_SDStudio_page_speed_tools)){
                echo $CSS_PRELOAD_SDStudio_page_speed_tools;
            }

            if (!empty($FONTS_PRELOAD_SDStudio_page_speed_tools)){
//                echo $FONTS_PRELOAD_SDStudio_page_speed_tools;
                /**
                 * Проверяем на пустоту - $FONTS_PRELOAD_SDStudio_page_speed_tools
                 */
//                dd($FONTS_PRELOAD_SDStudio_page_speed_tools);
                if (!strpos($FONTS_PRELOAD_SDStudio_page_speed_tools, '<link rel="preload" as="font" href="" type="font/" crossorigin="anonymous">')){
                    echo $FONTS_PRELOAD_SDStudio_page_speed_tools ;
                }
            }

            if (!empty($IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools)){
                echo $IMAGES_for_all_pages__PRELOAD_SDStudio_page_speed_tools;
            }


        }
    }

    /**
     * HTML PASTED ONLY FOR MAIN PAGE
     */
    // Вставляем стили в тело страницы
    global $wp_query;
    global $post;

    add_action('wp', function () {

        if (is_front_page()) {
//            s('wedfw');
//            global $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools;
//            s($IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools);
            add_action('wp_head', 'CSS_PRELOAD_ONLY_FOR_MAIN_PAGE_SDStudio_page_speed_tools',25);
            function CSS_PRELOAD_ONLY_FOR_MAIN_PAGE_SDStudio_page_speed_tools()
            {
                global $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools;

                if (!empty($IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools)){
                    echo $IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools;
                }
            }
        }
    });


    if (!empty($IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools) && is_front_page()){
//        dd($IMAGES_ONLY_FOR_MAIN_PAGE__PRELOAD_SDStudio_page_speed_tools);

    }
//            echo $CSS_PRELOAD_SDStudio_page_speed_tools;


        //    echo 'Slide 1 Title: ' . $redux['opt-slides'][0]['title'];
        //    echo 'Slide 1 Description: ' . $redux['opt-slides'][0]['description'];
        //    echo 'Slide 1 URL: ' . $redux['opt-slides'][0]['url'];
        //    echo 'Slide 1 Attachment ID: ' . $redux['opt-slides'][0]['attachment_id'];
        //    echo 'Slide 1 Thumb: ' . $redux['opt-slides'][0]['thumb'];
        //    echo 'Slide 1 Image: ' . $redux['opt-slides'][0]['image'];
        //    echo 'Slide 1 Width: ' . $redux['opt-slides'][0]['width'];
        //    echo 'Slide 1 Height: ' . $redux['opt-slides'][0]['height'];
//        }
//    }

}

if ($ENABLE_PRELOADs_sdstudio_page_speed_tolls == 1){

    add_action('wp_head', 'PRELOADER_LOCAL_Google_Fonts',150);
    function PRELOADER_LOCAL_Google_Fonts(){

    }


//    add_action('wp_head', 'PRELOAD_Google_FONTS_and_FILES',150);
//    function PRELOAD_Google_FONTS_and_FILES()
//    {
//        echo "<link href=\"https://fonts.googleapis.com/css?family=OpenSans&Comfortaa&display=swap\" rel=\"stylesheet\">";
//    }

//    /**
//     * Подключение шрифтов через JS
//     * https://github.com/typekit/webfontloader
//     *
//     * не знаю... какая-то херня получается с ними. На прошлом проджекте все работало :/
//     */
//    add_action('wp_head', 'PRELOAD_FONTS_and_FILES',150);
//    function PRELOAD_FONTS_and_FILES()
//    {
//        echo "<script>
//
//             (function () {
//                    var done = false;
//                    var script = document.createElement(\"script\"),
//                    head = document.getElementsByTagName(\"head\")[0] || document.documentElement;
//                    //script.src = 'https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.26/webfontloader.js';
//                    script.src = '".sdstudio_page_speed_tolls__PLUGIN_URL."public/js/webfontloader.js';
////                    script.async = true;
//                    script.async = false;
//                    script.onload = script.onreadystatechange = function() {
//                        if ( ! done && ( ! this.readyState || this.readyState === \"loaded\" || this.readyState === \"complete\" ) ) {
//                            done = true;
//                            WebFont.load({
//
//                                /* SDStudio Google Fonts */
//                                /**/
//                                google: {
//                                    families: ['OpenSans','Comfortaa']
////                                    families: ['Poppins','Lato','Roboto']
//                                }
//                                /**/
//
//                                /* SDStudio CUSTOM */
//                                /*
//                                 custom: {
//                                    families: ['Lato','Poppins','Roboto'],
//                                    urls: ['/wp-content/plugins/sdstudio-page-speed-tolls/_fonts.css']
//                                  },
//                                  loading: function () { console.log(\"Loading fonts..\"); },
//                                  //active: function () { mutexFontsLoaded.fire(); },
//                                  fontinactive: function (font, fvd) { console.log(\"Could'nt load \" + font + \" font\"); },
//                                  inactive: function () { console.log(\"All fonts failed loading..Trying to load site anyway..\");
//                                    //mutexFontsLoaded.fire();
//                                  }
//                                */
//                            });
//                            script.onload = script.onreadystatechange = null;
//                        }
//                    };
//                    head.insertBefore(script, head.firstChild);
//                })();
//                </script>
//
//
//
//
//
//    <!--
//    <link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/lato-v16-latin_latin-ext-regular.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
//    <link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-600.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
//    <link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/lato-v16-latin_latin-ext-700.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
//    <link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-900italic.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
//    <link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-700.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
//    -->
//    ";
//    }

}
