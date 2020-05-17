jQuery(document).ready(function ($) {

    // Все классы body
    var classes = $('body').attr('class');

// И выдергиваем ID страницы из SDStudio-ID
    var PageID = classes.split('SDStudio-ID-');
    var PageID = PageID[1].split(' ');
    var PageID = PageID[0];
    // ID
    //  console.log(PageID);


    $('body').on("click", "[href='#sdstudio-delete-this-post']", function (event) {
        console.log('Клик был');

        // Следим за переключателем
        // Удаления (мимо корзины)
        window.sdstudio_enable_full_remove_post = 'true';
        var sdstudio_enable_full_remove_post = 'true';
        jQuery(document).on('click', 'input#sdstudio-enable-full-remove-post', function() {
            if( $(this).is(':checked'))  //  or  this.checked
            {
                window.sdstudio_enable_full_remove_post = 'true';
                console.log('Отмечено - '+window.sdstudio_enable_full_remove_post);
                // console.log('Отмечено - '+$(this).val());
            } else {
                window.sdstudio_enable_full_remove_post = 'false';
                console.log('Не Отмечено - '+window.sdstudio_enable_full_remove_post);
                // console.log('Не отмечено - '+$(this).val());

            }

        })


// Отменяем повидение при клике по линку по умолчанию
        event.preventDefault();

        var NamePost = $('title').text();
        console.log(NamePost);

        var IDPost = PageID;
        console.log(IDPost);
        console.log('📑 ID поста для удаления - ' + IDPost);

        var data = {
            action: 'RemovUserPostsFrontend',
            IDPost: IDPost,
        };
        console.log(data);
        //////////////////////////////
        /// sweetalert2 START
        let timerInterval

        /////////////////////////////
        /// sweetalert2 IF ELSE START
        var aJaxRemovTranInvestPostWPRECALL = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
            showCloseButton: true,
            scrollbarPadding: false,
            className: "SDStudio_POPUP"
        })

        aJaxRemovTranInvestPostWPRECALL.fire({
            title: 'Удалить запись?',
            icon: 'warning',
            type: 'warning',
            html: "<b>\"" + NamePost + "\"</b><br><p>После удаления записи Вы будете перенаправлены на предыдущую запись.</p>\n" +
                "  <p style=\"/* display: flex; */margin-bottom: 5px;text-align: center;font-weight: 500;\">Удалить мимо корзины (на всегда)?</p>" +
                "<div class=\"sdstudio-switcher-wrap\">\n" +
                "  <input type=\"checkbox\" class=\"sdstudio-switcher-wrap-input\" id=\"sdstudio-enable-full-remove-post\" checked />\n" +
                "  <label class=\"slider-v2 sdstudio-switcher-wrap-label\" for=\"sdstudio-enable-full-remove-post\"></label>\n" +
                "  \n" +
                "</div>",
            showCancelButton: true,
            confirmButtonText: 'Да, удалить!',
            cancelButtonText: 'Стоп, отмена!',
//               reverseButtons: true
            showCloseButton: true
        }).then((result) => {
            if (result.value) {
                /////////////////////////////
                /// sweetalert2 IF START

                $.ajax({
                    type: "POST", // use $_POST method to submit data
                    url: '/wp-admin/admin-ajax.php?action=RemovUserPostsFrontend', // where to submit the data
                    // contentType: false,
                    // cache:false,
                    data: {
                        //IDUser : IDUser, // PHP: $_POST['first_name']
                        IDPost: IDPost, // PHP: $_POST['last_name']
                        SDStudio_enable_full_remove_post: window.sdstudio_enable_full_remove_post,
                    },

                    success: function (data) {
                        // Удаляем блок
                        console.log(data);

                        //ParrentRemov.remove();
                        //////////////////////////////
                        /// sweetalert2 START
                        Swal.fire({
                            position: 'center',
                            type: 'success',
                            icon: 'success',
                            title: 'Готово!',
                            text: 'Запись успешно удалена',
                            showConfirmButton: false,
                            scrollbarPadding: false,
                            timer: 1000
                        });
                        /// sweetalert2 END
                        //////////////////////////////

                        // Переходим на следующую страницу
                        var NextLink = data.split('=');
                        console.log(NextLink[1]);
                        window.location.href = NextLink[1];
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
                })
                /////////////////////////////
                /// sweetalert2 IF END

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                aJaxRemovTranInvestPostWPRECALL.fire(
                    'Отмена',
                    'Запись не удалена',
                    'error'
                )
            }
        });

    });
});