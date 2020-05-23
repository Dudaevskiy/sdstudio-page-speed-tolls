<?php

//Download and Insert a Remote Image File into the WordPress Media Library
//https://kellenmace.com/download-insert-remote-image-file-wordpress-media-library/
// Require the file that contains the KM_Download_Remote_Image class.

// Подключаем в основном файле плагина
// require_once plugin_dir_path( __FILE__ ) . '_WORKER.php';
// Заменяем sdstudio-page-speed-tolls на свой слаг плагина

//https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';


// Путь в корень плагина
define( 'sdstudio_page_speed_tolls__PLUGIN_DIR' , plugin_dir_path(__FILE__) );
// URL плагина
define( 'sdstudio_page_speed_tolls__PLUGIN_URL' , plugin_dir_url(__FILE__) );

$MarkdownParser = new \cebe\markdown\Markdown();
//global $MarkDownImageFolder_sdstudio_page_speed_tolls;
$MarkDownImageFolder_sdstudio_page_speed_tolls = sdstudio_page_speed_tolls__PLUGIN_URL.'_markdown/images/';



// Название плагина
//$plugin_data = get_plugin_data( __FILE__ );
$plugin_name = SDStudioPluginName_sdstudio_page_speed_tolls();
$plugin_version = SDStudioPluginVersion_sdstudio_page_speed_tolls();

$plugin_name_title_menu = 'SDStudio Page Speed tolls';
//$menu_icon = 'dashicons-admin-tools';
$menu_icon = 'dashicons-backup';

// Social URLs
$SDStudio_github_com = 'https://github.com/Dudaevskiy';
$SDStudio_facebook_com = 'https://www.facebook.com/WebSDStudio/';
$SDStudio_site = '//sdstudio.top/';
$SDStudio_linkedin_com = 'https://www.linkedin.com/public-profile/settings?trk=d_flagship3_profile_self_view_public_profile&lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_self_edit_contact_info%3BhWD%2Fwa9lSmWLHB9H6SsiWA%3D%3D';



if ( !function_exists( 'run_prettify' ) && is_admin()){

    add_action( 'wp_enqueue_scripts', 'run_prettify' );

    function run_prettify(){
        wp_enqueue_script( 'run_prettify', 'https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js');
    }
}

if (!class_exists('ReduxFramework') && file_exists(plugin_dir_path(__FILE__) . 'wp-content/plugins/redux-framework-4/ReduxCore/framework.php')) {
//==========================================
//==========================================
// Подключаем Redux
    // Redux Framework
    require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

    require_once plugin_dir_path( __FILE__ ) . '/wp-content/plugins/redux-framework-4/ReduxCore/framework.php';

//Redux::setSection($opt_name__redux_sds_options_and_settings, array(    'title' => esc_html__('Section title', 'yourtextdomain') ,    'id' => esc_html__('section-unique-id', ' yourtextdomain') ,    'icon' => 'icon-name',    'fields' => array()));

//==========================================
//==========================================
}
if ( ! class_exists( 'Redux' ) ) {
    return null;
}

//-----------------------------------------
// REMOVE DEMO and PROMO REDUX
// START
//-----------------------------------------
/**
 * Disable Redux Developer Mode dev_mode
 * https://asique.net/disable-redux-framework-developer-mode-dev_mode/
 * START
 */

if ( !function_exists( 'redux_disable_dev_mode_plugin' ) ) {

    function redux_disable_dev_mode_plugin( $redux ) {
        if ( $redux->args[ 'opt_name' ] != 'redux_demo' ) {
            $redux->args[ 'dev_mode' ] = false;
            $redux->args[ 'forced_dev_mode_off' ] = false;
        }
    }

    add_action( 'redux/construct', 'redux_disable_dev_mode_plugin' );
}

if ( !function_exists( 'gl_removeDemoModeLink' ) ) {
    function gl_removeDemoModeLink() {
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', [ ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks' ], null, 2 );
        }
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_action( 'admin_notices', [ ReduxFrameworkPlugin::get_instance(), 'admin_notices' ] );
        }
    }
    add_action( 'init', 'gl_removeDemoModeLink' );
}


/**
 * END
 * Disable Redux Developer Mode dev_mode
 */
add_action( 'redux/loaded', 'remove_demo' );


/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 * https://forums.envato.com/t/how-to-remove-redux-framework-notice/62645/4
 * START
 */
