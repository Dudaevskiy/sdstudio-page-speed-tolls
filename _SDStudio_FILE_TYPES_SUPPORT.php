<?php
// Добавляем нестандартные типы файлов в медиатеку
// https://wp-kama.ru/id_8643/spisok-rasshirenij-fajlov-i-ih-mime-tipov.html
//
// Список типов: https://wp-kama.ru/id_8643/spisok-rasshirenij-fajlov-i-ih-mime-tipov.html
// В начале включаем загрузку любого типа фалов для администратора сайта:
// define( 'ALLOW_UNFILTERED_UPLOADS', true );

add_filter( 'upload_mimes', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
    // разрешаем новые типы
    $mimes['svg']  = 'image/svg+xml'; // image/svg+xml
    $mimes['doc']  = 'application/msword';
    $mimes['woff']  = 'application/x-font-woff';
    $mimes['woff2'] = 'application/x-font-woff2';
    $mimes['ttf']   = 'application/x-font-ttf';
    $mimes['eot']   = 'application/vnd.ms-fontobject';
    $mimes['psd']  = 'image/vnd.adobe.photoshop';
    $mimes['djv']  = 'image/vnd.djvu';
    $mimes['djvu'] = 'image/vnd.djvu';

    // отключаем имеющиеся
// unset( $mimes['mp4a'] );

    return $mimes;
}
