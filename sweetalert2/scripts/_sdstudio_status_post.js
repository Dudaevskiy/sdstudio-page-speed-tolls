jQuery(document).ready(function ($) {
    jQuery(window).on('load', function () {
    // When the DOM is ready.
    // Все классы body
    var classes = $('body').attr('class');

// И выдергиваем ID страницы из SDStudio-ID
    var PageID = classes.split('SDStudio-ID-');
    var PageID = PageID[1].split(' ');
    var PageID = PageID[0];

    // $(function() {

        $( '[href="#sdstudio-editor-tools-publish-post"]' ).on( 'click', function( event ) {
            event.preventDefault();
            //plugins/wp-front-end-editor/js/tinymce.theme.js:168
            // For Editus
            if (window.EditusFormatAJAXErrorMessage){
                console.log('Editus активен');
                jQuery('a#lasso--publish').trigger('click');
                //////////////////////////////
                /// sweetalert2 START
                Swal.fire({
                    position: 'center',
                    type: 'success',
                    icon: 'success',
                    title: 'Готово!',
                    text: 'Запись опубликована',
                    showConfirmButton: false,
                    scrollbarPadding: false,
                    timer: 1600
                });
                /// sweetalert2 END
                //////////////////////////////
                // reload page
                window.location.reload(true);
            }
            // For Frontend Editor
            if (window.fee) {
                window.fee.post.save({status: 'publish'}).done(function () {

                    //////////////////////////////
                    /// sweetalert2 START
                    Swal.fire({
                        position: 'center',
                        type: 'success',
                        icon: 'success',
                        title: 'Готово!',
                        text: 'Запись опубликована',
                        showConfirmButton: false,
                        scrollbarPadding: false,
                        timer: 1600
                    });
                    /// sweetalert2 END
                    //////////////////////////////
                    // reload page
                    window.location.reload(true);

                });
            }


            // var ThisPostStatus = 'draft';
                // /////////////////////////////
                // /// sweetalert2 IF START
                // $.ajax({
                //     type: "POST", // use $_POST method to submit data
                //     url: '/wp-admin/admin-ajax.php?action=ChangePostStatusPublish', // where to submit the data
                //     data: {
                //         IDPost: PageID, // PHP: $_POST['last_name']
                //         ThisPostStatus: ThisPostStatus, // PHP: $_POST['last_name']
                //     },
                //     success: function (data) {
                //         //ParrentRemov.remove();
                //         //////////////////////////////
                //         /// sweetalert2 START
                //         Swal.fire({
                //             position: 'center',
                //             type: 'success',
                //             icon: 'success',
                //             title: 'Готово!',
                //             text: 'Запись опубликована',
                //             showConfirmButton: false,
                //             scrollbarPadding: false,
                //             timer: 1600
                //         });
                //         /// sweetalert2 END
                //         //////////////////////////////
                //         // Перезагружаем страницу
                //         var ThisURL = window.location.href;
                //         window.location.href = ThisURL;
                //     },
                //
                //     error: function (errorThrown) {
                //         //////////////////////////////
                //         /// sweetalert2 START
                //         Swal.fire({
                //             position: 'center',
                //             icon: 'error',
                //             type: 'error',
                //             title: 'Ошибка',
                //             text: 'Что-то пошло не так.',
                //             showConfirmButton: false,
                //             scrollbarPadding: false,
                //             timer: 3000
                //         });
                //         /// sweetalert2 END
                //         //////////////////////////////
                //     }
                // });
            });


        $( '[href="#sdstudio-editor-tools-draft-post"]' ).on( 'click', function( event ) {
            event.preventDefault();
            // window.fee.post.save({status: 'draft'}).done(function () {
            //
            //     //////////////////////////////
            //     /// sweetalert2 START
            //     Swal.fire({
            //         position: 'center',
            //         type: 'success',
            //         icon: 'success',
            //         title: 'Готово!',
            //         text: 'Запись отправлена в черновики!',
            //         showConfirmButton: false,
            //         scrollbarPadding: false,
            //         timer: 1600
            //     });
            //     // reload page
            //     window.location.reload(true);
            //
            // });

            var ThisPostStatus = 'publish';
                /////////////////////////////
                /// sweetalert2 IF START
                $.ajax({
                    type: "POST", // use $_POST method to submit data
                    url: '/wp-admin/admin-ajax.php?action=ChangePostStatusPublish', // where to submit the data
                    data: {
                        IDPost: PageID, // PHP: $_POST['last_name']
                        ThisPostStatus: ThisPostStatus, // PHP: $_POST['last_name']
                    },
                    success: function (data) {
                        //ParrentRemov.remove();
                        //////////////////////////////
                        /// sweetalert2 START
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            icon: 'success',
                            title: 'Готово!',
                            text: 'Запись отправлена в черновики!',
                            showConfirmButton: false,
                            scrollbarPadding: false,
                            timer: 1600
                        });
                        /// sweetalert2 END
                        //////////////////////////////
                        // Перезагружаем страницу
                        // reload page
                        window.location.reload(true);
                    },

                    error: function (errorThrown) {
                        //////////////////////////////
                        /// sweetalert2 START
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            type: 'error',
                            title: 'Ошибка',
                            text: 'Что-то пошло не так.',
                            showConfirmButton: false,
                            scrollbarPadding: false,
                            timer: 3000
                        });
                        /// sweetalert2 END
                        //////////////////////////////
                    }
                });
            });



        // });
    });
    // });

});