if ( ! function_exists( 'remove_demo' ) ) {
    function remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', [
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ], null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', [ ReduxFrameworkPlugin::instance(), 'admin_notices' ] );
        }
    }
}
/**
 * END
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 * https://forums.envato.com/t/how-to-remove-redux-framework-notice/62645/4
 */

/**
 * https://docs.reduxframework.com/core/the-basics/removing-demo-mode-and-notices/
 * START
 */
if ( ! function_exists( 'removeDemoModeLink' ) ) {
    function removeDemoModeLink() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', [ ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'], null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', [ ReduxFrameworkPlugin::get_instance(), 'admin_notices' ] );
        }
    }
    add_action('init', 'removeDemoModeLink');
}
/**
 * END
 * https://docs.reduxframework.com/core/the-basics/removing-demo-mode-and-notices/
 */
Redux::disable_demo();
//-----------------------------------------
// END
// REMOVE DEMO and PROMO REDUX
//-----------------------------------------



// This is your option name where all the Redux data is stored.
//dd($opt_name__redux_sdstudio_page_speed_tolls);
$opt_name__redux_sdstudio_page_speed_tolls = 'redux_sdstudio_page_speed_tolls';
//Redux::init($opt_name__redux_sdstudio_page_speed_tolls);
/**
 * GLOBAL ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: @link https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 */

/**
 * ---> BEGIN ARGUMENTS
 */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = [
    // REQUIRED!!  Change these values as you need/desire.
    'opt_name'                  => $opt_name__redux_sdstudio_page_speed_tolls,

    'ajax_save'                 => true,

    // Name that appears at the top of your panel.
//    'display_name'              => $theme->get( 'Name' ),
    'display_name'              => $plugin_name,

    // Version that appears at the top of your panel.
    'display_version'           => $plugin_version,

    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
    'menu_type'                 => 'menu',

    // Show the sections below the admin menu item or not.
    'allow_sub_menu'            => true,

    'menu_title'                => esc_html__( $plugin_name_title_menu, 'sdstudio-page-speed-tolls' ),
//    'menu_title'                => esc_html__( 'SDStudio Updater Data Year Posts', 'sdstudio-page-speed-tolls' ),
    'page_title'                => esc_html__( $plugin_name, 'sdstudio-page-speed-tolls' ),
//    'page_title'                => esc_html__( 'SDStudio Updater Data Year Posts', 'sdstudio-page-speed-tolls' ),

    // Specify a custom URL to an icon.
//    'menu_icon'                 => 'dashicons-welcome-widgets-menus',
    'menu_icon'                 => $menu_icon,

    // Use a asynchronous font on the front end or font string.
    'async_typography'          => true,

    // Disable this in case you want to create your own google fonts loader.
    'disable_google_fonts_link' => false,

    // Show the panel pages on the admin bar.
    'admin_bar'                 => false,

    // Choose an icon for the admin bar menu.
    'admin_bar_icon'            => $menu_icon,

    // Choose an priority for the admin bar menu.
    'admin_bar_priority'        => 50,

    // Set a different name for your global variable other than the opt_name.
    'global_variable'           => '',

    // Show the time the page took to load, etc.
    'dev_mode'                  => false,

    // Enable basic customizer support.
    'customizer'                => false,

    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_priority'             => null,

    // For a full list of options, visit: @link http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
    'page_parent'               => 'themes.php',

    // Permissions needed to access the options panel.
    'page_permissions'          => 'manage_options',


    // Force your panel to always open to a specific tab (by id).
    'last_tab'                  => '',

    // Icon displayed in the admin panel next to your menu_title.
    'page_icon'                 => 'icon-themes',

    // Page slug used to denote the panel.
    'page_slug'                 => 'sdstudio-page-speed-tolls',

    // On load save the defaults to DB before user clicks save or not.
    'save_defaults'             => true,

    // If true, shows the default value next to each field that is not the default value.
    'default_show'              => false,

    // What to print by the field's title if the value shown is default. Suggested: *.
    'default_mark'              => '',

    // Shows the Import/Export panel when not used as a field.
    'show_import_export'        => true,

    // CAREFUL -> These options are for advanced use only.
    'transient_time'            => 60 * MINUTE_IN_SECONDS,

    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
    'output'                    => true,

    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
    'output_tag'                => true,

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'database'                  => '',

    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    'use_cdn'                   => true,
    'compiler'                  => true,

    // HINTS.
    'hints'                     => [
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => [
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ],
        'tip_position'  => [
            'my' => 'top left',
            'at' => 'bottom right',
        ],
        'tip_effect'    => [
            'show' => [
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ],
            'hide' => [
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ],
        ],
    ],
];

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = [
    'id'    => 'redux-docs',
    'href'  => '//docs.reduxframework.com/',
    'title' => esc_html__( 'Documentation', 'your-domain-here' ),
];

