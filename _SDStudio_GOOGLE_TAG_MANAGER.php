<?php


//https://webkato.ru/vstavit-kod-posle-otkrytija-tega-body-v-wordpress-stalo-proshhe/
function webkato_google_tag_manager_after_body_open() {
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXHPDGK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Google Tag Manager -->

    <script>
        /*
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MXHPDGK');
        */
    </script>

    <!-- End Google Tag Manager -->
    <?php
}
//add_action( 'wp_body_open', 'webkato_google_tag_manager_after_body_open' );