$args['admin_bar_links'][] = [
    'id'    => 'redux-support',
    'href'  => '//github.com/ReduxFramework/redux-framework/issues',
    'title' => esc_html__( 'Support', 'your-domain-here' ),
];

$args['admin_bar_links'][] = [
    'id'    => 'redux-extensions',
    'href'  => 'reduxframework.com/extensions',
    'title' => esc_html__( 'Extensions', 'your-domain-here' ),
];

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// http://elusiveicons.com/icons/
$args['share_icons'][] = [
//    'url'   => 'https://github.com/Dudaevskiy',
    'url'   => $SDStudio_github_com,
    'title' => 'Visit us on GitHub',
    'target' => '_blank',
    'icon'  => 'el el-github',
];
$args['share_icons'][] = [
//    'url'   => 'https://www.facebook.com/WebSDStudio/',
    'url'   => $SDStudio_facebook_com,
    'title' => esc_html__( 'Like us on Facebook', 'sdstudio-page-speed-tolls' ),
    'target' => '_blank',
    'icon'  => 'el el-facebook',
];
$args['share_icons'][] = [
//    'url'   => '//sdstudio.top/',
    'url'   => $SDStudio_site,
    'title' => esc_html__( 'Website', 'sdstudio-page-speed-tolls' ),
    'target' => '_blank',
    'icon'  => 'el el-home',
];
$args['share_icons'][] = [
//    'url'   => 'https://www.linkedin.com/public-profile/settings?trk=d_flagship3_profile_self_view_public_profile&lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_self_edit_contact_info%3BhWD%2Fwa9lSmWLHB9H6SsiWA%3D%3D',
    'url'   => $SDStudio_linkedin_com,
    'title' => esc_html__( 'FInd us on LinkedIn', 'sdstudio-page-speed-tolls' ),
    'target' => '_blank',
    'icon'  => 'el el-linkedin',
];

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
    if ( ! empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
//
} else {
//
}


Redux::set_args( $opt_name__redux_sdstudio_page_speed_tolls, $args );

/*
 * ---> END ARGUMENTS
 */


/* -> START Basic Fields. */

$kses_exceptions = [
    'a'      => [
        'href' => [],
    ],
    'strong' => [],
    'br'     => [],
];


/***************************************
 * FIELDS START
 ***************************************/

$faq = $MarkdownParser->parse( file_get_contents(dirname(__FILE__) . '/_markdown/faq.md') );
$section = [
    'title' => __( 'FAQ', 'sdstudio-page-speed-tollsyour-domain-here-sdstudio_page_speed_tolls' ),
    'id'    => 'basic',
    'desc'  => $faq,
    'icon'  => 'el el-home',
];

Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );

/**
 * UPDAE ALL POSTS
 * START
 *********************************/

//dd($MarkDownImageFolder);
//$MarkDownImageFolder = 'plugins/sdstudio-page-speed-tolls/_markdown/images/drafts.jpg'
//$OO1_Saxon_icons2 = '<img src="'.$MarkDownImageFolder_sdstudio_page_speed_tolls.'001_Saxon_icons2.woff2.jpg">';
//dd($OO1_Saxon_icons2);
//$img_drafts_front = '<img src="'.$MarkDownImageFolder_sdstudio_page_speed_tolls.'drafts_frontend.jpg">';




//$section = [
//    'title' => __( 'Поиск и замена в RAW теле страницы', 'sdstudio-page-speed-tolls' ),
//    'id'    => 'BUFFER_SEARCH_AND_REPLACE_sdstudio-page-speed-tolls',
//    'subsection' => false,
//    // Иконки брать здесь
//    // http://elusiveicons.com/icons/
//    'icon'  => 'el el-screenshot',
//    'fields' => [
//        [
//            //Link: https://docs.redux.io/core-fields/switch.html
//            'id'       => 'ENABLE_BUFFER_SEARCH_AND_REPLACE_sdstudio-page-speed-tolls',
//            'type'     => 'switch',
//            'title'    => __('Включить поиск и замену в теле страницы', 'sdstudio-page-speed-tolls'),
////            'subtitle' => $img_drafts,
//            'desc'  => __('Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
////                'required' => array('enable_sweetalert2', '=', 'true' ),
//            //                                'desc' => '<br><br>',
//            'default'  => false,
//        ],
//
//    ],
//    'desc'  => __( 'После включения жданной опции появляется возможность поиска и замены во всем HTML страницы, прямо перед отображением её в браузере. ', 'your-domain-here' ),
//
//];
//Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );

/**
 * WEBP
 */

//$section = [
//    'title' => __( 'Все для WebP ', 'sdstudio-page-speed-tolls' ),
//    'id'    => 'WEBP_sdstudio-page-speed-tolls',
//    'subsection' => false,
//    // Иконки брать здесь
//    // http://elusiveicons.com/icons/
//    'icon'  => 'el el-picture',
//    'fields' => [
//        [
//            //Link: https://docs.redux.io/core-fields/switch.html
//            'id'       => 'ENABLE_WEBP_sdstudio-page-speed-tolls',
//            'type'     => 'switch',
//            'title'    => __('Включить перезапись CSS фонов в теле HTML', 'sdstudio-page-speed-tolls'),
////            'subtitle' => $img_drafts,
//            'desc'  => __('После активации все фоновые изображения которые присутствуют в HTML верстке документа, будут иметь окончание .webp. Например ранее блок был: <code>style="background-image: url(https://exemple.com/wp-content/uploads/2020/05/glass-number-color-bead-circle-blogging-919915-pxhere.com_-555x360.jpg);"</code> посе применения функции блок будет выглядеть так: <code>style="background-image: url(https://exemple.com/wp-content/uploads/2020/05/glass-number-color-bead-circle-blogging-919915-pxhere.com_-555x360.jpg.webp);"</code> .Для включения установите переключатель в положение "On". По умолчанию опция выключена.<br><b>Данную опцию стоит включать только в случае полной уверенности в том что на сайте активен плагин который конвертирует все изображения в webp</b>. Например такой как <a target="_blank" href="https://ru.wordpress.org/plugins/ewww-image-optimizer/">EWWW Image Optimizer</a>', 'sdstudio-page-speed-tolls'),
////                'required' => array('enable_sweetalert2', '=', 'true' ),
//            //                                'desc' => '<br><br>',
//            'default'  => false,
//        ],
//
//    ],
//    'desc'  => __( 'После включения данной опции появляется возможность поиска и замены .jpg,.jpeg,.png путей к изображениям во всем HTML страницы. Все выполняется перед отображением страницы в браузере. ', 'your-domain-here' ),
//
//];
//Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );



/**
 * Font Awesome 5
 */
$section = [
    'title' => __( 'Font Awesome 5', 'sdstudio-page-speed-tolls' ),
    'id'    => 'Font_Awesome_5_sdstudio-page-speed-tolls',
    'subsection' => false,
    // Иконки брать здесь
    // http://elusiveicons.com/icons/
    'icon'  => 'el el-eye-open',
    'fields' => [
        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_Font_Awesome_5_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Включить локальный Font Awesome 5', 'sdstudio-page-speed-tolls'),
//            'subtitle' => $img_drafts,
            'desc'  => __('После активации опции, будет подставлен шрифт Font Awesome 5 из плагина SDStudio page speed tolls.Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
//                'required' => array('enable_sweetalert2', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],

    ],
//    'desc'  => __( 'После включения данной опции появляется возможность поиска и замены .jpg,.jpeg,.png путей к изображениям во всем HTML страницы. Все выполняется перед отображением страницы в браузере. ', 'your-domain-here' ),

];
Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );

/**
 * PLUGINs FIXs - Фиксы для плагинов
 */
$section = [
    'title' => __( 'PLUGINs FIXs', 'sdstudio-page-speed-tolls' ),
    'id'    => 'FIXES_PLUGINS_sdstudio-page-speed-tolls',
    'subsection' => false,
    // Иконки брать здесь
    // http://elusiveicons.com/icons/
    'icon'  => 'el el-puzzle',
    'fields' => [
        [
            /**
             * Highlight_and_Share
             */

            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_FIXES_PLUGINS_Highlight_and_Share_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Highlight and Share', 'sdstudio-page-speed-tolls'),
//            'subtitle' => $img_drafts,
            'desc'  => __('Дополнительные фикс для плагина Highlight and Share.Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
//                'required' => array('enable_sweetalert2', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],
        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_SA2_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Highlight and Share -  Отключить Sweet Alert 2 используемый плагином', 'sdstudio-page-speed-tolls'),

            'desc'  => __('К сожалению разработчики плагина  Highlight and Share используют устаревшую библиотеку SweetAlert2 которая часто вызывает ошибки на странице. При активации данной опции библиотека SweetAlert2 используемая плагином  Highlight and Share будет заменена на актуальную версию. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
            'required' => array('ENABLE_FIXES_PLUGINS_Highlight_and_Share_sdstudio-page-speed-tolls', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],
        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_Uncaught_SyntaxError_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Highlight and Share -  Устранить ошибку "Uncaught SyntaxError: missing ) after argument list"', 'sdstudio-page-speed-tolls'),

            'desc'  => __('Часто при использовании плагина он генерирует ошибку "Uncaught SyntaxError: missing ) after argument list", данная ошибка иногда ломает верстку сайта. После активации функции ошибка больше не появится в консоли. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
            'required' => array('ENABLE_FIXES_PLUGINS_Highlight_and_Share_sdstudio-page-speed-tolls', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],


        [
            /**
             * Popups
             */

            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_FIXES_PLUGINS_Popups_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Popups - Отключить шрифт spufont.woff плагина', 'sdstudio-page-speed-tolls'),
//            'subtitle' => $img_drafts,
            'desc'  => __('Дополнительные фикс для плагина Popups. Для отключения стандартного файла стилей, в котором используется шрифт spufont.woff. Файл мелкий, но дает дополнительную нагрузку при получении страницы браузером. Место иконок используемых spufont.woff, в файле данного плагина _SDStudio_PLUGIN_Popus.css прописано правило для использования шрифта Font Awesome 5. Ну и изменены стили только для кнопкти закрытия попап окна. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
//                'required' => array('enable_sweetalert2', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],

    ],
    'desc'  => __( 'Дополнительные фиксы к разным плагинам, для ускорения, или устранения ошибок связанных с ними ', 'your-domain-here' ),

];
Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );



/**
 * THEMEs FIXs
 */
$section = [
    'title' => __( 'THEMEs FIXs', 'sdstudio-page-speed-tolls' ),
    'id'    => 'FIXES_THEMES_sdstudio-page-speed-tolls',
    'subsection' => false,
    // Иконки брать здесь
    // http://elusiveicons.com/icons/
    'icon'  => 'el el-eye-open',
    'fields' => [
        /**
         * SAXON
         */
        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'FIXES_THEMES__SAXON_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Saxon', 'sdstudio-page-speed-tolls'),
//            'subtitle' => $img_drafts,
            'desc'  => __('Влючить фиксы для темы Saxon. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
//                'required' => array('enable_sweetalert2', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],

            [
                //Link: https://docs.redux.io/core-fields/switch.html
                'id'       => 'FIXES_THEMES__SAXON_icons2_woff2_sdstudio-page-speed-tolls',
                'type'     => 'switch',
                'title'    => __('ajax search pro - Перенос icons2.woff2 в тело HTML с preload ', 'sdstudio-page-speed-tolls'),
//                'subtitle' => $OO1_Saxon_icons2,
                'desc'  => __('Влючить фикс ajax-search-pro. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
                'required' => array('FIXES_THEMES__SAXON_sdstudio-page-speed-tolls', '=', 'true' ),
                //                                'desc' => '<br><br>',
                'default'  => false,
            ],

        /**
         * ASTRA
         */
        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'FIXES_THEMES__ASTRA_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Astra', 'sdstudio-page-speed-tolls'),
//            'subtitle' => $img_drafts,
            'desc'  => __('Влючить фиксы для темы Astra. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
//                'required' => array('enable_sweetalert2', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],
            [
                //Link: https://docs.redux.io/core-fields/switch.html
                'id'       => 'FIXES_THEMES_Disable_astra_font_ASTRA_sdstudio-page-speed-tolls',
                'type'     => 'switch',
                'title'    => __('Astra - Отключить шрифт astra.woff', 'sdstudio-page-speed-tolls'),
    //            'subtitle' => $img_drafts,
                'desc'  => __('После включения опции, штатный шрифт astra.woff темы астра будет отключен. Место иконок используемых в нем будут подставлены иконки Font Awesome. Все стили находятся в файле данного плагина _SDStudio_THEMES_FIXs__ASTRA.css. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
                    'required' => array('FIXES_THEMES__ASTRA_sdstudio-page-speed-tolls', '=', 'true' ),
                //                                'desc' => '<br><br>',
                'default'  => false,
            ],
            [
                //Link: https://docs.redux.io/core-fields/switch.html
                'id'       => 'FIXES_THEMES_Disable_Google_fonts_ASTRA_sdstudio-page-speed-tolls',
                'type'     => 'switch',
                'title'    => __('Astra - Отключить Google fonts шрифты', 'sdstudio-page-speed-tolls'),
    //            'subtitle' => $img_drafts,
                'desc'  => __('После включения опции, будут отключены Google fonts шрифты которые вызывает сама тема астра. По хорошему, данная опция нужна уже перед продакшеном, и соответственно наличием шрифтов на сервере. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
                    'required' => array('FIXES_THEMES__ASTRA_sdstudio-page-speed-tolls', '=', 'true' ),
                //                                'desc' => '<br><br>',
                'default'  => false,
            ],


    ],
//    'desc'  => __( 'После включения данной опции появляется возможность поиска и замены .jpg,.jpeg,.png путей к изображениям во всем HTML страницы. Все выполняется перед отображением страницы в браузере. ', 'your-domain-here' ),

];
Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );


/**
 * ELEMENTOR
 */

$section = [
    'title' => __( 'Elementor FIXs', 'sdstudio-page-speed-tolls' ),
    'id'    => 'FIXES_ELEMENTOR_sdstudio-page-speed-tolls',
    'subsection' => false,
    // Иконки брать здесь
    // http://elusiveicons.com/icons/
    'icon'  => 'el el-eye-open',
    'fields' => [
        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_FIXES_ELEMENTOR_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Elementor фиксы', 'sdstudio-page-speed-tolls'),
//            'subtitle' => $img_drafts,
            'desc'  => __('Влючить фиксы для плагина Elementor. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
//                'required' => array('enable_sweetalert2', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],

        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Отключить шрифты Google Fonts используемые Elementor', 'sdstudio-page-speed-tolls'),
//                'subtitle' => $OO1_Saxon_icons2,
            'desc'  => __('<a href="https://techblog.sdstudio.top/kak-uskorit-rabotu-sajta-elementor-dlja-pagespeed-insights-3-poleznyh-soveta/#1_Ne_zagruzajte_Google_Fonts_ot_Elementor1_Ne_zagruzajte_Google_Fonts_ot_Elementor1_Ne_zagruzajte_Google_Fonts_ot_Elementor" target="_blank">Подробнее здесь</a>. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
            'required' => array('ENABLE_FIXES_ELEMENTOR_sdstudio-page-speed-tolls', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],

//        [
//            //Link: https://docs.redux.io/core-fields/switch.html
//            'id'       => 'DISABLE_Font_Awesome_FIXES_ELEMENTOR_sdstudio-page-speed-tolls',
//            'type'     => 'switch',
//            'title'    => __('Отключить шрифты Font Awesome используемые Elementor', 'sdstudio-page-speed-tolls'),
////                'subtitle' => $OO1_Saxon_icons2,
//            'desc'  => __('<a href="https://techblog.sdstudio.top/kak-uskorit-rabotu-sajta-elementor-dlja-pagespeed-insights-3-poleznyh-soveta/#1_Ne_zagruzajte_Google_Fonts_ot_Elementor1_Ne_zagruzajte_Google_Fonts_ot_Elementor1_Ne_zagruzajte_Google_Fonts_ot_Elementor" target="_blank">Подробнее здесь</a>. После включения опции, плагин произведет отключенеи шрифтов Font Awesome используемые Elementor, и подключит свой набор шрифтов Font Awesome 5 .Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
//            'required' => array('ENABLE_FIXES_ELEMENTOR_sdstudio-page-speed-tolls', '=', 'true' ),
//            //                                'desc' => '<br><br>',
//            'default'  => false,
//        ],

        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Включить прилоад Font Awesome шрифтов которые использует Elementor во фронтеде', 'sdstudio-page-speed-tolls'),
//                'subtitle' => $OO1_Saxon_icons2,
            'desc'  => __('Поле активации опции в heder\'e страницы будут добавлены теги preload шрифтам Font Awesome 5 которые имеются в плагине Elementor. Для того что бы избавиться от эффекта "вспышки" во время загрузки страницы. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
            'required' => array('ENABLE_FIXES_ELEMENTOR_sdstudio-page-speed-tolls', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],


        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Отключить шрифты Eicons используемые Elementor на фронтеде', 'sdstudio-page-speed-tolls'),
//                'subtitle' => $OO1_Saxon_icons2,
            'desc'  => __('<a href="https://techblog.sdstudio.top/kak-uskorit-rabotu-sajta-elementor-dlja-pagespeed-insights-3-poleznyh-soveta/#3_Zamenite_ikonki_Elementor_Eicons_sriftami_Awesome_Icons" target="_blank">Подробнее здесь</a>. После включения опции, плагин произведет отключенеи шрифта Eicons используемого Elementor. Шрифт будет отключен если пользователь не администратор сайта. В случае входа на сайт администратора, шрифт будет подключен. Для включения установите переключатель в положение "On". По умолчанию опция выключена.', 'sdstudio-page-speed-tolls'),
            'required' => array('ENABLE_FIXES_ELEMENTOR_sdstudio-page-speed-tolls', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],

    ],
//    'desc'  => __( 'После включения данной опции появляется возможность поиска и замены .jpg,.jpeg,.png путей к изображениям во всем HTML страницы. Все выполняется перед отображением страницы в браузере. ', 'your-domain-here' ),

];
Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );




/**
 * PRELOAD
 */
require_once plugin_dir_path( __FILE__ ) . 'redux-extensions-loader-master/loader.php';
$section = [
    'title' => __( 'PRELOADs', 'sdstudio-page-speed-tolls' ),
    'id'    => 'PRELOADs_sdstudio-page-speed-tolls',
    'subsection' => false,
    // Иконки брать здесь
    // http://elusiveicons.com/icons/
    'icon'  => 'el el-eye-open',
    'fields' => [
        [
            //Link: https://docs.redux.io/core-fields/switch.html
            'id'       => 'ENABLE_PRELOADs_sdstudio-page-speed-tolls',
            'type'     => 'switch',
            'title'    => __('Активировать предзагрузку', 'sdstudio-page-speed-tolls'),
//            'subtitle' => $img_drafts,
            'desc'  => __('Здесь добавляем и работаем со всем что нужно загрузить перед отображением страницы в браузере', 'sdstudio-page-speed-tolls'),
//                'required' => array('enable_sweetalert2', '=', 'true' ),
            //                                'desc' => '<br><br>',
            'default'  => false,
        ],
        [
            'id'          => 'opt-slides',
            'type'        => 'slides',
//            'title'       => __('Slides Options', 'redux-framework-demo'),
            'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
            'desc'        => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo'),
            'show'          => array(
                'title'       => true,
                'description' => true,
                'url'         => true,
            ),
            'placeholder' => [
                'title'       => __('Имя шрифта', 'redux-framework-demo'),
                'description' => __('Укажите css стили для прелоада шрифта', 'redux-framework-demo'),
                'url'         => __('Щелкните здесь для загрузки шрифта', 'redux-framework-demo'),
            ],
        ],

    ],
    'desc'  => __( 'После включения данной опции появляется возможность добавлять изображения, стили, шрифты в предзагрузку страницы. Опция нужна для того что бы избежать "вспышек" текста, изображений и так далее.', 'your-domain-here' ),

];
Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );

//        ============================================

//Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section, array(
//$section = [
//    'id'          => 'opt-slides',
//    'type'        => 'slides',
//    'title'       => __('Slides Options', 'redux-framework-demo'),
//    'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
//    'desc'        => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo'),
//    'placeholder' => [
//    'title'       => __('This is a title', 'redux-framework-demo'),
//    'description' => __('Description Here', 'redux-framework-demo'),
//    'url'         => __('Give us a link!', 'redux-framework-demo'),
//    ],
//];
//Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );
//) );
//        ============================================
//Redux::set_section( $opt_name__redux_sdstudio_page_speed_tolls, $section );
/*
 * <--- END SECTIONS
 */

//require_once plugin_dir_path( __FILE__ ) . '_sdstudio_controllers/redux-update-all-posts-JS-SCRIPT-aJax.php';

//require_once plugin_dir_path( __FILE__ ) . '_sdstudio_controllers/redux-update-all-posts.php';

/**
 * END
 * UPDAE ALL POSTS
 *********************************/







?>